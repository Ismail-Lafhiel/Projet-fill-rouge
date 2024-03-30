<x-guest-layout>
    <x-header />
    <section class="container mx-auto px-5 py-2 lg:px-32 lg:pt-24">
        <div class="py-6 lg:max-w-7xl max-w-2xl max-lg:mx-auto">
            <div class="grid items-start grid-cols-1 lg:grid-cols-2 gap-10">
                <div class="w-full lg:sticky top-0 text-center">
                    <div class="lg:h-[600px]">
                        @if ($hotel->photos->isNotEmpty())
                            <img id="featuredImage" src="{{ asset('storage/' . $hotel->photos->first()->path) }}"
                                alt="Featured Hotel Photo"
                                class="lg:w-11/12 w-full h-full rounded-xl object-cover object-top" />
                        @else
                            <img id="featuredImage" src="{{ asset('storage/place_holder_img.jpg') }}"
                                alt="Placeholder Image"
                                class="lg:w-11/12 w-full h-full rounded-xl object-cover object-top" />
                        @endif
                    </div>
                    <div class="flex flex-wrap gap-x-8 gap-y-6 justify-center mx-auto mt-6">
                        @foreach ($hotel->photos as $photo)
                            <img src="{{ asset('storage/' . $photo->path) }}" alt="Hotel Photo"
                                class="thumbnail w-20 cursor-pointer rounded-xl outline" />
                        @endforeach
                    </div>
                </div>
                <div>
                    <div class="flex flex-wrap items-start gap-4">
                        <div>
                            <h2 class="text-2xl font-extrabold text-gray-800">{{ $hotel->name }}</h2>
                            <p class="text-sm text-gray-400 mt-2">
                                {{ $hotel->location->city . ', ' . $hotel->location->country }}</p>
                        </div>
                        <div class="ml-auto flex flex-wrap gap-4">
                            <button type="button"
                                class="px-2.5 py-1.5 bg-primary-100 text-xs text-primary-600 rounded-md flex items-center">
                                <svg class="w-3 mr-1" fill="currentColor" viewBox="0 0 14 13"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                                </svg>
                                {{ $hotel->rating }}
                            </button>
                        </div>
                    </div>
                    <hr class="my-8" />
                    <div class="flex flex-wrap gap-4 items-start">
                        <div>
                            <p class="text-gray-800 text-3xl font-bold">{{ $hotel->number_of_rooms }} room available</p>
                        </div>
                    </div>
                    <hr class="my-8" />
                    <div class="flex flex-wrap gap-4">
                        <button type="button"
                            class="min-w-[200px] px-4 py-3 bg-primary-800 hover:bg-primary-900 text-white text-sm font-bold rounded">View
                            available rooms</button>
                        <button type="button"
                            class="min-w-[200px] px-4 py-2.5 border border-primary-800 bg-transparent hover:bg-primary-50 text-primary-800 text-sm font-bold rounded">Continue
                            browzing</button>
                    </div>
                </div>
            </div>
            <div class="mt-24 max-w-4xl">
                <ul class="flex border-b">
                    <li id="descriptionTab"
                        class="text-gray-800 font-bold text-sm bg-gray-100 py-3 px-8 border-b-2 border-gray-800 cursor-pointer transition-all">
                        Description
                    </li>
                    <li id="roomsTab"
                        class="text-gray-400 font-bold text-sm hover:bg-gray-100 py-3 px-8 cursor-pointer transition-all">
                        Rooms
                    </li>
                </ul>
                <div id="descriptionSection" class="mt-8">
                    <h3 class="text-lg font-bold text-gray-800">Hotel Description</h3>
                    <p class="text-sm text-gray-400 mt-4">{{ $hotel->description }}</p>
                </div>
                <div id="roomsSection" class="mt-8 hidden">
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
                                <div class="mt-3 flex items-end justify-between">
                                    <p>
                                        <span
                                            class="text-lg font-bold text-primary-500">${{ $room->price }}</span>
                                        <span class="text-sm text-slate-400">/night</span>
                                    </p>

                                    <div
                                        class="group inline-flex rounded-xl bg-primary-100 p-2 hover:bg-primary-200">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4 text-primary-400 group-hover:text-primary-500"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<x-footer />
</x-guest-layout>
