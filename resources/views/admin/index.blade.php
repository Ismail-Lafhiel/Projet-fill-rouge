<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-10 pl-5 text-2xl">
                Welcome Back <span class="capitalize font-bold">{{ Auth::user()->name }}</span>
            </h1>
        </div>
        <div class="container items-center px-4 py-8 m-auto mt-5">
            <div class="flex flex-wrap pb-3 mx-4 md:mx-24 lg:mx-0">
                <!-- Card for Total Users -->
                <div class="w-full p-2 lg:w-1/4 md:w-1/2">
                    <div
                        class="flex flex-col px-6 py-10 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-primary-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group">
                        <div class="flex flex-row justify-between items-center">
                            <div class="px-4 py-4 bg-gray-300 rounded-xl bg-opacity-30">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6 group-hover:text-gray-50 fill-primary-700" viewBox="0 0 448 512">
                                    <path
                                        d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                                </svg>
                            </div>
                        </div>
                        <h1
                            class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 group-hover:text-gray-50">
                            {{ $total_users }}
                        </h1>
                        <div class="flex flex-row justify-between group-hover:text-gray-200">
                            <p>Total <span class="font-bold">Users</span></p>
                        </div>
                    </div>
                </div>
                <!-- Card for Total Users -->
                <div class="w-full p-2 lg:w-1/4 md:w-1/2">
                    <div
                        class="flex flex-col px-6 py-10 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-primary-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group">
                        <div class="flex flex-row justify-between items-center">
                            <div class="px-4 py-4 bg-gray-300 rounded-xl bg-opacity-30">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    class="h-6 w-6 group-hover:text-gray-50 fill-primary-700" viewBox="0 0 448 512">
                                    <path
                                        d="M96 0C43 0 0 43 0 96V416c0 53 43 96 96 96H384h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V384c17.7 0 32-14.3 32-32V32c0-17.7-14.3-32-32-32H384 96zm0 384H352v64H96c-17.7 0-32-14.3-32-32s14.3-32 32-32zm32-240c0-8.8 7.2-16 16-16H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16zm16 48H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
                                </svg>
                            </div>
                        </div>
                        <h1
                            class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 group-hover:text-gray-50">
                            {{ $users_with_bookings }}
                        </h1>
                        <div class="flex flex-row justify-between group-hover:text-gray-200">
                            <p>Total <span class="font-bold">Users with bookings</span></p>
                        </div>
                    </div>
                </div>
                <!-- Card for Total Hotels -->
                <div class="w-full p-2 lg:w-1/4 md:w-1/2">
                    <div
                        class="flex flex-col px-6 py-10 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-primary-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group">
                        <div class="flex flex-row justify-between items-center">
                            <div class="px-4 py-4 bg-gray-300 rounded-xl bg-opacity-30">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    class="h-6 w-6 group-hover:text-gray-50 fill-primary-700" viewBox="0 0 448 512">
                                    <path
                                        d="M0 32C0 14.3 14.3 0 32 0H480c17.7 0 32 14.3 32 32s-14.3 32-32 32V448c17.7 0 32 14.3 32 32s-14.3 32-32 32H304V464c0-26.5-21.5-48-48-48s-48 21.5-48 48v48H32c-17.7 0-32-14.3-32-32s14.3-32 32-32V64C14.3 64 0 49.7 0 32zm96 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V112c0-8.8-7.2-16-16-16H112c-8.8 0-16 7.2-16 16zM240 96c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V112c0-8.8-7.2-16-16-16H240zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V112c0-8.8-7.2-16-16-16H368c-8.8 0-16 7.2-16 16zM112 192c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V208c0-8.8-7.2-16-16-16H112zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V208c0-8.8-7.2-16-16-16H240c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V208c0-8.8-7.2-16-16-16H368zM328 384c13.3 0 24.3-10.9 21-23.8c-10.6-41.5-48.2-72.2-93-72.2s-82.5 30.7-93 72.2c-3.3 12.8 7.8 23.8 21 23.8H328z" />
                                </svg>
                            </div>
                        </div>
                        <h1
                            class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 group-hover:text-gray-50">
                            {{ $total_hotels }}
                        </h1>
                        <div class="flex flex-row justify-between group-hover:text-gray-200">
                            <p>Total <span class="font-bold">Hotels</span></p>
                        </div>
                    </div>
                </div>
                <!-- Card for Total Rooms -->
                <div class="w-full p-2 lg:w-1/4 md:w-1/2">
                    <div
                        class="flex flex-col px-6 py-10 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-primary-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group">
                        <div class="flex flex-row justify-between items-center">
                            <div class="px-4 py-4 bg-gray-300 rounded-xl bg-opacity-30">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6 group-hover:text-gray-50 fill-primary-700" viewBox="0 0 448 512"
                                    viewBox="0 0 640 512">
                                    <path
                                        d="M32 32c17.7 0 32 14.3 32 32V320H288V160c0-17.7 14.3-32 32-32H544c53 0 96 43 96 96V448c0 17.7-14.3 32-32 32s-32-14.3-32-32V416H352 320 64v32c0 17.7-14.3 32-32 32s-32-14.3-32-32V64C0 46.3 14.3 32 32 32zm144 96a80 80 0 1 1 0 160 80 80 0 1 1 0-160z" />
                                </svg>
                            </div>
                        </div>
                        <h1
                            class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 group-hover:text-gray-50">
                            {{ $total_rooms }}
                        </h1>
                        <div class="flex flex-row justify-between group-hover:text-gray-200">
                            <p>Total <span class="font-bold">Rooms</span></p>
                        </div>
                    </div>
                </div>
                <!-- Card for Total Bookings -->
                <div class="w-full p-2 lg:w-1/4 md:w-1/2">
                    <div
                        class="flex flex-col px-6 py-10 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-primary-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group">
                        <div class="flex flex-row justify-between items-center">
                            <div class="px-4 py-4 bg-gray-300 rounded-xl bg-opacity-30">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    class="h-6 w-6 group-hover:text-gray-50 fill-primary-700" viewBox="0 0 448 512">
                                    <path
                                        d="M96 0C43 0 0 43 0 96V416c0 53 43 96 96 96H384h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V384c17.7 0 32-14.3 32-32V32c0-17.7-14.3-32-32-32H384 96zm0 384H352v64H96c-17.7 0-32-14.3-32-32s14.3-32 32-32zm32-240c0-8.8 7.2-16 16-16H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16zm16 48H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
                                </svg>
                            </div>
                        </div>
                        <h1
                            class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 group-hover:text-gray-50">
                            {{ $total_bookings }}
                        </h1>
                        <div class="flex flex-row justify-between group-hover:text-gray-200">
                            <p>Total <span class="font-bold">Bookings</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>
