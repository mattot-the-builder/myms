<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MYMS</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>

<body class="font-sans antialiased">

    <div class="overflow-x-hidden w-full">

        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <x-home-navigation />

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif


            <!-- Page Content -->
            <main class="pt-20 p-6 mx-auto md:px-6">

                <section class="my-12 bg-white dark:bg-gray-800 px-6 rounded-md lg:rounded-lg py-12 ">

                    <livewire:file-upload />
                </section>
            </main>
        </div>

        @stack('modals')

        @livewireScripts
        <script src="{{ asset('assets/js/script.js') }}"></script>


    </div>
</body>

<footer class="bg-white dark:bg-gray-900 p-3">
    <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
        <div class="md:flex md:justify-between">
            <div class="mb-6 md:mb-0">
                <div>
                    <x-application-mark class="w-32" />
                    <div class="mt-6">
                        <p class="text-gray-500 dark:text-gray-400">For general Inquiries</p>
                        <h2 class="mb-6 text-2xl font-semibold text-gray-900 dark:text-white">admin@myms.co</h2>
                    </div>
                </div>

            </div>



            <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Resources</h2>
                    <ul class="text-gray-500 dark:text-gray-400 font-medium">
                        <li class="mb-4">
                            <a href="https://loremflickr.com/2500/1600/funny" class="hover:underline">Engineering</a>
                        </li>
                        <li>
                            <a href="https://loremflickr.com/2500/1600/funny" class="hover:underline">Academy</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Follow us</h2>
                    <ul class="text-gray-500 dark:text-gray-400 font-medium">
                        <li class="mb-4">
                            <a href="https://www.facebook.com/zaidi.aziz.710/" class="hover:underline ">Facebook</a>
                        </li>
                        <li>
                            <a href="https://www.tiktok.com/@mymsacademy" class="hover:underline">Tiktok</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Legal</h2>
                    <ul class="text-gray-500 dark:text-gray-400 font-medium">
                        <li class="mb-4">
                            <a href="/privacy-policy" target="_blank" class="hover:underline">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="/terms-of-service" target="_blank" class="hover:underline">Terms &amp;
                                Conditions</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <div class="sm:flex sm:items-center sm:justify-between">
            <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="{{ env('APP_URL') }}"
                    class="hover:underline">myms.co™</a>. All Rights Reserved.
            </span>
            <div class="flex mt-4 space-x-5 sm:justify-center sm:mt-0">
                <a href="https://www.facebook.com/zaidi.aziz.710/"
                    class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 8 19">
                        <path fill-rule="evenodd"
                            d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">Facebook page</span>
                </a>
                <a href="https://www.tiktok.com/@mymsacademy"
                    class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" <svg
                        xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor"
                        viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M448,209.91a210.06,210.06,0,0,1-122.77-39.25V349.38A162.55,162.55,0,1,1,185,188.31V278.2a74.62,74.62,0,1,0,52.23,71.18V0l88,0a121.18,121.18,0,0,0,1.86,22.17h0A122.18,122.18,0,0,0,381,102.39a121.43,121.43,0,0,0,67,20.14Z" />
                    </svg>
                    <span class="sr-only">Tiktok page</span>
                </a>
            </div>
        </div>
    </div>
</footer>


</html>
