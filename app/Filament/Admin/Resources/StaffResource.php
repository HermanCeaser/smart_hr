<?php

namespace App\Filament\Admin\Resources;

use App\Enums\MaritalStatus;
use App\Filament\Admin\Resources\StaffResource\Pages;
use App\Filament\Admin\Resources\StaffResource\RelationManagers;
use App\Models\Staff;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StaffResource extends Resource
{
    protected static ?string $model = Staff::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'Employees';

    protected static ?int $navigationSort = 0;

    protected static ?string $modelLabel = 'Employee';

    protected static ?string $pluralModelLabel = 'Employees';

    public static function form(Form $form): Form
    {
        $tenant = Filament::getTenant();

        return $form
            ->schema([
                Forms\Components\Grid::make()
                    ->schema([
                        Forms\Components\Section::make('Avatar')
                            ->columnSpan(['md' => 6, 'lg' => 4])
                            ->schema([
                                Forms\Components\FileUpload::make('avatar')
                                    ->label('')
                                    ->helperText('Uploaded Image should be a jpeg,png,webp,svg and should be less than 5MB')
                                    ->maxSize(1024 * 1024 * 5)
                                    ->avatar()
                                    ->columnSpanFull()
                                    ->imageEditor(),
                            ]),
                        Forms\Components\Section::make('Employee details')
                            ->collapsible()
                            ->columns(2)
                            ->columnSpan(['md' => 6, 'lg' => 8])
                            ->schema([
                                Forms\Components\TextInput::make('first_name')
                                    ->label('First Name')
                                    ->required(),
                                Forms\Components\TextInput::make('last_name')
                                    ->label('Last Name')
                                    ->required(),
                                Forms\Components\Select::make('gender')
                                    ->native(false)
                                    ->required()
                                    ->options([
                                        'male' => 'Male',
                                        'female' => 'Female'
                                    ]),
                                Forms\Components\DatePicker::make('dob')
                                    ->placeholder($tenant->display_format)
                                    ->native(false)
                                    ->label('Date of Birth')
                                    ->displayFormat($tenant->date_format)
                                    ->required(),
                                Forms\Components\TextInput::make('email')
                                    ->required()
                                    ->email(),
                                Forms\Components\TextInput::make('phone_number')
                                    ->tel()
                            ]),
                        Forms\Components\Section::make('Other Information')
                            ->collapsible()
                            ->columnSpanFull()
                            ->columns(3)
                            ->schema([
                                Forms\Components\Select::make('designation_id')
                                    ->searchable()
                                    ->required()
                                    ->preload()
                                    ->relationship(
                                        name: 'designation',
                                        titleAttribute: 'name',
                                    ),
                                Forms\Components\Select::make('department_id')
                                    ->searchable()
                                    ->required()
                                    ->preload()
                                    ->relationship(
                                        name: 'department',
                                        titleAttribute: 'name',
                                    ),
                                Forms\Components\Select::make('marital_status')
                                    ->native(false)
                                    ->enum(MaritalStatus::class)
                                    ->options(MaritalStatus::class)
                                    ->required()
                            ])
                    ])
                    ->columns(12)
                // ->columnSpanFull()



            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('full_name')
                    ->searchable(['first_name', 'last_name'])
                    ->sortable(query: function (Builder $query, string $direction): Builder {
                        return $query
                            ->orderBy('first_name', $direction)
                            ->orderBy('last_name', $direction);
                    }),
                Tables\Columns\TextColumn::make('employee_id')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('department.name')
                    ->toggleable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone_number')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('gender')->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'male' => 'gray',
                        'female' => 'success',
                    })->toggleable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('designation.name')
                    ->badge()
                    ->toggleable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Joining date')
                    ->date()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStaff::route('/'),
            'create' => Pages\CreateStaff::route('/create'),
            'edit' => Pages\EditStaff::route('/{record}/edit'),
        ];
    }
}
