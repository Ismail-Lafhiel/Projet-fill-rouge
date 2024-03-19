<x-guest-layout>
    <x-header />
    <section class="bg-white relative dark:bg-gray-900"
        style="background: url('https://wallpapers.com/images/hd/3d-travel-1920-x-1080-wallpaper-veg2m8i6mbzx7cgf.jpg'); background-size: cover; background-repeat: no-repeat">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1
                    class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl text-white">
                    Where Luxury Meets Comfort</h1>
                <p class="max-w-2xl mb-6 font-medium text-gray-200 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                    EliteStay, Your Ultimate Retreat!</p>
                <a href="#"
                    class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                    Sign in / Register
                </a>
            </div>
        </div>
        <form class="mx-auto absolute top-[92%] left-[50%] translate-x-[-50%] flex">
            <div class="border-4 border-blue-500 rounded-s-lg w-full">
                <div class="relative">
                    <input type="search" id="default-search"
                        class="block w-full p-4 text-sm text-gray-900 focus:ring-0 border-none bg-gray-50"
                        placeholder="Where are you going?" required />
                </div>
            </div>
            <div class="border-4 border-l-0 border-blue-500 hidden md:block w-full">
                <div class="relative">
                    <input id="start" name="start" type="text" onfocus="(this.type='date')"
                        placeholder="Check in" onblur="(this.type='text')"
                        class="block text-center w-full p-4 text-md text-gray-900 focus:ring-0 border-none bg-gray-50" />
                </div>
            </div>
            <div class="border-4 border-l-0 border-blue-500 hidden md:block w-full">
                <div class="relative">
                    <input id="end" name="end" type="text" onfocus="(this.type='date')"
                        placeholder="Check out" onblur="(this.type='text')"
                        class="block text-center w-full p-4 text-md text-gray-900 border-none bg-gray-50 focus:ring-0" />
                </div>
            </div>
            <div class="border-4 border-l-0 border-blue-500 rounded-e-xl">
                <button type="button"
                    class="block w-full p-4 px-10 text-md rounded-e-lg bg-primary-600 text-white">Search</button>
            </div>
        </form>
    </section>
    <section class="container mx-auto px-5 py-2 lg:px-32 lg:pt-24">
        <h2 class="max-w-2xl mb-4 text-xl font-bold tracking-tight leading-none md:text-2xl xl:text-3xl text-gray-900">Trending destinations</h2>
        <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 text-sm md:text-md lg:text-lg">Most popular choices for travellers from Morocco</p>
        <div class="-m-1 flex flex-wrap md:-m-2">
            <div class="flex w-1/2 flex-wrap">
                <div class="w-1/2 p-1 md:p-2">
                    <img alt="gallery" class="block h-full w-full rounded-lg object-cover object-center"
                        src="https://tecdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(70).webp" />
                </div>
                <div class="w-1/2 p-1 md:p-2">
                    <img alt="gallery" class="block h-full w-full rounded-lg object-cover object-center"
                        src="https://tecdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(72).webp" />
                </div>
                <div class="w-full p-1 md:p-2">
                    <img alt="gallery" class="block h-full w-full rounded-lg object-cover object-center"
                        src="https://tecdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(73).webp" />
                </div>
            </div>
            <div class="flex w-1/2 flex-wrap">
                <div class="w-full p-1 md:p-2">
                    <img alt="gallery" class="block h-full w-full rounded-lg object-cover object-center"
                        src="https://tecdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(74).webp" />
                </div>
                <div class="w-1/2 p-1 md:p-2">
                    <img alt="gallery" class="block h-full w-full rounded-lg object-cover object-center"
                        src="https://tecdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(75).webp" />
                </div>
                <div class="w-1/2 p-1 md:p-2">
                    <img alt="gallery" class="block h-full w-full rounded-lg object-cover object-center"
                        src="https://tecdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(77).webp" />
                </div>
            </div>
        </div>
        <div class="mt-5 mb-10 mx-auto text-center">
            <button type="button" class="text-primary-500 bg-transparent hover:bg-primary-800 focus:ring-4 border-2 border-primary-500 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 hover:text-white">View All Destinations</button>
        </div>
    </section>
    <x-footer />
</x-guest-layout>
