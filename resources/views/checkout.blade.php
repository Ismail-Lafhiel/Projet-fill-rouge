<x-app-layout>
    <x-header />
    <div class="font-[sans-serif] bg-gray-50">
        <div class="grid lg:grid-cols-2 xl:grid-cols-3 gap-4 h-full">
            <div class="bg-[#3f3f3f] lg:h-screen lg:sticky lg:top-0">
                <div class="relative h-full">
                    <div class="p-8 lg:overflow-auto lg:h-full">
                        <h2 class="text-2xl font-bold text-white">Bookings Summary</h2>
                        <div class="space-y-6 mt-10">
                            @foreach ($bookingData as $data)
                                <div class="grid sm:grid-cols-2 items-start gap-6">
                                    <div class="shrink-0 rounded-md">
                                        @if ($data['room']->photos->isNotEmpty())
                                            <img src="{{ asset('storage/' . $data['room']->photos->first()->path) }}"
                                                class="w-full object-contain" alt="Room Image">
                                        @else
                                            <img src="https://readymadeui.com/images/product10.webp"
                                                class="w-full object-contain" alt="Default Image">
                                        @endif
                                    </div>
                                    <div>
                                        <h3 class="text-base text-white">{{ $data['room']->roomType->name }} Room</h3>
                                        <ul class="text-xs text-white space-y-3 mt-4">
                                            <li class="flex flex-wrap gap-4">Hotel <span
                                                    class="ml-auto">{{ $data['room']->hotel->name }}</span></li>
                                            <li class="flex flex-wrap gap-4">Location <span
                                                    class="ml-auto">{{ $data['room']->hotel->location->city }},
                                                    {{ $data['room']->hotel->location->country }}</span></li>
                                            <li class="flex flex-wrap gap-4">Total Days <span
                                                    class="ml-auto">{{ $data['number_of_days'] }}</span></li>
                                            <li class="flex flex-wrap gap-4">Total Price <span
                                                    class="ml-auto">${{ $data['total_price'] }}</span></li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @php
                        $totalPrice = 0;
                        foreach ($bookingData as $booking) {
                            $totalPrice += $booking['total_price'];
                        }
                    @endphp

                    <div class="absolute left-0 bottom-0 bg-[#444] w-full p-4">
                        <h4 class="flex flex-wrap gap-4 text-base text-white">Total <span
                                class="ml-auto">${{ number_format($totalPrice, 2) }}</span></h4>
                    </div>
                </div>
            </div>
            <div class="xl:col-span-2 h-max rounded-md p-8 sticky top-0">
                <h2 class="text-2xl font-bold text-[#333]">Complete your booking</h2>
                <form method="POST" action="{{ route('checkout.process') }}" class="mt-10">
                    @csrf
                    <div>
                        <h3 class="text-lg font-bold text-[#333] mb-6">Personal Details</h3>
                        <div class="grid sm:grid-cols-2 gap-6">
                            <div class="relative flex items-center">
                                <input type="text" name="first_name" placeholder="First Name"
                                    class="px-4 py-3.5 bg-white text-[#333] w-full text-sm border-b-2 focus:border-primary-400 outline-none" />
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb"
                                    class="w-[18px] h-[18px] absolute right-4" viewBox="0 0 24 24">
                                    <circle cx="10" cy="7" r="6" data-original="#000000"></circle>
                                    <path
                                        d="M14 15H6a5 5 0 0 0-5 5 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 5 5 0 0 0-5-5zm8-4h-2.59l.3-.29a1 1 0 0 0-1.42-1.42l-2 2a1 1 0 0 0 0 1.42l2 2a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42l-.3-.29H22a1 1 0 0 0 0-2z"
                                        data-original="#000000"></path>
                                </svg>
                            </div>
                            <div class="relative flex items-center">
                                <input type="text" name="last_name" placeholder="Last Name"
                                    class="px-4 py-3.5 bg-white text-[#333] w-full text-sm border-b-2 focus:border-primary-400 outline-none" />
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb"
                                    class="w-[18px] h-[18px] absolute right-4" viewBox="0 0 24 24">
                                    <circle cx="10" cy="7" r="6" data-original="#000000"></circle>
                                    <path
                                        d="M14 15H6a5 5 0 0 0-5 5 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 5 5 0 0 0-5-5zm8-4h-2.59l.3-.29a1 1 0 0 0-1.42-1.42l-2 2a1 1 0 0 0 0 1.42l2 2a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42l-.3-.29H22a1 1 0 0 0 0-2z"
                                        data-original="#000000"></path>
                                </svg>
                            </div>
                            <div class="relative flex items-center">
                                <input type="email" name="email" placeholder="Email"
                                    class="px-4 py-3.5 bg-white text-[#333] w-full text-sm border-b-2 focus:border-primary-400 outline-none" />
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb"
                                    class="w-[18px] h-[18px] absolute right-4" viewBox="0 0 682.667 682.667">
                                    <defs>
                                        <clipPath id="a" clipPathUnits="userSpaceOnUse">
                                            <path d="M0 512h512V0H0Z" data-original="#000000"></path>
                                        </clipPath>
                                    </defs>
                                    <g clip-path="url(#a)" transform="matrix(1.33 0 0 -1.33 0 682.667)">
                                        <path fill="none" stroke-miterlimit="10" stroke-width="40"
                                            d="M452 444H60c-22.091 0-40-17.909-40-40v-39.446l212.127-157.782c14.17-10.54 33.576-10.54 47.746 0L492 364.554V404c0 22.091-17.909 40-40 40Z"
                                            data-original="#000000"></path>
                                        <path
                                            d="M472 274.9V107.999c0-11.027-8.972-20-20-20H60c-11.028 0-20 8.973-20 20V274.9L0 304.652V107.999c0-33.084 26.916-60 60-60h392c33.084 0 60 26.916 60 60v196.653Z"
                                            data-original="#000000"></path>
                                    </g>
                                </svg>
                            </div>
                            <div class="relative flex items-center">
                                <input type="number" name="phone_number" placeholder="Phone No."
                                    class="px-4 py-3.5 bg-white text-[#333] w-full text-sm border-b-2 focus:border-primary-400 outline-none" />
                                <svg fill="#bbb" class="w-[18px] h-[18px] absolute right-4" viewBox="0 0 64 64">
                                    <path
                                        d="m52.148 42.678-6.479-4.527a5 5 0 0 0-6.963 1.238l-1.504 2.156c-2.52-1.69-5.333-4.05-8.014-6.732-2.68-2.68-5.04-5.493-6.73-8.013l2.154-1.504a4.96 4.96 0 0 0 2.064-3.225 4.98 4.98 0 0 0-.826-3.739l-4.525-6.478C20.378 10.5 18.85 9.69 17.24 9.69a4.69 4.69 0 0 0-1.628.291 8.97 8.97 0 0 0-1.685.828l-.895.63a6.782 6.782 0 0 0-.63.563c-1.092 1.09-1.866 2.472-2.303 4.104-1.865 6.99 2.754 17.561 11.495 26.301 7.34 7.34 16.157 11.9 23.011 11.9 1.175 0 2.281-.136 3.29-.406 1.633-.436 3.014-1.21 4.105-2.302.199-.199.388-.407.591-.67l.63-.899a9.007 9.007 0 0 0 .798-1.64c.763-2.06-.007-4.41-1.871-5.713z"
                                        data-original="#000000"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6">
                        <div class="flex gap-6 max-sm:flex-col mt-10">
                            <button type="button"
                                class="rounded-md px-6 py-3 w-full text-sm font-semibold bg-transparent hover:bg-gray-100 border-2 text-[#333]">Cancel</button>
                            <button type="submit"
                                class="rounded-md px-6 py-3 w-full text-sm font-semibold bg-primary-600 text-white hover:bg-primary-700">Complete
                                Booking</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <x-footer />
</x-app-layout>
