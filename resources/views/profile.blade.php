<x-app-layout>
    <x-header />
    <div class="flex-col w-full md:flex md:flex-row md:min-h-screen">
        <div @click.away="open = false"
            class="flex flex-col flex-shrink-0 w-full text-gray-700 bg-white md:w-64 dark:text-gray-200 dark:bg-gray-800"
            x-data="{ open: false }">
            <div class="flex flex-row items-center justify-between flex-shrink-0 mx-auto my-8">
                {{-- <x-dashboard-logo /> --}}
            </div>
            <nav :class="{ 'block': open, 'hidden': !open }"
                class="flex-grow px-4 pb-4 md:block md:pb-0 md:overflow-y-auto">
                <x-profile-link :active="request()->routeIs('user.profile')" href="{{ route('user.profile') }}">Profile
                </x-profile-link>
                {{-- <x-profile-link :active="request()->routeIs('locations.index')" href="{{ route('locations.index') }}">Booking
                </x-profile-link> --}}
                <div @click.away="open = false" class="relative" x-data="{ open: false }">
                    <button @click="open = !open"
                        class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark:bg-transparent dark:focus:text-white dark:hover:text-white dark:focus:bg-primary-600 dark:hover:bg-primary-600 md:block hover:text-primary-900 focus:text-primary-900 hover:bg-primary-200 focus:bg-primary-200 focus:outline-none focus:shadow-outline">
                        <span>
                            {{-- {{ Auth::user()->name }} --}}
                            Ahmad Sumbul
                        </span>
                        <svg fill="currentColor" viewBox="0 0 20 20" :class="{ 'rotate-180': open, 'rotate-0': !open }"
                            class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg">
                        <div class="px-2 py-2 bg-white rounded-md shadow dark:bg-gray-700">
                            {{-- <x-dropdown-link href="{{ route('user_profile') }}"
                                class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-primary-600 dark:focus:text-white dark:hover:text-white dark:text-primary-200 md:mt-0 hover:text-primary-900 focus:text-primary-900 hover:bg-primary-200 focus:bg-primary-200 focus:outline-none focus:shadow-outline">
                                {{ __('Edit profile') }}
                            </x-dropdown-link> --}}
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">{{ __('Log Out') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div class="flex w-full bg-slate-50">
            <div class="p-6">
                <div class="p-8 bg-white shadow mt-24">
                    <div class="grid grid-cols-1 md:grid-cols-3">
                        <div class="grid grid-cols-3 text-center order-last md:order-first mt-20 md:mt-0">
                            <div>
                                <p class="font-bold text-gray-700 text-xl">22</p>
                                <p class="text-gray-400">Friends</p>
                            </div>
                            <div>
                                <p class="font-bold text-gray-700 text-xl">10</p>
                                <p class="text-gray-400">Photos</p>
                            </div>
                            <div>
                                <p class="font-bold text-gray-700 text-xl">89</p>
                                <p class="text-gray-400">Comments</p>
                            </div>
                        </div>
                        <div class="relative">
                            <div
                                class="w-48 h-48 bg-indigo-100 mx-auto rounded-full shadow-2xl absolute inset-x-0 top-0 -mt-24 flex items-center justify-center text-indigo-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>

                        <div class="space-x-8 flex justify-between mt-32 md:mt-0 md:justify-center">
                            <button
                                class="text-white py-2 px-4 uppercase rounded bg-blue-400 hover:bg-blue-500 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5">
                                Connect
                            </button>
                            <button
                                class="text-white py-2 px-4 uppercase rounded bg-gray-700 hover:bg-gray-800 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5">
                                Message
                            </button>
                        </div>
                    </div>

                    <div class="mt-20 text-center border-b pb-12">
                        <h1 class="text-4xl font-medium text-gray-700">Jessica Jones, <span
                                class="font-light text-gray-500">27</span></h1>
                        <p class="font-light text-gray-600 mt-3">Bucharest, Romania</p>

                        <p class="mt-8 text-gray-500">Solution Manager - Creative Tim Officer</p>
                        <p class="mt-2 text-gray-500">University of Computer Science</p>
                    </div>

                    <div class="mt-12 flex flex-col justify-center">
                        <p class="text-gray-600 text-center font-light lg:px-16">An artist of considerable range, Ryan —
                            the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and
                            records all of his own music, giving it a warm, intimate feel with a solid groove structure.
                            An artist of considerable range.</p>
                        <button class="text-indigo-500 py-2 px-4  font-medium mt-4">
                            Show more
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <x-footer />
</x-app-layout>
