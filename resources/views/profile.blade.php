<x-app-layout>
    <x-header />
    <div class="flex-col w-full md:flex md:flex-row md:min-h-screen">
        <x-user_side_nav :user_id='$user->id'/>
        <div class="flex w-full bg-slate-50">
            <div class="p-6">
                <div class="p-8 bg-white shadow mt-24">
                    <div class="relative">
                        <div
                            class="w-36 h-36 bg-indigo-100 mx-auto rounded-full shadow-2xl absolute inset-x-0 top-0 -mt-24 flex items-center justify-center text-indigo-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-20 text-center border-b pb-12">
                        <h1 class="text-4xl font-medium text-gray-700">{{ $user->name }}</h1>
                        <p class="font-light text-gray-600 mt-3">{{ $user->email }}</p>
                    </div>
                    <div class="mt-12 flex flex-col justify-center">
                        <p class="text-gray-600 text-center font-light lg:px-16">An artist of considerable range, Ryan —
                            the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and
                            records all of his own music, giving it a warm, intimate feel with a solid groove structure.
                            An artist of considerable range.</p>
                        <button class="text-indigo-500 py-2 px-4  font-medium mt-4">
                            Show more
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <x-footer />
</x-app-layout>
