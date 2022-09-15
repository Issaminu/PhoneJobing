    <nav x-data="{ open: false }" id="navigation" class="bg-white border-b border-gray-100" style="">
        <!-- Primary Navigation Menu -->
        <div id="mainBody">
            <div class=" mx-auto">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <a href="{{ route('dashboard') }}">
                                <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                            </a>
                        </div>
                        <!-- Navigation Links -->
                        @if (Auth::user()->type === 'manager')
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard*')">
                                    {{ __('Tableau de bord') }}
                                </x-nav-link>
                                <x-nav-link :href="route('equipe')" :active="request()->routeIs('equipe*')">
                                    {{ __('Équipe') }}
                                </x-nav-link>
                                <x-nav-link :href="route('clients')" :active="request()->routeIs('clients*')">
                                    {{ __('Clients') }}
                                </x-nav-link>
                                <x-nav-link :href="route('scripts')" :active="request()->routeIs('scripts*')">
                                    {{ __('Scripts') }}
                                </x-nav-link>
                                <x-nav-link :href="route('produits')" :active="request()->routeIs('produits*')">
                                    {{ __('Produits') }}
                                </x-nav-link>
                                <x-nav-link :href="route('historique')" :active="request()->routeIs('historique*')">
                                    {{ __('Historique') }}
                                </x-nav-link>
                            </div>
                        @elseif (Auth::user()->type === 'teleoperateur')
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard*')">
                                    {{ __('Appel') }}
                                </x-nav-link>
                                <x-nav-link :href="route('equipe')" :active="request()->routeIs('equipe*')">
                                    {{ __('Équipe') }}
                                </x-nav-link>
                                <x-nav-link :href="route('clients')" :active="request()->routeIs('clients*')">
                                    {{ __('Clients') }}
                                </x-nav-link>
                                <x-nav-link :href="route('historique')" :active="request()->routeIs('historique*')">
                                    {{ __('Historique') }}
                                </x-nav-link>
                            </div>
                        @elseif (Auth::user()->type === 'commercial')
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard*')">
                                    {{ __('Accueil') }}
                                </x-nav-link>
                                <x-nav-link :href="route('equipe')" :active="request()->routeIs('equipe*')">
                                    {{ __('Équipe') }}
                                </x-nav-link>
                                <x-nav-link :href="route('rendezvous')" :active="request()->routeIs('rendezvous*')">
                                    {{ __('Rendez-vous') }}
                                </x-nav-link>
                                <x-nav-link :href="route('historique')" :active="request()->routeIs('historique*')">
                                    {{ __('Historique') }}
                                </x-nav-link>
                            </div>
                        @endif
                    </div>
                    <!-- Settings Dropdown -->
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    <a href="/equipe/{{ str_replace(' ', '', Auth::user()->name) }}">
                                        <div>
                                            <div class="flex" id="navProfile" style="align-items: center; width:auto">
                                                <?php
                                                if (!Auth::user()->image) {
                                                    Auth::user()->image = 'defaultPFP.webp';
                                                    Auth::user()->update();
                                                }
                                                if (file_exists(public_path('images/' . Auth::user()->image))) {
                                                    Auth::user()->image = asset('images/' . Auth::user()->image);
                                                } else {
                                                    Auth::user()->image = Storage::disk('s3')->temporaryUrl('images/' . Auth::user()->image, \Carbon\Carbon::now()->addSeconds(40));
                                                }
                                                ?>
                                                <div class="client-picture-rounded"
                                                    style="border-style:solid; border-color:#6b7280; border-width:0.03rem;  margin-bottom:0.7rem; margin-right:0.7rem; cursor: pointer;
                                        width: 2rem; height: 2rem; background-image: url({{ Auth::user()->image }})">
                                                </div>{{ ucwords(Auth::user()->name) }}
                                            </div>
                                        </div>
                                    </a>
                                    <div class="ml-1">
                                    </div>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <div id="logOutButton">
                                            <x-dropdown-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                                {{ __(' Se déconnecter') }}
                                            </x-dropdown-link>
                                        </div>
                                    </form>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                        </x-dropdown>
                    </div>
                    <!-- Hamburger -->
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button @click="open = ! open"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Responsive Navigation Menu, This shit doesn't work -->
            <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
                <div class="pt-2 pb-3 space-y-1">
                    <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                </div>
                <!-- Responsive Settings Options -->
                <div class="pt-4 pb-1 border-t border-gray-200">
                    <div class="px-4">
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                    <div class="mt-3 space-y-1">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>
