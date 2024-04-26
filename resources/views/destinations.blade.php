<x-guest-layout>
    <x-header />
    <section class="container mx-auto px-5 py-2 lg:px-32 lg:py-24">
        <div class="flex justify-between my-10 md:mt-0">
            <div>
                <h1
                    class="max-w-2xl mb-4 text-3xl font-bold tracking-tight leading-none md:text-4xl xl:text-5xl text-gray-900">
                    All Destinations</h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 text-sm md:text-md lg:text-lg">View all
                    destinations
                    from all around teh world</p>
            </div>
            <form id="searchDestinationForm" class="flex flex-col md:flex-row gap-3" action="{{ route('searchDestinations') }}"
                method="POST">
                @csrf
                <div class="flex">
                    <input type="text" id="cityInput" name="city"
                        placeholder="Search for a destination by city or country"
                        class="w-full md:w-80 px-3 h-10 border-2 focus:outline-none focus:border-none rounded-lg">
                </div>
                <select id="country" name="country"
                    class="w-full h-10 border-2 focus:outline-none focus:border-none text-gray-600 px-2 md:px-3 py-0 md:py-1 tracking-wider rounded-lg">
                    <option value="#" class="text-gray-500" selected>All</option>
                    @foreach ($locations->pluck('country')->unique() as $country)
                        <option value="{{ $country }}">{{ $country }}</option>
                    @endforeach
                </select>
                <div>
                    <button type="submit"
                        class="inline-flex px-3 py-2 text-white bg-primary-500 rounded-lg hover:bg-primary-600">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-3 h-3 my-auto mr-2 fill-white">
                            <path
                                d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                        </svg>Search</button>
                </div>
            </form>
        </div>
        <div id="searchDestinationResults" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-3 lg:gap-10">
            @if ($locations->isEmpty())
                <p>No results found</p>
            @else
                @foreach ($locations as $location)
                    <div class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl px-8 pb-8 pt-40 w-[320px] h-[400px] mx-auto mt-4 transition duration-300 transform hover:scale-105 cursor-pointer"
                        onclick="window.location.href = '{{ route('hotels.location', $location->city) }}'">
                        @foreach ($location->photos as $photo)
                            <img src="{{ asset('storage/' . $photo->path) }}" alt=""
                                class="absolute inset-0 h-full w-full object-cover">
                        @endforeach
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
                        <h3 class="z-10 mt-3 text-3xl font-bold text-white">
                            {{ $location->city . ', ' . $location->country }}
                        </h3>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="px-2 py-10">
            {!! $locations->links() !!}
        </div>
    </section>
    <x-footer />
</x-guest-layout>
