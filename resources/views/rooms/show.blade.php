<x-admin-layout>
    <div class="py-12 w-full w">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
                <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
                    <h2 class="text-4xl mb-8 font-semibold text-gray-900 dark:text-white">
                        Room Info
                    </h2>
                    <form>
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label for="reference"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Room
                                    Reference</label>
                                <input type="text" value="{{ $room->reference }}" readonly
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">

                            </div>
                            <div>
                                <label for="hotel_id"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hotel
                                    Name</label>
                                <input type="text" value="{{ $room->hotel->name }}" readonly
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">

                            </div>
                            <div>
                                <label for="description"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hotel
                                    Description</label>
                                <textarea rows="4"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    readonly>{{ $room->description }}</textarea>
                            </div>
                            <div>
                                <label for="number_of_guests"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of
                                    guests</label>
                                <input type="text" value="{{ $room->number_of_guests }}" readonly
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </div>
                            <div>
                                <label for="availability"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Room
                                    Availability</label>
                                <input type="text" value="{{ $room->availability }}" readonly
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </div>
                            <div>
                                <label for="number_of_beds"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Offers</label>
                                <input type="text"
                                    value="{{ implode(', ', $room->roomOffers->pluck('service')->toArray()) }}" readonly
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </div>
                            <div>
                                <label for="room_type"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Room
                                    Type</label>
                                <input type="text" value="{{ $room->roomType->name }}" readonly
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </div>
                            <div>
                                <label for="price"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                                <input type="text" value="{{ $room->price }}" readonly
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </div>
                            <div class="grid gap-4 sm:col-span-2">
                                <h3 class="text-lg font-semibold mb-2 text-gray-900 dark:text-white">Room Photos</h3>
                                <div>
                                    <img id="featuredImage" class="h-auto max-w-full rounded-lg"
                                        src="{{ asset('storage/' . $room->photos->first()->path) }}"
                                        alt="Featured Room Photo">
                                </div>
                                <div class="grid grid-cols-5 gap-4">
                                    @foreach ($room->photos as $photo)
                                        <div>
                                            <img class="thumbnail h-auto max-w-full rounded-lg"
                                                src="{{ asset('storage/' . $photo->path) }}" alt="Room Photo">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
</x-admin-layout>
