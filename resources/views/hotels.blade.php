<x-guest-layout>
    <x-header />
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
        <div class="flex justify-between my-10 md:mt-0">
            <div>
                <h1
                    class="max-w-2xl mb-4 text-3xl font-bold tracking-tight leading-none md:text-4xl xl:text-5xl text-gray-900">
                    All Hotels</h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 text-sm md:text-md lg:text-lg">View all hotels
                    from all around the world</p>
            </div>
            <form class="flex flex-col md:flex-row gap-3" id="searchHotelForm" method="POST"
                action="{{ route('searchHotels') }}">
                @csrf
                <div class="flex">
                    <input type="text" name="name" placeholder="Search for your prefered hotel"
                        class="w-full md:w-80 px-3 h-10 border-2  focus:outline-none focus:border-none rounded-lg">
                </div>
                <select id="location_id" name="location_id"
                    class="w-full h-10 border-2  focus:outline-none focus:border-none text-gray-600 px-2 md:px-3 py-0 md:py-1 tracking-wider rounded-lg">
                    <option value="#" class="text-gray-500" selected>All</option>
                    @foreach ($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->city }}, {{ $location->country }}</option>
                    @endforeach
                </select>
                <div>
                    <button type="submit"
                        class="inline-flex px-3 py-2 text-white bg-primary-500 rounded-lg hover:bg-primary-600">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                            class="w-3 h-3 my-auto mr-2 fill-white">
                            <path
                                d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                        </svg>Search</button>
                </div>
            </form>
        </div>
        <div id="searchHotelResults" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @if ($hotels->isEmpty())
                <p>No results found</p>
            @else
                @foreach ($hotels as $hotel)
                    <div class="cursor-pointer rounded-xl bg-white p-3 shadow-lg hover:shadow-xl">
                        <div class="relative flex items-end overflow-hidden rounded-xl"
                            onclick="window.location.href = '{{ route('hotel.view', $hotel->id) }}'">
                            @if ($hotel->photos->isNotEmpty())
                                @foreach ($hotel->photos as $photo)
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

                            <span class="ml-1 text-sm text-slate-400">{{ $hotel->rating }}</span>
                        </div>
                    </div>

                    <div class="mt-1 p-2">
                        <h2 class="text-slate-700">{{ $hotel->name }}</h2>
                        <p class="mt-1 text-sm text-slate-400">{{ $hotel->location->city }},
                            {{ $hotel->location->country }}</p>

                        <div class="mt-3 flex items-end justify-between">
                            <p>
                                <span
                                    class="text-lg font-bold text-primary-500">{{ $hotel->number_of_rooms }}</span>
                                <span class="text-sm text-slate-400">room available</span>
                            </p>
                            <div class="group inline-flex rounded-xl bg-primary-100 p-2 hover:bg-primary-200">
                                <button type="button" class="bookmark-btn focus:outline-none"
                                    data-entityid="{{ $hotel->id }}" data-entitytype="hotel">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-4 text-primary-400 group-hover:text-primary-500"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <div class="px-2 py-10">
        {!! $hotels->links() !!}
    </div>
</section>
<x-footer />
</x-guest-layout>
