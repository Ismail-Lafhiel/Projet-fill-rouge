<x-app-layout>
    <x-header />
    <div class="flex-col w-full md:flex md:flex-row md:min-h-screen">
        <x-user_side_nav :user_id='$user->id' />
        <section class="container mx-auto px-5 py-2 lg:px-32 lg:py-24">
            <div id="toast-success" class="absolute top-[90px] right-10 z-10" style="display: none;">
                <div class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                    role="alert">
                    <div
                        class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                        </svg>
                        <span class="sr-only">Check icon</span>
                    </div>
                    <div class="ms-3 text-sm font-normal">Item moved successfully.</div>
                    <button type="button"
                        class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                        data-dismiss-target="#toast-success" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            </div>
            <div id="toast-error" class="absolute top-[90px] right-10 z-10" style="display: none;">
                <div id="toast-danger"
                    class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                    role="alert">
                    <div
                        class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
                        </svg>
                        <span class="sr-only">Error icon</span>
                    </div>
                    <div class="ms-3 text-sm font-normal">Item has been deleted.</div>
                    <button type="button"
                        class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                        data-dismiss-target="#toast-danger" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            </div>
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
                                    <button type="button" class="deleteButton focus:outline-none"
                                        data-entityid="{{ $bookmarkedHotel->bookmarkable->id }}"
                                        data-entitytype="hotel">
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
                                <button type="button" class="deleteButton focus:outline-none"
                                    data-entityid="{{ $bookmarkedRoom->bookmarkable->id }}"
                                    data-entitytype="room">
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
    </section>
    </div>
<x-footer />
</x-app-layout>
