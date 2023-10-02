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
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kalam&display=swap');
    </style>

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


                <x-myms-academy-logo class="animate-pulse w-56 mt-8 mb-12 mx-auto" />


                <h2 class="mb-6 text-center text-5xl font-bold text-grey-800 dark:text-white"
                    style="font-family: 'Kalam', cursive">
                    Don't let your curiosity freeze <br>
                    Embrace it
                    <a href="/" class="text-red-600">HERE</a>
                </h2>
                <section class="mb-12 bg-white dark:bg-gray-800 px-6 rounded-md lg:rounded-lg py-12 text-center"
                    id="about">

                    <div class="flex justify-center">
                        <div class="max-w-[700px] text-center">
                            <h2 class="mb-6 text-center text-3xl font-bold text-grey-800 dark:text-white">
                                About
                                <u class="text-red-600">us</u>
                            </h2>
                            <p class=" text-gray-500 dark:text-gray-400">
                                We provide comprehensive training programs for aspiring electrical and technical person,
                                equipping them with both knowledge and practical skills. Our specialization lies in
                                training for low and medium voltage systems, enhancing participants' expertise and
                                bolstering their career prospects. Our training program offers recognized credentials
                                and credibility within the industry.
                            </p>
                        </div>
                    </div>
                </section>



                <div x-data="{ show: true }" class="">
                    <button x-show="!show" x-on:click="show = true" type="button"
                        class="mx-auto text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        Show Courses
                    </button>
                    <button x-show="show" x-on:click="show = false" type="button"
                        class="mx-auto text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        Hide Course
                    </button>
                    <a href="/download-list-courses" type="button"
                        class="mx-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Download List of Courses
                    </a>
                    <div x-show="show">
                        <section class="my-12 bg-white dark:bg-gray-800 px-6 rounded-md lg:rounded-lg py-12 text-center"
                            id="courses">
                            <div class="flex justify-center">
                                <div class="max-w-[700px] text-center">
                                    <h2 class="mb-6 text-center text-3xl font-bold text-grey-800 dark:text-white">
                                        Training
                                        <u class="text-red-600">Courses</u>
                                    </h2>


                                    <div>

                                        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                            type="button">Select Course<svg class="w-2.5 h-2.5 ml-2.5"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                            </svg>
                                        </button>

                                        <!-- Dropdown menu -->
                                        <div id="dropdown"
                                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                                aria-labelledby="dropdownDefaultButton">
                                                <li>
                                                    @foreach ($courses as $course_item)
                                                        <a href="{{ route('academy.view', $course_item->id) }}"
                                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                            {{ $course_item->name }}
                                                        </a>
                                                    @endforeach
                                                </li>
                                            </ul>
                                        </div>
                                    </div>


                                    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
                                        <h2
                                            class="mb-2 text-xl font-semibold leading-none text-gray-900 md:text-2xl dark:text-white">
                                            {{ $course->name }}
                                        </h2>
                                        <p
                                            class="mb-4 text-xl font-extrabold leading-none text-gray-900 md:text-2xl dark:text-white">
                                            RM
                                            {{ $course->fee }}
                                        </p>
                                        <dl>
                                            <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                Course
                                                Content</dt>
                                            <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                                {!! $course->contents !!}
                                            </dd>
                                        </dl>
                                        <dl class="flex items-center space-x-6">
                                            <div>
                                                <dt
                                                    class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                    Date
                                                </dt>

                                                <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                                    {{ Carbon\Carbon::parse($course->date_start)->format('d F Y') .
                                                        ' - ' .
                                                        Carbon\Carbon::parse($course->date_end)->format('d F Y') }}
                                                </dd>
                                            </div>
                                        </dl>
                                        <dl>
                                            <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                Time</dt>
                                            <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                                {{ Carbon\Carbon::parse($course->started_at)->format('H:i A') .
                                                    ' - ' .
                                                    Carbon\Carbon::parse($course->ended_at)->format('H:i A') }}
                                            </dd>
                                        </dl>
                                        <div class="flex items-center space-x-4">
                                            <a href="{{ route('course.register-selected', $course->id) }}"
                                                type="button"
                                                class="mx-auto text-white inline-flex items-center bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                                <svg aria-hidden="true" class="mr-1 -ml-1 w-5 h-5" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                                    </path>
                                                    <path fill-rule="evenodd"
                                                        d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                Register
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>

                <section class="my-12 bg-white dark:bg-gray-800 px-6 rounded-md lg:rounded-lg py-12 text-center"
                    id="">

                    <div class="flex justify-center">
                        <div class="max-w-7xl text-center">
                            <h2 class="mb-16 text-center text-3xl font-bold text-grey-800 dark:text-white">
                                Completed
                                <u class="text-red-600">Training</u>
                            </h2>
                            <div class="mb-12">
                                <h2 class=" text-center text-xl font-bold text-grey-800 dark:text-white">
                                    Institut Kemahiran Mara (IKM)
                                    <h3 class="mb-6 font-semibold text-sm text-gray-800 dark:text-white">Practical
                                        Power
                                        Transformer
                                        (Testing & Maintenance)</h3>
                                </h2>
                                <div class="grid gap-x-6 gap-y-6 md:grid-cols-3 lg:gap-x-12">

                                    <div class="block">
                                        <img class="object-cover h-48 w-96 rounded-lg"
                                            src="{{ asset('assets/img/completed-course/ikm1.jpg') }}"
                                            alt="image description">
                                    </div>
                                    <div>
                                        <img class="object-cover h-48 w-96 rounded-lg"
                                            src="{{ asset('assets/img/completed-course/ikm2.jpg') }}"
                                            alt="image description">
                                    </div>
                                    <div>
                                        <img class="object-cover h-48 w-96 rounded-lg"
                                            src="{{ asset('assets/img/completed-course/ikm3.jpg') }}"
                                            alt="image description">
                                    </div>
                                </div>

                            </div>
                            <div class="mb-12">
                                <h2 class=" text-center text-xl font-bold text-grey-800 dark:text-white">
                                    ADTEC Shah Alam
                                    <h3 class="mb-6 font-semibold text-sm text-gray-800 dark:text-white">
                                        Substation Maintenance & Switching Operation
                                    </h3>
                                </h2>
                                <div class="grid gap-x-6 gap-y-6 md:grid-cols-3 lg:gap-x-12">

                                    <div class="block">
                                        <img class="object-cover h-48 w-96 rounded-lg"
                                            src="{{ asset('assets/img/completed-course/adtec1.PNG') }}"
                                            alt="image description">
                                    </div>
                                    <div>
                                        <img class="object-cover h-48 w-96 rounded-lg"
                                            src="{{ asset('assets/img/completed-course/adtec2.PNG') }}"
                                            alt="image description">
                                    </div>
                                    <div>
                                        <img class="object-cover h-48 w-96 rounded-lg"
                                            src="{{ asset('assets/img/completed-course/adtec3.JPG') }}"
                                            alt="image description">
                                    </div>
                                </div>

                            </div>
                            <div class="mb-12">
                                <h2 class=" text-center text-xl font-bold text-grey-800 dark:text-white">
                                    Institut Latihan Perindustrian (ILP) Kota Bharu
                                    <h3 class="mb-6 font-semibold text-sm text-gray-800 dark:text-white">Operation of
                                        Low Voltage Switchboard
                                    </h3>
                                </h2>
                                <div class="grid gap-x-6 gap-y-6 md:grid-cols-3 lg:gap-x-12">

                                    <div class="block">
                                        <img class="object-cover h-48 w-96 rounded-lg"
                                            src="{{ asset('assets/img/completed-course/ilp1.jpg') }}"
                                            alt="image description">
                                    </div>
                                    <div>
                                        <img class="object-cover h-48 w-96 rounded-lg"
                                            src="{{ asset('assets/img/completed-course/ilp2.jpg') }}"
                                            alt="image description">
                                    </div>
                                    <div>
                                        <img class="object-cover h-48 w-96 rounded-lg"
                                            src="{{ asset('assets/img/completed-course/ilp3.jpg') }}"
                                            alt="image description">
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </section>

            </main>
        </div>

        @stack('modals')

    </div>

    @livewireScripts

    <script src="{{ asset('assets/js/script.js') }}"></script>
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
                            <a href="/" class="hover:underline">Engineering</a>
                        </li>
                        <li>
                            <a href="{{ route('academy') }}" class="hover:underline">Academy</a>
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
            <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a
                    href="{{ env('APP_URL') }}" class="hover:underline">myms.co™</a>. All Rights Reserved.
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
