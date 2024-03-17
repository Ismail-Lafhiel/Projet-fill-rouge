@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'block px-4 py-2 mt-2 text-sm font-semibold text-white bg-primary-700 rounded-lg dark:bg-primary-700 dark:hover:bg-primary-600 dark:focus:bg-primary-600 dark:focus:text-white dark:hover:text-white dark:text-primary-200 hover:text-primary-900 focus:text-primary-900 hover:bg-primary-200 focus:bg-primary-200 focus:outline-none focus:shadow-outline'
            : 'block px-4 py-2 mt-2 text-sm font-semibold text-primary-900 bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-primary-600 dark:focus:bg-primary-600 dark:focus:text-white dark:hover:text-white dark:text-primary-200 hover:text-primary-900 focus:text-primary-900 hover:bg-primary-200 focus:bg-primary-200 focus:outline-none focus:shadow-outline';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>