<x-app-layout>
    {{-- <x-header /> --}}
    <section>
        <div
            class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full h-screen">
            <div class="relative p-4 max-w-xl mx-auto">
                <div class="relative p-4 text-center bg-white rounded-lg shadow-md dark:bg-gray-800 sm:p-5">
                    <div
                        class="w-16 h-16 rounded-full bg-green-100 dark:bg-green-900 p-4 flex items-center justify-center mx-auto mb-6">
                        <svg aria-hidden="true" class="w-10 h-10 text-green-500 dark:text-green-400" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Success</span>
                    </div>
                    <p class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">Thanks for your order. Your
                        payment
                        has been successfully processed.</p>
                    <button data-modal-toggle="successModal" type="button"
                        class="py-2 px-4 text-sm font-medium text-center text-white rounded-lg bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:focus:ring-primary-900">
                        Go back to home
                    </button>
                </div>
            </div>
        </div>
    </section>
    {{-- <x-footer /> --}}
</x-app-layout>
