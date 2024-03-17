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
                <div class="w-full p-2 lg:w-1/4 md:w-1/2">
                    <div
                        class="flex flex-col px-6 py-10 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-primary-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group">
                        <div class="flex flex-row justify-between items-center">
                            <div class="px-4 py-4 bg-gray-300  rounded-xl bg-opacity-30">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6 group-hover:text-gray-50 fill-primary-700" viewBox="0 0 448 512">
                                    <path
                                        d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                                </svg>
                            </div>
                        </div>
                        <h1
                            class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 group-hover:text-gray-50">
                            {{-- {{ $userCount }} --}} 12
                        </h1>
                        <div class="flex flex-row justify-between group-hover:text-gray-200">
                            <p>Total <span class="font-bold">Users</span></p>
                        </div>
                    </div>
                </div>

                <div class="w-full p-2 lg:w-1/4 md:w-1/2">
                    <div
                        class="flex flex-col px-6 py-10 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-primary-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group">
                        <div class="flex flex-row justify-between items-center">
                            <div class="px-4 py-4 bg-gray-300  rounded-xl bg-opacity-30">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6 group-hover:text-gray-50 fill-primary-700" viewBox="0 0 448 512">
                                    <path
                                        d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z" />
                                </svg>
                            </div>
                        </div>
                        <h1
                            class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 group-hover:text-gray-50">
                            {{-- {{ $eventCount }} --}} 12
                        </h1>
                        <div class="flex flex-row justify-between group-hover:text-gray-200">
                            <p>Total <span class="font-bold">Events</span></p>
                        </div>
                    </div>
                </div>

                <div class="w-full p-2 lg:w-1/4 md:w-1/2">
                    <div
                        class="flex flex-col px-6 py-10 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-primary-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group">
                        <div class="flex flex-row justify-between items-center">
                            <div class="px-4 py-4 bg-gray-300  rounded-xl bg-opacity-30">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6 group-hover:text-gray-50 fill-primary-700" viewBox="0 0 448 512">
                                    <path
                                        d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z" />
                                </svg>
                            </div>
                        </div>
                        <h1
                            class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 group-hover:text-gray-50">
                            {{-- {{ $approvedEventCount }} --}} 12
                        </h1>
                        <div class="flex flex-row justify-between group-hover:text-gray-200">
                            <p>Total <span class="font-bold">Approved events</span></p>
                        </div>
                    </div>
                </div>

                <div class="w-full p-2 lg:w-1/4 md:w-1/2">
                    <div
                        class="flex flex-col px-6 py-10 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-primary-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group">
                        <div class="flex flex-row justify-between items-center">
                            <div class="px-4 py-4 bg-gray-300  rounded-xl bg-opacity-30">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6 group-hover:text-gray-50 fill-primary-700" viewBox="0 0 448 512">
                                    <path
                                        d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z" />
                                </svg>
                            </div>
                        </div>
                        <h1
                            class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 group-hover:text-gray-50">
                            {{-- {{ $deniedEventCount }} --}} 12
                        </h1>
                        <div class="flex flex-row justify-between group-hover:text-gray-200">
                            <p>Total <span class="font-bold">Denied events</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>
