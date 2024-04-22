@props(['user_id'])

<div @click.away="open = false"
    class="flex flex-col flex-shrink-0 w-full text-gray-700 bg-white md:w-64 dark:text-gray-200 dark:bg-gray-800"
    x-data="{ open: false }">
    <div class="flex flex-row items-center justify-between flex-shrink-0 mx-auto my-8">
    </div>
    <nav :class="{ 'block': open, 'hidden': !open }" class="flex-grow px-4 pb-4 md:block md:pb-0 md:overflow-y-auto">
        <x-profile-link :active="request()->routeIs('user.profile')" href="{{ route('user.profile') }}">Profile
        </x-profile-link>
        <x-profile-link :active="request()->routeIs('user.bookings', $user_id)" href="{{ route('user.bookings', $user_id) }}">Booking
        </x-profile-link>
        <x-profile-link :active="request()->routeIs('bookmarks.index')" href="{{ route('bookmarks.index') }}">Bookmarks
        </x-profile-link>
    </nav>
</div>
