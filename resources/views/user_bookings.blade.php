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
                <x-profile-link :active="request()->routeIs('user.bookings', $user->id)" href="{{ route('user.bookings', $user->id) }}">Booking
                </x-profile-link>
                <div @click.away="open = false" class="relative" x-data="{ open: false }">
                    <button @click="open = !open"
                        class="flex flex-row items-center w-full capitalize px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark:bg-transparent dark:focus:text-white dark:hover:text-white dark:focus:bg-primary-600 dark:hover:bg-primary-600 md:block hover:text-primary-900 focus:text-primary-900 hover:bg-primary-200 focus:bg-primary-200 focus:outline-none focus:shadow-outline">
                        <span>
                            {{ Auth::user()->name }}
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
        <section class="container mx-auto px-5 py-2 lg:px-32 lg:py-24">
            <h2
                class="max-w-2xl mb-5 text-2xl font-bold tracking-tight leading-none md:text-3xl xl:text-4xl text-gray-900">
                Your Bookings</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-10">
                @foreach ($bookings as $booking)
                    <div
                        class="cursor-pointer rounded-xl bg-white p-3 shadow-lg hover:shadow-xl
                        @if ($booking->status === 'canceled') opacity-50 cursor-not-allowed @endif">
                        <div class="relative flex items-end overflow-hidden rounded-xl"
                            onclick="window.location.href = '{{ route('room.view', $booking->room_id) }}'">
                            @if ($booking->room->photos->isNotEmpty())
                                @foreach ($booking->room->photos as $photo)
                                    <img class="h-[250px] w-full" src="{{ asset('storage/' . $photo->path) }}"
                                        alt="Room Photo" />
                                @break
                            @endforeach
                        @else
                            <img class="h-[250px] w-full" src="{{ asset('storage/place_holder_img.jpg') }}"
                                alt="Placeholder" />
                        @endif
                        <div
                            class="absolute bottom-3 left-3 inline-flex items-center rounded-lg bg-white p-2 shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>

                            <span class="ml-1 text-sm text-slate-400">{{ $booking->room->rating }}</span>
                        </div>
                    </div>

                    <div class="mt-1 p-2">
                        <h2 class="text-slate-700 text-md font-bold">{{ $booking->room->roomType->name }} room</h2>
                        <p class="mt-1 text-sm text-slate-400">{{ $booking->room->hotel->name }}</p>
                        <div class="mt-3 flex items-end justify-between">
                            <p>
                                <span
                                    class="text-lg font-bold text-primary-500">${{ $booking->room->price }}</span>
                                <span class="text-sm text-slate-400">/night</span>
                            </p>

                            <div class="group inline-flex rounded-xl bg-primary-100 p-2 hover:bg-primary-200">
                                @if ($booking->status === 'canceled')
                                    <button type="button" disabled
                                        class="focus:outline-none opacity-50 cursor-not-allowed text-xs">
                                        cancelled
                                    </button>
                                @else
                                    <button type="button" id="deleteButton" data-modal-target="deleteModal"
                                        data-modal-toggle="deleteModal" data-record-id="{{ $booking->id }}"
                                        data-action="{{ route('cancel.booking', $booking->id) }}"
                                        class="focus:outline-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                            class="h-4 w-4 text-primary-400 group-hover:text-primary-500"
                                            fill="currentColor">
                                            <path
                                                d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                                        </svg>
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Delete Confirmation Modal -->
        <div id="deleteModal" tabindex="-1" aria-hidden="true"
            class="hidden backdrop-brightness-50 overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div
                    class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div
                                class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.636-.664 3.35-1.65.714-.987 1.094-2.39.71-3.872l-3.115-10.94C19.448 1.664 18.352 1 16.813 1H7.187C5.647 1 4.552 1.664 4.45 2.538l-3.114 10.94c-.383 1.482-.004 2.885.71 3.872.714 1.987 1.81 1.65 3.35 1.65z" />
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                    Cancel Booking
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                        Are you sure you want to cancel this booking? This action cannot be undone.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <form id="deleteForm" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                Yes, Cancel
                            </button>
                        </form>
                        <button type="button" data-modal-toggle="deleteModal"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            No, Keep Booking
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="px-2 py-10">
            {!! $bookings->links() !!}
        </div>
    </section>
</div>
<x-footer />
</x-app-layout>
