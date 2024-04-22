<x-guest-layout>
    <x-header />
    <section class="container mx-auto px-5 py-2 lg:px-32 lg:py-24">
        <h1 class="max-w-2xl mb-4 text-3xl font-bold tracking-tight leading-none md:text-4xl xl:text-5xl text-gray-900">
            All Hotels</h1>
        <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 text-sm md:text-md lg:text-lg">View all hotels
            from all around the world</p>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
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
                            <button type="button" class="bookmark-btn focus:outline-none"
                                data-entityId="{{ $hotel->id }}" data-entityType="hotel">
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
        </div>
    <div class="px-2 py-10">
        {!! $hotels->links() !!}
    </div>
</section>
<x-footer />
</x-guest-layout>
