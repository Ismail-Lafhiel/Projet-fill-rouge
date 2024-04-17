<x-guest-layout>
    <x-header />
    <section class="bg-white relative dark:bg-gray-900" id="background-slider"
        style="background: url('http://127.0.0.1:8000/storage/slider_imgs/greece.jpg'); background-size: cover; background-repeat: no-repeat; background-position: center; padding-top: 120px; padding-bottom: 120px; position: relative;">
        <div class="bg-black opacity-50 absolute inset-0 z-0"></div> <!-- Overlay element -->
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 relative z-10">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1
                    class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl text-white">
                    Where Luxury Meets Comfort</h1>
                <p class="max-w-2xl mb-6 font-medium text-gray-200 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                    EliteStay, Your Ultimate Retreat!</p>
                <a href="{{ route('login') }}"
                    class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">Sign
                    in / Register</a>
            </div>
        </div>
        <form class="mx-auto absolute top-[95%] left-[50%] translate-x-[-50%] flex">
            <div class="border-4 border-blue-500 rounded-s-lg w-full">
                <div class="relative">
                    <input type="search" id="default-search"
                        class="block w-full p-4 text-sm text-gray-900 focus:ring-0 border-none bg-gray-50"
                        placeholder="Where are you going?" required />
                </div>
            </div>
            <div class="border-4 border-l-0 border-blue-500 hidden md:block w-full">
                <div class="relative">
                    <input id="start" name="start" type="text" onfocus="(this.type='date')"
                        placeholder="Check in" onblur="(this.type='text')"
                        class="block text-center w-full p-4 text-md text-gray-900 focus:ring-0 border-none bg-gray-50" />
                </div>
            </div>
            <div class="border-4 border-l-0 border-blue-500 hidden md:block w-full">
                <div class="relative">
                    <input id="end" name="end" type="text" onfocus="(this.type='date')"
                        placeholder="Check out" onblur="(this.type='text')"
                        class="block text-center w-full p-4 text-md text-gray-900 border-none bg-gray-50 focus:ring-0" />
                </div>
            </div>
            <div class="border-4 border-l-0 border-blue-500 rounded-e-xl">
                <button type="button"
                    class="block w-full p-4 px-10 text-md rounded-e-lg bg-primary-600 text-white">Search</button>
            </div>
        </form>
    </section>

    <section class="container mx-auto px-5 py-2 lg:px-32 lg:pt-24">
        <h2 class="max-w-2xl mb-4 text-xl font-bold tracking-tight leading-none md:text-2xl xl:text-3xl text-gray-900">
            Latest destinations</h2>
        <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 text-sm md:text-md lg:text-lg">Most popular choices
            for travellers</p>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4">
            @foreach ($locations as $location)
                <div class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl px-8 pb-8 pt-40 w-[320px] h-[400px] mx-auto mt-4
                    transition duration-300 transform hover:scale-105 cursor-pointer"
                    onclick="window.location.href = '{{ route('hotels.location', $location->city) }}'">
                    @foreach ($location->photos as $photo)
                        <img src="{{ asset('storage/' . $photo->path) }}" alt=""
                            class="absolute inset-0 h-full w-full object-cover">
                    @endforeach
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
                    <h3 class="z-10 mt-3 text-3xl font-bold text-white">
                        {{ $location->city . ', ' . $location->country }}</h3>
                </div>
            @endforeach
        </div>
        <div class="mt-5 mb-10 mx-auto text-center">
            <button type="button" onclick="window.location.href = '{{ route('destinations') }}'"
                class="text-primary-500 bg-transparent hover:bg-primary-800 focus:ring-4 border-2 border-primary-500 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 hover:text-white">View
                All Destinations</button>
        </div>
    </section>
    <section class="container mx-auto px-5 py-2 lg:px-32 lg:pt-24">
        <h2 class="max-w-2xl mb-4 text-xl font-bold tracking-tight leading-none md:text-2xl xl:text-3xl text-gray-900">
            Popular Places in Morocco</h2>
        <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 text-sm md:text-md lg:text-lg">Most popular choices
            for travellers</p>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4">
            @foreach ($locationsInMorocco as $location)
                <div class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl px-8 pb-8 pt-40 w-[320px] h-[400px] mx-auto mt-4
                    transition duration-300 transform hover:scale-105 cursor-pointer"
                    onclick="window.location.href = '{{ route('hotels.location', $location->city) }}'">
                    @foreach ($location->photos as $photo)
                        <img src="{{ asset('storage/' . $photo->path) }}" alt=""
                            class="absolute inset-0 h-full w-full object-cover">
                    @endforeach
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
                    <h3 class="z-10 mt-3 text-3xl font-bold text-white">
                        {{ $location->city . ', ' . $location->country }}</h3>
                </div>
            @endforeach
        </div>
        <div class="mt-5 mb-10 mx-auto text-center">
            <button type="button" onclick="window.location.href = '{{ route('destinations') }}'"
                class="text-primary-500 bg-transparent hover:bg-primary-800 focus:ring-4 border-2 border-primary-500 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 hover:text-white">View
                All Destinations</button>
        </div>
    </section>
    <section class="container mx-auto px-5 py-2 lg:px-32">
        <h2 class="max-w-2xl mb-4 text-xl font-bold tracking-tight leading-none md:text-2xl xl:text-3xl text-gray-900">
            Top rated hotels</h2>
        <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 text-sm md:text-md lg:text-lg">The 6 best rated hotels
        </p>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($hotels as $hotel)
                <div class="cursor-pointer rounded-xl bg-white p-3 shadow-lg hover:shadow-xl"
                    onclick="window.location.href = '{{ route('hotel.view', $hotel->id) }}'">
                    <div class="relative flex items-end overflow-hidden rounded-xl">
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
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20"
                            fill="currentColor">
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
                            <span class="text-lg font-bold text-primary-500">{{ $hotel->number_of_rooms }}</span>
                            <span class="text-sm text-slate-400">room available</span>
                        </p>

                        <div class="group inline-flex rounded-xl bg-primary-100 p-2 hover:bg-primary-200">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4 text-primary-400 group-hover:text-primary-500" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-5 mb-10 mx-auto text-center">
        <button type="button" onclick="window.location.href = '{{ route('hotels.view') }}'"
            class="text-primary-500 bg-transparent hover:bg-primary-800 focus:ring-4 border-2 border-primary-500 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 hover:text-white">View
            All Hotels</button>
    </div>
</section>
<section class="container mx-auto px-5 py-2 lg:px-32">
    <h2 class="max-w-2xl mb-4 text-xl font-bold tracking-tight leading-none md:text-2xl xl:text-3xl text-gray-900">
        Top rated rooms</h2>
    <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 text-sm md:text-md lg:text-lg">The 6 best rated
        rooms</p>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($rooms as $room)
            <div class="cursor-pointer rounded-xl bg-white p-3 shadow-lg hover:shadow-xl"
                onclick="window.location.href = '{{ route('room.view', $room->id) }}'">
                <div class="relative flex items-end overflow-hidden rounded-xl">
                    @if ($room->photos->isNotEmpty())
                        @foreach ($room->photos as $photo)
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

                    <span class="ml-1 text-sm text-slate-400">{{ $room->rating }}</span>
                </div>
            </div>

            <div class="mt-1 p-2">
                <h2 class="text-slate-700 text-md font-bold">{{ $room->roomType->name }} room</h2>
                <p class="mt-1 text-sm text-slate-400">{{ $room->hotel->name }}</p>
                <div class="mt-3 flex items-end justify-between">
                    <p>
                        <span class="text-lg font-bold text-primary-500">${{ $room->price }}</span>
                        <span class="text-sm text-slate-400">/night</span>
                    </p>

                    <div class="group inline-flex rounded-xl bg-primary-100 p-2 hover:bg-primary-200">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 text-primary-400 group-hover:text-primary-500" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="mt-5 mb-10 mx-auto text-center">
    <button type="button" onclick="window.location.href = '{{ route('rooms.view') }}'"
        class="text-primary-500 bg-transparent hover:bg-primary-800 focus:ring-4 border-2 border-primary-500 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 hover:text-white">View
        All Rooms</button>
</div>
</section>
<x-footer />
</x-guest-layout>
