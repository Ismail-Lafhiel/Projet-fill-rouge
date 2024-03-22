<x-guest-layout>
    <x-header />
    <section class="container mx-auto px-5 py-2 lg:px-32 lg:pt-24">
        <div class="py-6 lg:max-w-7xl max-w-2xl max-lg:mx-auto">
            <div class="grid items-start grid-cols-1 lg:grid-cols-2 gap-10">
                <div class="w-full lg:sticky top-0 text-center">
                    <div class="lg:h-[600px]">
                        @if ($room->photos->isNotEmpty())
                            <img id="featuredImage" src="{{ asset('storage/' . $room->photos->first()->path) }}"
                                alt="Featured Room Photo"
                                class="lg:w-11/12 w-full h-full rounded-xl object-cover object-top" />
                        @else
                            <img id="featuredImage" src="{{ asset('storage/place_holder_img.jpg') }}"
                                alt="Placeholder Image"
                                class="lg:w-11/12 w-full h-full rounded-xl object-cover object-top" />
                        @endif
                    </div>
                    <div class="flex flex-wrap gap-x-8 gap-y-6 justify-center mx-auto mt-6">
                        @foreach ($room->photos as $photo)
                            <img src="{{ asset('storage/' . $photo->path) }}" alt="Room Photo"
                                class="thumbnail w-20 cursor-pointer rounded-xl outline" />
                        @endforeach
                    </div>
                </div>

                <div>
                    <div class="flex flex-wrap items-start gap-4">
                        <div>
                            <div class="flex space-x-3">
                                <h2 class="text-2xl font-extrabold text-gray-800">{{ $room->room_type }}</h2>
                                @if ($room->availability == 'available')
                                    <p class="text-md text-green-400 capitalize mt-1.5">
                                        {{ $room->availability }}</p>
                                @else
                                    <p class="text-md text-red-400 capitalize mt-1.5">
                                        {{ $room->availability }}</p>
                                @endif
                            </div>
                            <p class="text-sm text-gray-400 mt-2">
                                {{ $room->hotel->name }}</p>
                        </div>
                        <div class="ml-auto flex flex-wrap gap-4">
                            <button type="button"
                                class="px-2.5 py-1.5 bg-primary-100 text-xs text-primary-600 rounded-md flex items-center">
                                <svg class="w-3 mr-1" fill="currentColor" viewBox="0 0 14 13"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                                </svg>
                                {{ $room->rating }}
                            </button>
                        </div>
                    </div>
                    <hr class="my-8" />
                    <div class="flex flex-wrap gap-4 items-start">
                        <div>
                            <p class="text-gray-800 text-3xl font-bold">${{ $room->price }}</p>
                        </div>
                    </div>
                    <hr class="my-8" />
                    <div class="flex flex-wrap gap-4">
                        <button type="button"
                            class="min-w-[200px] px-4 py-3 bg-primary-800 hover:bg-primary-900 text-white text-sm font-bold rounded">book
                            now</button>
                        <button type="button"
                            class="min-w-[200px] px-4 py-2.5 border border-primary-800 bg-transparent hover:bg-primary-50 text-primary-800 text-sm font-bold rounded">Continue
                            browzing</button>
                    </div>
                </div>
            </div>
            <div class="mt-24 max-w-4xl">
                <ul class="flex border-b">
                    <li
                        class="text-gray-800 font-bold text-sm bg-gray-100 py-3 px-8 border-b-2 border-gray-800 cursor-pointer transition-all">
                        Description</li>
                </ul>
                <div class="mt-8">
                    <h3 class="text-lg font-bold text-gray-800">Hotel Description</h3>
                    <p class="text-sm text-gray-400 mt-4">{{ $room->description }}
                    </p>
                </div>
                <ul class="space-y-3 list-disc mt-6 pl-4 text-sm text-gray-400">
                    <li class="capitalize">{{ $room->number_of_beds }} beds</li>
                    <li class="capitalize">bathroom</li>
                    <li class="capitalize">breakfast and lunch</li>
                    <li class="capitalize">wifi free</li>
                </ul>
            </div>
        </div>
    </section>
    <x-footer />
</x-guest-layout>
