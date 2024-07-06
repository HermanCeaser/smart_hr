<x-app-layout>
    <!--Hero Section -->
    <x-hero />

    <!--Features Section -->
    <section x-data="{ currentTab: 1 }" id="features" aria-label="Features for running your books"
        class="relative overflow-hidden bg-primary-600 pb-28 pt-20 sm:py-32"><img alt="" loading="lazy"
            width="2245" height="1636" decoding="async" data-nimg="1"
            class="absolute left-1/2 top-1/2 max-w-none translate-x-[-44%] translate-y-[-42%]"
            src="{{ asset('images/backgrounds/background-features.5f7a9acs9.jpg') }}" style="color: transparent;">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative">
            <div class="max-w-2xl md:mx-auto md:text-center xl:max-w-none">
                <h2 class="font-display text-3xl tracking-tight text-white sm:text-4xl md:text-5xl">Everything you
                    need
                    to run your books.</h2>
                <p class="mt-6 text-lg tracking-tight text-primary-100">Well everything you need if you aren’t that
                    picky
                    about minor details like tax compliance.</p>
            </div>
            <div class="mt-16 grid grid-cols-1 items-center gap-y-2 pt-10 sm:gap-y-6 md:mt-20 lg:grid-cols-12 lg:pt-0">
                <div class="-mx-4 flex overflow-x-auto pb-4 sm:mx-0 sm:overflow-visible sm:pb-0 lg:col-span-5">
                    <div class="relative z-10 flex gap-x-4 whitespace-nowrap px-4 sm:mx-auto sm:px-0 lg:mx-0 lg:block lg:gap-x-0 lg:gap-y-1 lg:whitespace-normal"
                        role="tablist" aria-orientation="vertical">
                        <!-- Vertical Tabs -->
                        <div @click="currentTab=1"
                            class="group relative rounded-full px-4 py-1 lg:rounded-l-xl lg:rounded-r-none lg:p-6  lg:hover:bg-white/5"
                            :class="{ 'bg-white lg:bg-white/10 lg:ring-1 lg:ring-inset lg:ring-white/10': currentTab ===
                                    1 }">
                            <h3><button
                                    class="font-display text-lg ui-not-focus-visible:outline-none  text-primary-100  lg:text-white"
                                    :class="{ 'text-primary-600': currentTab === 1 }" id="headlessui-tabs-tab-:r7:"
                                    role="tab" type="button" tabindex="0" data-headlessui-state="selected"><span
                                        class="absolute inset-0 rounded-full lg:rounded-l-xl lg:rounded-r-none"></span>Payroll</button>
                            </h3>
                            <p class="mt-2 hidden text-sm lg:block text-white">Keep track of everyone's salaries and
                                whether or not they've been paid. Direct deposit not supported.</p>
                        </div>
                        <div @click="currentTab=2"
                            class="group relative rounded-full px-4 py-1 lg:rounded-l-xl lg:rounded-r-none lg:p-6 lg:hover:bg-white/5"
                            :class="{ 'bg-white lg:bg-white/10 lg:ring-1 lg:ring-inset lg:ring-white/10': currentTab ===
                                    2 }">
                            <h3><button
                                    class="font-display text-lg ui-not-focus-visible:outline-none text-primary-100 lg:text-white"
                                    :class="{ 'text-primary-600': currentTab === 2 }" id="headlessui-tabs-tab-:r9:"
                                    role="tab" type="button" aria-selected="false" tabindex="-1"
                                    data-headlessui-state="" aria-controls="headlessui-tabs-panel-:rh:"><span
                                        class="absolute inset-0 rounded-full lg:rounded-l-xl lg:rounded-r-none"></span>Claim
                                    expenses</button></h3>
                            <p class="mt-2 hidden text-sm lg:block text-primary-100 group-hover:text-white">All of
                                your
                                receipts organized into one place, as long as you don't mind typing in the data by
                                hand.
                            </p>
                        </div>
                        <div @click="currentTab=3"
                            class="group relative rounded-full px-4 py-1 lg:rounded-l-xl lg:rounded-r-none lg:p-6 lg:hover:bg-white/5"
                            :class="{ 'bg-white lg:bg-white/10 lg:ring-1 lg:ring-inset lg:ring-white/10': currentTab ===
                                    3 }">
                            <h3><button
                                    class="font-display text-lg ui-not-focus-visible:outline-none text-primary-100 lg:text-white"
                                    :class="{ 'text-primary-600': currentTab === 3 }" id="headlessui-tabs-tab-:rb:"
                                    role="tab" type="button" aria-selected="false" tabindex="-1"
                                    data-headlessui-state="" aria-controls="headlessui-tabs-panel-:rj:"><span
                                        class="absolute inset-0 rounded-full lg:rounded-l-xl lg:rounded-r-none"></span>VAT
                                    handling</button></h3>
                            <p class="mt-2 hidden text-sm lg:block text-primary-100 group-hover:text-white">We only
                                sell
                                our software to companies who don't deal with VAT at all, so technically we do all
                                the
                                VAT stuff they need.</p>
                        </div>
                        <div @click="currentTab=4"
                            class="group relative rounded-full px-4 py-1 lg:rounded-l-xl lg:rounded-r-none lg:p-6 lg:hover:bg-white/5"
                            :class="{ 'bg-white lg:bg-white/10 lg:ring-1 lg:ring-inset lg:ring-white/10': currentTab ===
                                    4 }">
                            <h3><button
                                    class="font-display text-lg ui-not-focus-visible:outline-none text-primary-100 lg:text-white"
                                    :class="{ 'text-primary-600': currentTab === 4 }" id="headlessui-tabs-tab-:rd:"
                                    role="tab" type="button" aria-selected="false" tabindex="-1"
                                    data-headlessui-state="" aria-controls="headlessui-tabs-panel-:rl:"><span
                                        class="absolute inset-0 rounded-full lg:rounded-l-xl lg:rounded-r-none"></span>Reporting</button>
                            </h3>
                            <p class="mt-2 hidden text-sm lg:block text-primary-100 group-hover:text-white">Easily
                                export
                                your data into an Excel spreadsheet where you can do whatever the hell you want with
                                it.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Tab content-->
                <div class="lg:col-span-7">
                    <div x-show="currentTab === 1" id="headlessui-tabs-panel-:rf:" role="tabpanel" tabindex="0"
                        aria-labelledby="headlessui-tabs-tab-:r7:">
                        <div class="relative sm:px-6 lg:hidden">
                            <div
                                class="absolute -inset-x-4 bottom-[-4.25rem] top-[-6.5rem] bg-white/10 ring-1 ring-inset ring-white/10 sm:inset-x-0 sm:rounded-t-xl">
                            </div>
                            <p class="relative mx-auto max-w-2xl text-base text-white sm:text-center">Keep track of
                                everyone's salaries and whether or not they've been paid. Direct deposit not
                                supported.
                            </p>
                        </div>
                        <div
                            class="mt-10 w-[45rem] overflow-hidden rounded-xl bg-slate-50 shadow-xl shadow-primary-900/20 sm:w-auto lg:mt-0 lg:w-[67.8125rem]">
                            <img alt="" fetchpriority="high" width="2174" height="1464" decoding="async"
                                data-nimg="1" class="w-full"
                                sizes="(min-width: 1024px) 67.8125rem, (min-width: 640px) 100vw, 45rem"
                                src="{{ asset('images/features/payroll.webp') }}" style="color: transparent;">
                        </div>
                    </div>
                    <div x-show="currentTab === 2" id="headlessui-tabs-panel-:rh:" role="tabpanel" tabindex="-1">
                        <div class="relative sm:px-6 lg:hidden">
                            <div
                                class="absolute -inset-x-4 bottom-[-4.25rem] top-[-6.5rem] bg-white/10 ring-1 ring-inset ring-white/10 sm:inset-x-0 sm:rounded-t-xl">
                            </div>
                            <p class="relative mx-auto max-w-2xl text-base text-white sm:text-center">All of your
                                receipts organized into one place, as long as you don't mind typing in the data by
                                hand.
                            </p>
                        </div>
                        <div
                            class="mt-10 w-[45rem] overflow-hidden rounded-xl bg-slate-50 shadow-xl shadow-primary-900/20 sm:w-auto lg:mt-0 lg:w-[67.8125rem]">
                            <img alt="" fetchpriority="high" width="2174" height="1464" decoding="async"
                                data-nimg="1" class="w-full"
                                sizes="(min-width: 1024px) 67.8125rem, (min-width: 640px) 100vw, 45rem"
                                src="{{ asset('images/features/expenses.webp') }}" style="color: transparent;">
                        </div>
                    </div>
                    <div x-show="currentTab === 3" id="headlessui-tabs-panel-:rj:" role="tabpanel" tabindex="-1">
                        <div class="relative sm:px-6 lg:hidden">
                            <div
                                class="absolute -inset-x-4 bottom-[-4.25rem] top-[-6.5rem] bg-white/10 ring-1 ring-inset ring-white/10 sm:inset-x-0 sm:rounded-t-xl">
                            </div>
                            <p class="relative mx-auto max-w-2xl text-base text-white sm:text-center">We only sell
                                our
                                software to companies who don't deal with VAT at all, so technically we do all the
                                VAT
                                stuff they need.</p>
                        </div>
                        <div
                            class="mt-10 w-[45rem] overflow-hidden rounded-xl bg-slate-50 shadow-xl shadow-primary-900/20 sm:w-auto lg:mt-0 lg:w-[67.8125rem]">
                            <img alt="" fetchpriority="high" width="2174" height="1464" decoding="async"
                                data-nimg="1" class="w-full"
                                sizes="(min-width: 1024px) 67.8125rem, (min-width: 640px) 100vw, 45rem"
                                src="{{ asset('images/features/vat-returns.webp') }}" style="color: transparent;">
                        </div>
                    </div>
                    <div x-show="currentTab === 4" id="headlessui-tabs-panel-:rl:" role="tabpanel" tabindex="-1">
                        <div class="relative sm:px-6 lg:hidden">
                            <div
                                class="absolute -inset-x-4 bottom-[-4.25rem] top-[-6.5rem] bg-white/10 ring-1 ring-inset ring-white/10 sm:inset-x-0 sm:rounded-t-xl">
                            </div>
                            <p class="relative mx-auto max-w-2xl text-base text-white sm:text-center">Easily export
                                your data into an Excel spreadsheet where you can do whatever the hell you want with
                                it.
                            </p>
                        </div>
                        <div
                            class="mt-10 w-[45rem] overflow-hidden rounded-xl bg-slate-50 shadow-xl shadow-primary-900/20 sm:w-auto lg:mt-0 lg:w-[67.8125rem]">
                            <img alt="" fetchpriority="high" width="2174" height="1464" decoding="async"
                                data-nimg="1" class="w-full"
                                sizes="(min-width: 1024px) 67.8125rem, (min-width: 640px) 100vw, 45rem"
                                src="{{ asset('images/features/cashflow.webp') }}" style="color: transparent;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Pricing Section-->
    <x-pricing />

    <!-- FAQ Section -->
    <x-faq />
</x-app-layout>
