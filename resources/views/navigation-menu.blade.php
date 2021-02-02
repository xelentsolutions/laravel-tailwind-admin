<nav x-data="{ open: false }" class="bg-blue-600">
            <div class="max-w-full mx-auto px-2 sm:px-6 lg:px-8">
                <div class="relative flex items-center justify-between h-16">
                    <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                        <div class="flex-shrink-0 flex items-center text-white">
                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" class="w-12 fill-current" viewBox="0 0 512 453">
                                <path d="M231.1 26.5c-50.5 7.7-94.7 35.6-126.5 79.8-17 23.8-26.9 46.4-33.3 76.4-2.6 12.1-2.7 14.2-2.8 39.8 0 25.6.2 27.6 2.7 39.6 7.8 36 24.6 66.7 51.3 93.3 33.7 33.8 72.8 53.1 118.7 58.6 15.1 1.9 48.6.8 62.3-1.9 35.7-7.3 69.3-25.3 95.2-51 11.5-11.4 28.3-32.7 28.3-35.8 0-1.4-18.3-11.8-18.7-10.7-.2.6-2.7 5.1-5.5 10-17.1 30-42.2 54.1-71.7 68.9-10.4 5.2-28.8 11.1-40.9 13.1-14.3 2.3-44.6 1.5-57.7-1.5-20.7-4.8-36.4-11.5-53-22.5-40.6-27.1-70.1-70.6-79.4-117.1-10.3-51.8-1.3-107.5 24.2-149.3 9-14.8 17-24.7 31.1-38.7 19.3-19.2 38.2-31.2 60.6-38.4 17.6-5.6 24.4-6.6 47.5-6.6 18.3 0 22.3.3 31.4 2.3 43.7 9.8 83 38.2 107.3 77.5 3.3 5.4 6.6 9.7 7.2 9.5 2.1-.5 16.6-9.3 16.6-10 0-1.5-12.9-17.6-20.9-26-27.1-28.5-64-48.7-105.1-57.3-11-2.4-15.3-2.7-36-3-17-.3-26.1 0-32.9 1z" />
                                <path d="M279 131.6c-17.6 3.7-32 16.3-32 27.9 0 11.9 14.7 23.1 35.9 27.5 5.1 1 9.5 2.1 9.7 2.3.2.2-6.8 21.7-15.5 47.8l-15.8 47.4-15.6-47.3-15.5-47.3 4.8-14.4c4.8-14.5 4.9-14.5 2.5-14.5-2.3 0-3.4 2.1-8.8 18.2l-1.2 3.8-3.4-11-3.4-11h-10.3c-6.4 0-10.4.4-10.4 1s3.1 10.5 6.9 22l6.8 20.9-6.8 5.1c-8.9 6.6-14.5 13-18.3 21-2.7 5.7-3.1 7.5-3 15 0 9.6 2.2 16 8.2 23.8 3.1 4.1 3.2 4.6 2.1 8-.6 2-1.4 4.1-1.7 4.6-.2.4-9.5-26.6-20.6-60l-20.2-60.9-10.7-.3c-6.3-.2-10.7.1-10.7.7 0 1.2 52.8 158.3 53.5 158.9.6.6.3 1.3 8.3-22.9l6.8-20.5 5 3.8c6.4 5 24 14 33 16.8l7.1 2.3 3.3 10.3c1.9 5.7 3.6 10.1 3.9 9.8.3-.3 1.8-4 3.2-8.2 3-8.9 1.8-8.4 17.4-6.4 12.5 1.6 37.2 1.5 50.8-.3 38.9-5.1 71.7-22.4 82.2-43.4 5.3-10.5 5.1-22.8-.6-35.1-2.3-4.9-5.2-8.6-12.2-15.5-13.7-13.4-30.2-22.3-52.1-28-10.3-2.7-28-5.5-35-5.5-2.5 0-4.6-.3-4.6-.6 0-.4 1.1-3.8 2.5-7.6 3.1-8.5 3.1-8.8.2-8.8-2 0-2.6 1.1-4.8 7.7l-2.6 7.8-4.2-.3c-5.5-.3-14.4-3.7-18.3-7-1.7-1.4-3.9-4.4-4.9-6.7-4.6-10-.1-20.2 11.6-26.3 4.3-2.2 6.5-2.7 16-3 7.7-.3 13 .1 17.8 1.2 16.2 3.8 28.7 13.4 28.7 22.1 0 2 .5 2.5 2.5 2.5 2.2 0 2.4-.3 1.8-3.3-2.1-10.9-14.3-20.2-32-24.1-8.9-2-28.2-2-37.3 0zm45.7 60.9c27.2 5.1 49.2 18.4 57.2 34.7 12.4 25.3-.4 50.4-33.4 65.9-21.4 10-49.8 13-79.4 8.3-4.6-.7-8.4-1.4-8.5-1.6-.2-.2 37-110.2 37.3-110.3.6-.4 20.7 1.9 26.8 3zm-108.6 19.2c.8 2.2-.4 6.8-7.7 28.7-4.8 14.4-9 26.5-9.4 27-2.2 2.3-9-14-9-21.4 0-9 5.3-20.1 13.2-27.6 3.9-3.7 10.9-9.4 11.6-9.4.1 0 .7 1.2 1.3 2.7zm27.5 82.5c.4 1.4-1.4 1-9.3-2.3-11.8-5-16.7-7.7-25.4-14.2l-6.7-4.9 8.6-25.7 8.5-25.6 11.9 35.5 12.4 37.2z" /></svg>
                        </div>
                        <div class="hidden sm:block sm:ml-6">
                            <div class="flex space-x-4">
                                <span x-data="{ open: false }" @click.away="open = false" @close.stop="open = false" class="hover:bg-opacity-25 hover:bg-white rounded-md  relative">
                                    <span class="flex items-center text-white px-2 mt-1">
                                        <button @click="open = ! open" class="mt-1 text-white focus:outline-none font-bold">Supporting Forms</button>
                                        <svg class="w-4 h-4 stroke-current mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </span>
                                    <div :class="{'block': open, 'hidden': ! open}" class="rounded-md shadow-lg">
                                        <div class="absolute right-0 mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-20">
                                            <a href="#" class="block px-4 py-2 text-base capitalize text-gray-700 hover:bg-blue-500 hover:text-white">Customers</a>
                                            <a href="{{ route('uoms.index') }}" class="block px-4 py-2 text-base capitalize text-gray-700 hover:bg-blue-500 hover:text-white">UOM's</a>
                                            <a href="#" class="block px-4 py-2 text-base capitalize text-gray-700 hover:bg-blue-500 hover:text-white">Payment Terms</a>
                                            <a href="#" class="block px-4 py-2 text-base capitalize text-gray-700 hover:bg-blue-500 hover:text-white">Tax</a>
                                            <a href="{{ route('cities.index') }}" class="block px-4 py-2 text-base capitalize text-gray-700 hover:bg-blue-500 hover:text-white">Cities</a>
                                        </div>

                                    </div>
                                </span>
                                <a href="#" class="text-white hover:bg-opacity-25 hover:bg-white px-2 py-2 rounded-md font-bold">Products</a>
                                <a href="#" class="text-white hover:bg-opacity-25 hover:bg-white px-2 py-2 rounded-md font-bold">Estimates</a>
                                <a href="#" class="text-white hover:bg-opacity-25 hover:bg-white px-2 py-2 rounded-md font-bold">Purchase Order</a>
                                <a href="#" class="text-white hover:bg-opacity-25 hover:bg-white px-2 py-2 rounded-md font-bold">Delivery Challan</a>
                                <a href="#" class="text-white hover:bg-opacity-25 hover:bg-white px-2 py-2 rounded-md font-bold">Bill</a>
                                <a href="#" class="text-white hover:bg-opacity-25 hover:bg-white px-2 py-2 rounded-md font-bold">Sales Invoice</a>
                                <span x-data="{ open: false }" @click.away="open = false" @close.stop="open = false" class="hover:bg-opacity-25 hover:bg-white rounded-md  relative">
                                    <span class="flex items-center text-white px-2 mt-1">
                                        <button @click="open = ! open" class="mt-1 text-white focus:outline-none font-bold">Reports</button>
                                        <svg class="w-4 h-4 stroke-current mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </span>
                                    <div :class="{'block': open, 'hidden': ! open}" class="rounded-md shadow-lg">
                                        <div class="absolute right-0 mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-20">
                                            <a href="/cities" class="block px-4 py-2 text-base capitalize text-gray-700 hover:bg-blue-500 hover:text-white">Customers</a>
                                            <a href="/banks" class="block px-4 py-2 text-base capitalize text-gray-700 hover:bg-blue-500 hover:text-white">UOM's</a>
                                            <a href="#" class="block px-4 py-2 text-base capitalize text-gray-700 hover:bg-blue-500 hover:text-white">Payment Terms</a>
                                            <a href="#" class="block px-4 py-2 text-base capitalize text-gray-700 hover:bg-blue-500 hover:text-white">Tax</a>
                                            <a href="#" class="block px-4 py-2 text-base capitalize text-gray-700 hover:bg-blue-500 hover:text-white">Cities</a>
                                        </div>

                                    </div>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                        <!-- Profile dropdown -->
                        <div class="sm:flex sm:items-center sm:ml-6">
                            <x-jet-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    </button>
                                    @else
                                    <button class="flex items-center font-bold text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                        <div>{{ Auth::user()->name }}</div>

                                        <div class="ml-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                    @endif
                                </x-slot>

                                <x-slot name="content">
                                    <!-- Account Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Account') }}
                                    </div>

                                    <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                        {{ __('Profile') }}
                                    </x-jet-dropdown-link>

                                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                        {{ __('API Tokens') }}
                                    </x-jet-dropdown-link>
                                    @endif

                                    @can('user_access')
                                        <x-jet-dropdown-link href="{{ route('users.index') }}" :active="request()->routeIs('users.*')">
                                            Users
                                        </x-jet-dropdown-link>

                                        <x-jet-dropdown-link href="{{ route('settings.index') }}" :active="request()->routeIs('settings.*')">
                                            Settings
                                        </x-jet-dropdown-link>
                                    @endcan
                                    <div class="border-t border-gray-100"></div>

                                    <!-- Team Management -->
                                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-jet-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                    <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                        {{ __('Create New Team') }}
                                    </x-jet-dropdown-link>
                                    @endcan

                                    <div class="border-t border-gray-100"></div>

                                    <!-- Team Switcher -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Switch Teams') }}
                                    </div>

                                    @foreach (Auth::user()->allTeams() as $team)
                                    <x-jet-switchable-team :team="$team" />
                                    @endforeach

                                    <div class="border-t border-gray-100"></div>
                                    @endif

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            {{ __('Logout') }}
                                        </x-jet-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-jet-dropdown>
                        </div>
                    </div>
                </div>
            </div>
            <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                <div class="px-2 pt-2 pb-3 space-y-1">
                    <a href="#" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium">Dashboard</a>
                    <span x-data="{ open: false }" @click.away="open = false" @close.stop="open = false" class="block hover:bg-opacity-25 hover:bg-white rounded-md  relative">
                        <button @click="open = ! open" class="mt-1 text-white focus:outline-none font-bold px-3 py-2 text-base">Supporting Forms </button>
                        <div :class="{'block': open, 'hidden': ! open}" class="rounded-md shadow-lg">
                            <div class="absolute mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-20">
                                <a href="/cities" class="block px-4 py-2 text-base capitalize text-gray-700 hover:bg-blue-500 hover:text-white">Customers</a>
                                <a href="/banks" class="block px-4 py-2 text-base capitalize text-gray-700 hover:bg-blue-500 hover:text-white">UOM's</a>
                                <a href="#" class="block px-4 py-2 text-base capitalize text-gray-700 hover:bg-blue-500 hover:text-white">Payment Terms</a>
                                <a href="#" class="block px-4 py-2 text-base capitalize text-gray-700 hover:bg-blue-500 hover:text-white">Tax</a>
                                <a href="#" class="block px-4 py-2 text-base capitalize text-gray-700 hover:bg-blue-500 hover:text-white">Cities</a>
                            </div>

                        </div>
                    </span>
                    <a href="#" class="text-white hover:bg-opacity-25 hover:bg-white px-3 py-2 rounded-md text-base font-medium  block">Products</a>
                    <a href="#" class="text-white hover:bg-opacity-25 hover:bg-white px-3 py-2 rounded-md text-base font-medium  block">Estimates</a>
                    <a href="#" class="text-white hover:bg-opacity-25 hover:bg-white px-3 py-2 rounded-md text-base font-medium  block">Purchase Order</a>
                    <a href="#" class="text-white hover:bg-opacity-25 hover:bg-white px-3 py-2 rounded-md text-base font-medium  block">Delivery Challan</a>
                    <a href="#" class="text-white hover:bg-opacity-25 hover:bg-white px-3 py-2 rounded-md text-base font-medium  block">Bill</a>
                    <a href="#" class="text-white hover:bg-opacity-25 hover:bg-white px-3 py-2 rounded-md text-base font-medium  block">Sales Invoice</a>
                    <span x-data="{ open: false }" @click.away="open = false" @close.stop="open = false" class="block hover:bg-opacity-25 hover:bg-white rounded-md  relative">
                        <button @click="open = ! open" class="mt-1 text-white focus:outline-none font-bold px-3 py-2 text-base">Reports </button>
                        <div :class="{'block': open, 'hidden': ! open}" class="rounded-md shadow-lg">
                            <div class="absolute mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-20">
                                <a href="/cities" class="block px-4 py-2 text-base capitalize text-gray-700 hover:bg-blue-500 hover:text-white">Customers</a>
                                <a href="/banks" class="block px-4 py-2 text-base capitalize text-gray-700 hover:bg-blue-500 hover:text-white">UOM's</a>
                                <a href="#" class="block px-4 py-2 text-base capitalize text-gray-700 hover:bg-blue-500 hover:text-white">Payment Terms</a>
                                <a href="#" class="block px-4 py-2 text-base capitalize text-gray-700 hover:bg-blue-500 hover:text-white">Tax</a>
                                <a href="#" class="block px-4 py-2 text-base capitalize text-gray-700 hover:bg-blue-500 hover:text-white">Cities</a>
                            </div>

                        </div>
                    </span>
                </div>
            </div>
        </nav>
