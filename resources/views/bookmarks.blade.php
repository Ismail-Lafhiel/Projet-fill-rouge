<x-app-layout>
    <x-header />
    <div>
        @if (session()->has('success'))
            <div id="alert-3"
                class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div class="ms-3 text-sm font-medium">
                    {{ session('success') }}
                </div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-3" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif
        @if (session()->has('message'))
            <div id="alert-3"
                class="flex items-center p-4 mb-4 text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-400"
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div class="ms-3 text-sm font-medium">
                    {{ session('message') }}
                </div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-yellow-50 text-yellow-500 rounded-lg focus:ring-2 focus:ring-yellow-400 p-1.5 hover:bg-yellow-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-yellow-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-3" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif
        @if (session()->has('error'))
            <div id="alert-3"
                class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div class="ms-3 text-sm font-medium">
                    {{ session('error') }}
                </div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-3" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif
    </div>
    <div class="flex-col w-full md:flex md:flex-row md:min-h-screen">
        <x-user_side_nav :user_id='$user->id'/>
        <section class="container mx-auto px-5 py-2 lg:px-32 lg:py-24">
            <h1
                class="max-w-2xl mb-5 text-2xl font-bold tracking-tight leading-none md:text-3xl xl:text-4xl text-gray-900">
                Your Bookmarks</h1>
            <h2
                class="mt-10 ml-5 max-w-2xl mb-5 text-lg font-bold tracking-tight leading-none md:text-xl xl:text-2xl text-gray-900">
                Hotel bookmarks</h2>
            <div class="ml-5 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @if ($bookmarkedHotels->isNotEmpty())
                    @foreach ($bookmarkedHotels as $bookmarkedHotel)
                        <div class="cursor-pointer rounded-xl bg-white p-3 shadow-lg hover:shadow-xl">
                            <div class="relative flex items-end overflow-hidden rounded-xl"
                                onclick="window.location.href = '{{ route('hotel.view', $bookmarkedHotel->bookmarkable->id) }}'">
                                @if ($bookmarkedHotel->bookmarkable->photos->isNotEmpty())
                                    @foreach ($bookmarkedHotel->bookmarkable->photos as $photo)
                                        <img class="h-[250px] w-full" src="{{ asset('storage/' . $photo->path) }}"
                                            alt="Hotel Photo" />
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

                                <span
                                    class="ml-1 text-sm text-slate-400">{{ $bookmarkedHotel->bookmarkable->rating }}</span>
                            </div>
                        </div>

                        <div class="mt-1 p-2">
                            <h2 class="text-slate-700">{{ $bookmarkedHotel->bookmarkable->name }}</h2>
                            <p class="mt-1 text-sm text-slate-400">
                                {{ $bookmarkedHotel->bookmarkable->location->city }},
                                {{ $bookmarkedHotel->bookmarkable->location->country }}</p>

                            <div class="mt-3 flex items-end justify-between">
                                <p>
                                    <span
                                        class="text-lg font-bold text-primary-500">{{ $bookmarkedHotel->bookmarkable->number_of_rooms }}</span>
                                    <span class="text-sm text-slate-400">room available</span>
                                </p>
                                <div class="group inline-flex rounded-xl bg-primary-100 p-2 hover:bg-primary-200">
                                    <button type="button" id="deleteButton" data-modal-target="deleteModal"
                                        data-modal-toggle="deleteModal"
                                        data-record-id="{{ $bookmarkedHotel->id }}"
                                        data-action="{{ route('cancel.bookmarkedHotel', $bookmarkedHotel->id) }}"
                                        class="focus:outline-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                            class="h-4 w-4 text-primary-400 group-hover:text-primary-500"
                                            fill="currentColor">
                                            <path
                                                d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="ml-5">No bookmarks found for hotels</p>
            @endif
        </div>
        <h2
            class="mt-10 ml-5 max-w-2xl mb-5 text-lg font-bold tracking-tight leading-none md:text-xl xl:text-2xl text-gray-900">
            Hotel bookmarks</h2>
        <div class="ml-5 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @if ($bookmarkedRooms->isNotEmpty())
                @foreach ($bookmarkedRooms as $bookmarkedRoom)
                    <div class="cursor-pointer rounded-xl bg-white p-3 shadow-lg hover:shadow-xl">
                        <div class="relative flex items-end overflow-hidden rounded-xl"
                            onclick="window.location.href = '{{ route('room.view', $bookmarkedRoom->bookmarkable->id) }}'">
                            @if ($bookmarkedRoom->bookmarkable->photos->isNotEmpty())
                                @foreach ($bookmarkedRoom->bookmarkable->photos as $photo)
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
                            <span
                                class="ml-1 text-sm text-slate-400">{{ $bookmarkedRoom->bookmarkable->rating }}</span>
                        </div>
                    </div>
                    <div class="mt-1 p-2">
                        <h2 class="text-slate-700 text-md font-bold">
                            {{ $bookmarkedRoom->bookmarkable->roomType->name }} room</h2>
                        <p class="mt-1 text-sm text-slate-400">
                            {{ $bookmarkedRoom->bookmarkable->hotel->name }}</p>
                        <div class="mt-3 flex items-end justify-between">
                            <p>
                                <span
                                    class="text-lg font-bold text-primary-500">${{ $bookmarkedRoom->bookmarkable->price }}</span>
                                <span class="text-sm text-slate-400">/night</span>
                            </p>
                            <div class="group inline-flex rounded-xl bg-primary-100 p-2 hover:bg-primary-200">
                                <button type="button" id="deleteButton" data-modal-target="deleteModal"
                                    data-modal-toggle="deleteModal"
                                    data-record-id="{{ $bookmarkedRoom->id }}"
                                    data-action="{{ route('cancel.bookmarkedRoom', $bookmarkedRoom->id) }}"
                                    class="focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                        class="h-4 w-4 text-primary-400 group-hover:text-primary-500"
                                        fill="currentColor">
                                        <path
                                            d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p class="ml-5">No bookmarks found for rooms</p>
        @endif
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
                            <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
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
                            Yes, Delete it from the bookmark
                        </button>
                    </form>
                    <button type="button" data-modal-toggle="deleteModal"
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        No, Keep it
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
<x-footer />
</x-app-layout>
