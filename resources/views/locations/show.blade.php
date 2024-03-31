<x-admin-layout>
    <div class="py-12 w-full w">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
                <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
                    <h2 class="text-4xl mb-8 font-semibold text-gray-900 dark:text-white">
                        Location Info
                    </h2>
                    <form>
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label for="city"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location
                                    city</label>
                                <input type="text" readonly
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    value="{{ $location->city }}">

                            </div>
                            <div>
                                <label for="country"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location
                                    country</label>
                                <input type="text" readonly
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    value="{{ $location->country }}">

                            </div>
                        </div>
                        <a href="{{route('locations.index')}}" class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            Go back
                        </a>
                    </form>
                </div>
            </section>
        </div>
    </div>
</x-admin-layout>
