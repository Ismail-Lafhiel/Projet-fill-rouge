<x-guest-layout>
    <x-header />
    <section class="container mx-auto px-5 py-2 lg:px-32 lg:py-24">
        <h1 class="max-w-2xl mb-4 text-3xl font-bold tracking-tight leading-none md:text-4xl xl:text-5xl text-gray-900">
            All Destinations</h1>
        <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 text-sm md:text-md lg:text-lg">View all destinations
            from all around teh world</p>
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
        <div class="px-2 py-10">
            {!! $locations->links() !!}
        </div>
    </section>
    <x-footer />
</x-guest-layout>
