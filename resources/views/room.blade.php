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
                                <h2 class="text-2xl font-extrabold text-gray-800">{{ $room->roomType->name }} room</h2>
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
                        <button type="button" id="bookingModalButton" data-modal-target="bookingModal"
                            data-modal-toggle="bookingModal"
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
    <!-- booking modal -->
    <div id="bookingModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <!-- booking Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <!-- booking Modal header -->
                <div
                    class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Select starting and ending date of your reservation
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="bookingModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- booking Modal body -->
                <form action="#">
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                            <label for="start"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input id="start" name="start" type="text" onfocus="(this.type='date')"
                                placeholder="Check in" onblur="(this.type='text')"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required>
                        </div>
                        <div>
                            <label for="end"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input id="end" name="end" type="text" onfocus="(this.type='date')"
                                placeholder="Check out" onblur="(this.type='text')"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required>
                        </div>
                    </div>
                    <button type="submit"
                        class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
    <x-footer />
</x-guest-layout>
