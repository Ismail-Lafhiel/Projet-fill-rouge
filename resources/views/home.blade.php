<x-guest-layout>
    <x-header />
    <section class="relative bg-cover bg-center bg-fixed" id="background-slider"
        style="background-image: url('http://127.0.0.1:8000/storage/slider_imgs/greece.jpg');">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div class="container mx-auto px-4 py-16 relative z-10 text-white">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mt-10 mb-6">Where Luxury Meets
                    Comfort</h1>
                <p class="text-lg md:text-2xl mb-8">EliteStay, Your Ultimate Retreat!</p>
                <a href="{{ route('login') }}"
                    class="inline-block px-8 py-3 bg-primary-700 hover:bg-primary-800 rounded-lg text-lg font-semibold tracking-wider transition duration-300">Sign
                    in / Register</a>
            </div>
        </div>
        <div class="container mx-auto px-4 pb-8 relative z-20 text-white">
            <form class="mx-auto bg-slate-100 bg-opacity-60 rounded-xl p-6 shadow-xl">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <div>
                        <label for="city" class="text-sm font-medium">Destination</label>
                        <input type="text" id="city" placeholder="Search destinations"
                            class="text-gray-600 mt-2 block w-full rounded-md border border-primary-300 px-3 py-2 focus:outline-none" />
                    </div>
                    <div>
                        <label for="checkin" class="text-sm font-medium">Checkin</label>
                        <input type="date" id="checkin" name=checkin"
                            class="mt-2 block w-full text-gray-600 rounded-md border border-primary-300 px-3 py-2 focus:outline-none" />
                    </div>
                    <div>
                        <label for="checkout" class="text-sm font-medium">Checkout</label>
                        <input type="date" id="checkout" name="checkout"
                            class="mt-2 block w-full text-gray-600 rounded-md border border-primary-300 px-3 py-2 focus:outline-none" />
                    </div>
                    <div>
                        <label for="status" class="text-sm font-medium">Add guests</label>
                        <select id="status"
                            class="mt-2 block w-full rounded-md border border-primary-300 px-3 py-2 focus:outline-none text-gray-600">
                            <option class="text-gray-400" value="#">Select a number</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </div>
                <div class="mt-6 flex justify-end">
                    <button
                        class="mr-4 px-20 py-2 text-md bg-white text-gray-700 rounded-lg hover:bg-gray-100 hover:text-black focus:outline-none focus:ring focus:ring-gray-100 transition duration-100"
                        type="reset">Reset</button>
                    <button
                        class="px-20 py-2 text-md bg-primary-600 text-white rounded-lg hover:bg-primary-700 focus:outline-none focus:ring focus:ring-primary-300 transition duration-300" type="submit">Search</button>
                </div>
            </form>
        </div>
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
