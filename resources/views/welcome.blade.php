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

        @php
            $announcement = App\Models\Announcement::latest()->first();
        @endphp
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <x-home-navigation />
            @if ($announcement)
                <div id="banner" tabindex="-1"
                    class="flex fixed z-50 gap-8 justify-between items-start py-3 px-4 w-full border border-b border-gray-200 sm:items-center dark:border-gray-700 lg:py-4 bg-blue-800">
                    <p class="text-sm font-light text-white ">
                        {{ $announcement->content }}
                    </p>
                    <button data-collapse-toggle="banner" type="button"
                        class="flex items-center text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 dark:hover:bg-red-600 dark:hover:text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            @endif

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <section id="default-carousel" class="relative w-full mt-16" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="h-96 relative h-56 overflow-hidden md:h-96 z-0">

                    <!-- Item 1 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('assets/img/hero.jpg') }}"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="...">
                        <div
                            class="absolute top-0 right-0 bottom-0 left-0 h-full w-full overflow-hidden bg-[hsla(0,0%,0%,0.75)] bg-fixed">
                            <div class="flex h-full items-center justify-center">
                                <div class="max-w-[800px] px-6 py-6 text-center text-white md:py-0 md:px-12">
                                    <h2 data-aos="zoom-fade-in" data-aos-duration="3000"
                                        class="mb-12 text-5xl font-bold leading-tight tracking-tight md:text-6xl xl:text-7xl">
                                        Unlocking Possibilities
                                    </h2>
                                    <p class="text-xl text-semibold" id="typing-text">
                                    </p>
                                    <div class="mt-12">
                                        <a href="{{ route('academy') }}"
                                            class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                            Engineering
                                        </a>
                                        <a href="{{ route('academy') }}"
                                            class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                            Academy</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Item 2 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="assets/img/hero/hero2.jpg"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="...">
                        <div
                            class="absolute top-0 right-0 bottom-0 left-0 h-full w-full overflow-hidden bg-[hsla(0,0%,0%,0.75)] bg-fixed">
                            <div class="flex h-full items-center justify-center">
                                <div class="max-w-[800px] px-6 py-6 text-center text-white md:py-0 md:px-12">
                                    <h2 data-aos="zoom-fade-in" data-aos-duration="3000"
                                        class="mb-12 text-5xl font-bold leading-tight tracking-tight md:text-6xl xl:text-7xl">
                                        Third slide
                                    </h2>
                                    <p class="text-xl text-semibold" id="typing-text">
                                    </p>
                                    <div class="mt-12">
                                        <a href="{{ route('register') }}"
                                            class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Get
                                            Started</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Item 3 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="assets/img/hero/hero3.jpg"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="...">
                        <div
                            class="absolute top-0 right-0 bottom-0 left-0 h-full w-full overflow-hidden bg-[hsla(0,0%,0%,0.75)] bg-fixed">
                            <div class="flex h-full items-center justify-center">
                                <div class="max-w-[800px] px-6 py-6 text-center text-white md:py-0 md:px-12">
                                    <h2 data-aos="zoom-fade-in" data-aos-duration="3000"
                                        class="mb-12 text-5xl font-bold leading-tight tracking-tight md:text-6xl xl:text-7xl">
                                        Third slide
                                    </h2>
                                    <p class="text-xl text-semibold" id="typing-text">
                                    </p>
                                    <div class="mt-12">
                                        <a href="{{ route('register') }}"
                                            class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Get
                                            Started</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Item 4 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="assets/img/hero/hero4.jpg"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="...">
                        <div
                            class="absolute top-0 right-0 bottom-0 left-0 h-full w-full overflow-hidden bg-[hsla(0,0%,0%,0.75)] bg-fixed">
                            <div class="flex h-full items-center justify-center">
                                <div class="max-w-[800px] px-6 py-6 text-center text-white md:py-0 md:px-12">
                                    <h2 data-aos="zoom-fade-in" data-aos-duration="3000"
                                        class="mb-12 text-5xl font-bold leading-tight tracking-tight md:text-6xl xl:text-7xl">
                                        Fourth slide
                                    </h2>
                                    <p class="text-xl text-semibold" id="typing-text">
                                    </p>
                                    <div class="mt-12">
                                        <a href="{{ route('register') }}"
                                            class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Get
                                            Started</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Item 5 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="assets/img/hero/hero5.jpg"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="...">
                        <div
                            class="absolute top-0 right-0 bottom-0 left-0 h-full w-full overflow-hidden bg-[hsla(0,0%,0%,0.75)] bg-fixed">
                            <div class="flex h-full items-center justify-center">
                                <div class="max-w-[800px] px-6 py-6 text-center text-white md:py-0 md:px-12">
                                    <h2 data-aos="zoom-fade-in" data-aos-duration="3000"
                                        class="mb-12 text-5xl font-bold leading-tight tracking-tight md:text-6xl xl:text-7xl">
                                        Fifth slide
                                    </h2>
                                    <p class="text-xl text-semibold" id="typing-text">
                                    </p>
                                    <div class="mt-12">
                                        <a href="{{ route('register') }}"
                                            class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Get
                                            Started</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slider indicators -->
                <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                        data-carousel-slide-to="0"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                        data-carousel-slide-to="1"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                        data-carousel-slide-to="2"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
                        data-carousel-slide-to="3"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5"
                        data-carousel-slide-to="4"></button>
                </div>
                <!-- Slider controls -->
                <button type="button"
                    class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-prev>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M5 1 1 5l4 4" />
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button"
                    class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-next>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </section>

            <!-- Page Content -->
            <main class="max-w-7xl p-6 mx-auto md:px-6">

                @if ($announcement)
                    <section class="my-12 bg-white dark:bg-gray-800 px-6 rounded-md lg:rounded-lg py-12 text-center"
                        id="announcement">
                        <h1 class="text-gray-500 dark:text-white">
                            {{ $announcement->content }}
                    </section>
                @endif

                <section class="my-12 bg-white dark:bg-gray-800 px-6 rounded-md lg:rounded-lg py-12 text-center"
                    id="about">

                    <div class="flex justify-center">
                        <div class="max-w-[700px] text-center">
                            <h2 class="mb-6 text-center text-3xl font-bold text-grey-800 dark:text-white">
                                About
                                <u class="text-red-600">us</u>
                            </h2>
                            <p class="mb-16 text-gray-500 dark:text-gray-400">
                                Established in 2014, MYMS Engineering Sdn Bhd stands as your trusted ally, dedicated to
                                ensuring the
                                steadfastness and safety of your electrical systems. Driven by an unwavering commitment
                                to excellence and bolstered by a seasoned team of professionals, our core specialization
                                lies in delivering comprehensive solutions for the maintenance, installation, testing,
                                and inspection of low and medium voltage electrical equipment.
                            </p>
                        </div>
                    </div>

                    <div class="grid gap-x-6 md:grid-cols-2 lg:grid-cols-4 lg:gap-x-12">


                        <div class="mb-12 lg:mb-0" data-aos="fade-up" data-aos-duration="300">
                            <div class="mb-6 inline-block rounded-full bg-red-200 p-4 text-red-600 shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" class="h-6 w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11.412 15.655L9.75 21.75l3.745-4.012M9.257 13.5H3.75l2.659-2.849m2.048-2.194L14.25 2.25 12 10.5h8.25l-4.707 5.043M8.457 8.457L3 3m5.457 5.457l7.086 7.086m0 0L21 21" />

                                </svg>


                            </div>
                            <h5 class="mb-4 text-lg font-bold text-red-600 dark:text-red-600">Unparalleled
                                Expertise
                            </h5>
                            <p class="text-gray-500 dark:text-gray-400">
                                Our seasoned engineers bring decades of expertise for top-tier solutions and
                                training.
                            </p>
                        </div>

                        <div class="mb-12 lg:mb-0" data-aos="fade-up" data-aos-duration="300" data-aos-delay="300">
                            <div class="mb-6 inline-block rounded-full bg-red-200 p-4 text-red-600 shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" class="h-6 w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437l1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008z" />

                                </svg>



                            </div>
                            <h5 class="mb-4 text-lg font-bold text-red-600">Resourceful
                                Problem-Solving
                            </h5>
                            <p class="text-gray-500 dark:text-gray-400">
                                We excel in tackling challenges, pioneering solutions that redefine possibilities.
                            </p>

                        </div>

                        <div class="mb-12 lg:mb-0" data-aos="fade-up" data-aos-duration="300" data-aos-delay="600">
                            <div class="mb-6 inline-block rounded-full bg-red-200 p-4 text-red-600 shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" class="h-6 w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16.5 9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />

                                </svg>


                            </div>
                            <h5 class="mb-4 text-lg font-bold text-red-600">Enduring Impact</h5>
                            <p class="text-gray-500 dark:text-gray-400">
                                Our influence shapes industries and careers, crafting lasting legacies.
                            </p>

                        </div>

                        <div class="mb-12 lg:mb-0" data-aos="fade-up" data-aos-duration="300" data-aos-delay="900">
                            <div class="mb-6 inline-block rounded-full bg-red-200 p-4 text-red-600 shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" class="h-6 w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 18v-5.25m0 0a6.01 6.01 0 001.5-.189m-1.5.189a6.01 6.01 0 01-1.5-.189m3.75 7.478a12.06 12.06 0 01-4.5 0m3.75 2.383a14.406 14.406 0 01-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 10-7.517 0c.85.493 1.509 1.333 1.509 2.316V18" />

                                </svg>


                            </div>
                            <h5 class="mb-4 text-lg font-bold text-red-600">Holistic Approach</h5>
                            <p class="text-gray-500 dark:text-gray-400">
                                Our approach ensures lasting success with tailored solutions.
                            </p>

                        </div>

                    </div>
                </section>

                <section class="my-12 bg-white dark:bg-gray-800 px-6 rounded-md lg:rounded-lg py-12" id="services">

                    <div class="text-gray-500 dark:text-gray-400 mx-auto max-w-7xl px-6  lg:px-8 ">
                        <div class="mx-auto max-w-2xl lg:mx-0">
                            <h2 class="text-3xl font-bold tracking-tight text-red-600 sm:text-4xl">Services</h2>
                            <p class="mt-6 text-lg leading-8">Explore our comprehensive range of electrical engineering
                                services, designed to meet the diverse needs of the public and private sector. </p>
                        </div>
                        <dl
                            class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 text-base leading-7 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                            <div>
                                <dt class="font-semibold text-gray-900 dark:text-gray-200">
                                    Inspection
                                </dt>
                                <dd class="mt-1 ">
                                    Inspection and checking on low and medium voltage electrical equipment
                                </dd>
                            </div>

                            <div>
                                <dt class="font-semibold text-gray-900 dark:text-gray-200">
                                    Maintenance
                                </dt>
                                <dd class="mt-1 ">
                                    Maintenance and servicing low and medium voltage electrical equipment
                                </dd>
                            </div>

                            <div>
                                <dt class="font-semibold text-gray-900 dark:text-gray-200">
                                    Installation
                                </dt>
                                <dd class="mt-1 ">
                                    Installation and replacement of circuit breaker and transformer
                                </dd>
                            </div>

                            <div>
                                <dt class="font-semibold text-gray-900 dark:text-gray-200">
                                    Troubleshooting
                                </dt>
                                <dd class="mt-1 ">
                                    Troubleshooting and providing solutions for electrical system problem
                                </dd>
                            </div>

                            <div>
                                <dt class="font-semibold text-gray-900 dark:text-gray-200">
                                    Testing & Commisioning
                                </dt>
                                <dd class="mt-1 ">
                                    Testing and commissioning for low and medium voltage electrical equipment
                                </dd>
                            </div>

                            <div>
                                <dt class="font-semibold text-gray-900 dark:text-gray-200">
                                    Consultancy
                                </dt>
                                <dd class="mt-1">
                                    Advisory and consultancy for engineering services
                                </dd>
                            </div>
                        </dl>
                    </div>

                    <div class="overflow-x-auto whitespace-no-wrap mt-6">
                        <!-- Scrollable container -->
                        <div class="flex p-4 space-x-4">
                            <!-- Each picture -->
                            <div class="w-72 md:w-96 h-48 flex-shrink-0">
                                <img src="assets/img/services/service1.jpg" alt="Image 1"
                                    class="w-full h-full object-cover rounded-lg">
                            </div>
                            <div class="w-72 md:w-96 h-48 flex-shrink-0">
                                <img src="assets/img/services/service2.jpg" alt="Image 1"
                                    class="w-full h-full object-cover rounded-lg">
                            </div>
                            <div class="w-72 md:w-96 h-48 flex-shrink-0">
                                <img src="assets/img/services/service3.jpg" alt="Image 1"
                                    class="w-full h-full object-cover rounded-lg">
                            </div>
                            <div class="w-72 md:w-96 h-48 flex-shrink-0">
                                <img src="assets/img/services/service4.jpg" alt="Image 1"
                                    class="w-full h-full object-cover rounded-lg">
                            </div>
                            <div class="w-72 md:w-96 h-48 flex-shrink-0">
                                <img src="assets/img/services/service5.jpg" alt="Image 1"
                                    class="w-full h-full object-cover rounded-lg">
                            </div>
                            <div class="w-72 md:w-96 h-48 flex-shrink-0">
                                <img src="assets/img/services/service6.jpg" alt="Image 1"
                                    class="w-full h-full object-cover rounded-lg">
                            </div>
                            <div class="w-72 md:w-96 h-48 flex-shrink-0">
                                <img src="assets/img/services/service7.jpg" alt="Image 1"
                                    class="w-full h-full object-cover rounded-lg">
                            </div>
                            <div class="w-72 md:w-96 h-48 flex-shrink-0">
                                <img src="assets/img/services/service8.jpg" alt="Image 1"
                                    class="w-full h-full object-cover rounded-lg">
                            </div>
                            <div class="w-72 md:w-96 h-48 flex-shrink-0">
                                <img src="assets/img/services/service9.jpg" alt="Image 1"
                                    class="w-full h-full object-cover rounded-lg">
                            </div>
                        </div>
                    </div>
                </section>

                <section class="my-12 bg-white dark:bg-gray-800 px-6 rounded-md lg:rounded-lg py-12" id="experience">
                    <div data-aos="flip-up" class="">
                        <div>
                            <div class="mx-auto w-full shrink-0 grow-0 basis-auto">
                                <div class="p-6 md:px-12">
                                    <h2 class="display-5 mb-6 text-4xl font-bold text-red-600">
                                        Experience
                                    </h2>
                                    <p class="mb-12 text-neutral-500 dark:text-neutral-300">
                                        Our team specializes in comprehensive maintenance services for medium voltage
                                        systems, including equipment replacement and installation, thorough inspections,
                                        and rigorous testing of low and medium voltage components. This maintenance is
                                        performed to guarantee the ongoing reliability and excellent condition of
                                        electrical equipment, thus preventing any potential failures or disruptions in
                                        the power supply in the future.
                                    </p>

                                    <div class="grid gap-x-6 gap-y-6 md:grid-cols-3 lg:gap-x-12">

                                        <div>
                                            <img class="object-cover h-48 max-w-full rounded-lg"
                                                src="assets/img/experience1.jpg" alt="image description">
                                            <figcaption
                                                class="mt-2 text-sm text-center text-gray-500 dark:text-gray-400">
                                                Installation of medium voltage switchgear</figcaption>
                                        </div>

                                        <div>
                                            <img class="object-cover h-48 w-96 rounded-lg"
                                                src="assets/img/experience2.jpg" alt="image description">
                                            <figcaption
                                                class="mt-2 text-sm text-center text-gray-500 dark:text-gray-400">
                                                Maintenance of medium voltage transformer</figcaption>
                                        </div>
                                        <div>
                                            <img class="object-cover h-48 w-96 rounded-lg"
                                                src="assets/img/experience3.jpg" alt="image description">
                                            <figcaption
                                                class="mt-2 text-sm text-center text-gray-500 dark:text-gray-400">
                                                Testing & calibration of relay protection</figcaption>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="my-12 py-12" id="contacts">

                    <div data-aos="flip-down"
                        class=" block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-gray-800">

                        <div class="flex flex-wrap items-center">
                            <div class="block w-full shrink-0 grow-0 basis-auto lg:flex lg:w-6/12 xl:w-4/12">
                                <div class="h-[500px] w-full">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.4117822955695!2d101.66337307504627!3d2.9831133541506967!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cdb5b23bd10327%3A0x27e15eb54dceb271!2s17%2C%20Jalan%20Bpp%205%2F1%2C%20Pusat%20Bandar%20Putra%20Permai%2C%2043300%20Seri%20Kembangan%2C%20Selangor!5e0!3m2!1sen!2smy!4v1692922009079!5m2!1sen!2smy"
                                        class="left-0 top-0 h-full w-full rounded-t-lg lg:rounded-tr-none lg:rounded-bl-lg"
                                        frameborder="0" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="w-full shrink-0 grow-0 basis-auto lg:w-6/12 xl:w-8/12">
                                <h2
                                    class="mt-12 lg:mb-20 text-center text-3xl font-bold text-gray-900 dark:text-white">
                                    Contact <u class="text-red-600">Us</u>
                                </h2>
                                <div class="flex flex-wrap px-3 pt-12 pb-12 md:pb-0 lg:pt-0">
                                    <div data-aos="fade-left" data-aos-duration="500" data-aos-delay="300"
                                        class="mb-12 w-full shrink-0 grow-0 basis-auto px-3 md:w-6/12 md:px-6 lg:w-full xl:w-6/12 xl:px-12">
                                        <div class="flex items-start">
                                            <div class="shrink-0">
                                                <div class="inline-block rounded-md bg-red-200 p-4 text-red-600">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        class="h-6 w-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M14.25 9.75v-4.5m0 4.5h4.5m-4.5 0l6-6m-3 18c-8.284 0-15-6.716-15-15V4.5A2.25 2.25 0 014.5 2.25h1.372c.516 0 .966.351 1.091.852l1.106 4.423c.11.44-.054.902-.417 1.173l-1.293.97a1.062 1.062 0 00-.38 1.21 12.035 12.035 0 007.143 7.143c.441.162.928-.004 1.21-.38l.97-1.293a1.125 1.125 0 011.173-.417l4.423 1.106c.5.125.852.575.852 1.091V19.5a2.25 2.25 0 01-2.25 2.25h-2.25z" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="ml-6 grow">
                                                <p class="mb-2 font-bold dark:text-white">
                                                    Phone
                                                </p>
                                                <p class="text-gray-500 dark:text-gray-400">
                                                    <a href="tel:+60122753138">012 - 2753 138</a>
                                                </p>
                                                <p class="text-gray-500 dark:text-gray-400">
                                                    <a href="tel:+60148086799">014 - 8086 799</a>
                                                </p>
                                                <p class="text-gray-500 dark:text-gray-400">
                                                    <a href="tel:+60136073094">013 - 6073 094</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-aos="fade-left" data-aos-duration="500" data-aos-delay="600"
                                        class="mb-12 w-full shrink-0 grow-0 basis-auto px-3 md:w-6/12 md:px-6 lg:w-full xl:w-6/12 xl:px-12">
                                        <div class="flex items-start">
                                            <div class="shrink-0">
                                                <div class="inline-block rounded-md bg-red-200 p-4 text-red-600">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        class="h-6 w-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="ml-6 grow">
                                                <p class="mb-2 font-bold dark:text-white">
                                                    Inquiries
                                                </p>
                                                <p class="text-gray-500 dark:text-gray-400">
                                                    <a href="mailto:admin@myms.co">admin@myms.co</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-aos="fade-left" data-aos-duration="500" data-aos-delay="300"
                                        class="mb-12 w-full shrink-0 grow-0 basis-auto px-3 md:w-6/12 md:px-6 lg:w-full xl:mb-0 xl:w-6/12 xl:px-12">
                                        <div class="align-start flex">
                                            <div class="shrink-0">
                                                <div class="inline-block rounded-md bg-red-200 p-4 text-red-600">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        class="h-6 w-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="ml-6 grow">
                                                <p class="mb-2 font-bold dark:text-white">Address</p>
                                                <p class="text-gray-500 dark:text-gray-400">
                                                    No 17 Jalan BPP 5/1, <br>
                                                    Bandar Putra Permai, <br>
                                                    43300 Seri Kembangan, <br>
                                                    Selangor, Malaysia
                                                </p>

                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="mb-12 w-full shrink-0 grow-0 basis-auto px-3 md:w-6/12 md:px-6 lg:w-full xl:w-6/12 xl:px-12">
                                        <div class="flex items-start">
                                            <div class="shrink-0">
                                                <div class="inline-block rounded-md bg-red-200 p-4 text-red-600">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        class="w-6 h-6"
                                                        viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                            class="w-6 h-6"
                                                            viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                            <path
                                                                d="M579.8 267.7c56.5-56.5 56.5-148 0-204.5c-50-50-128.8-56.5-186.3-15.4l-1.6 1.1c-14.4 10.3-17.7 30.3-7.4 44.6s30.3 17.7 44.6 7.4l1.6-1.1c32.1-22.9 76-19.3 103.8 8.6c31.5 31.5 31.5 82.5 0 114L422.3 334.8c-31.5 31.5-82.5 31.5-114 0c-27.9-27.9-31.5-71.8-8.6-103.8l1.1-1.6c10.3-14.4 6.9-34.4-7.4-44.6s-34.4-6.9-44.6 7.4l-1.1 1.6C206.5 251.2 213 330 263 380c56.5 56.5 148 56.5 204.5 0L579.8 267.7zM60.2 244.3c-56.5 56.5-56.5 148 0 204.5c50 50 128.8 56.5 186.3 15.4l1.6-1.1c14.4-10.3 17.7-30.3 7.4-44.6s-30.3-17.7-44.6-7.4l-1.6 1.1c-32.1 22.9-76 19.3-103.8-8.6C74 372 74 321 105.5 289.5L217.7 177.2c31.5-31.5 82.5-31.5 114 0c27.9 27.9 31.5 71.8 8.6 103.9l-1.1 1.6c-10.3 14.4-6.9 34.4 7.4 44.6s34.4 6.9 44.6-7.4l1.1-1.6C433.5 260.8 427 182 377 132c-56.5-56.5-148-56.5-204.5 0L60.2 244.3z" />
                                                        </svg>
                                                </div>
                                            </div>
                                            <div class="ml-6 grow space-y-3">

                                                <p class="mb-2 font-bold dark:text-white">
                                                    Social media
                                                </p>
                                                <p class="text-gray-500 dark:text-gray-400">
                                                <div
                                                    class="flex space-x-4 text-gray-500 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-600">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                        fill="currentColor"
                                                        viewBox="0 0 320 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                        <path
                                                            d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z" />
                                                    </svg>
                                                    <a href="https://www.facebook.com/zaidi.aziz.710">
                                                        Myms Engineering Resources
                                                    </a>
                                                </div>
                                                <div
                                                    class="flex space-x-4 text-gray-500 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-600">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                        fill="currentColor"
                                                        viewBox="0 0 320 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                        <path
                                                            d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z" />
                                                    </svg>
                                                    <a
                                                        href="https://www.facebook.com/people/MymsAcademy-Sdn-Bhd/pfbid029psdPpEC1HSg89rpYN9SRC42CMUu8L4sGQzGzVVCX3CUfWE9AuPgNyXNL792wFwAl/">
                                                        Myms Academy Sdn Bhd
                                                    </a>
                                                </div>
                                                <div
                                                    class="hover:text-red-600 dark:hover:text-red-600 flex space-x-4 text-gray-500 dark:text-gray-400">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                        fill="currentColor"
                                                        viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                        <path
                                                            d="M448,209.91a210.06,210.06,0,0,1-122.77-39.25V349.38A162.55,162.55,0,1,1,185,188.31V278.2a74.62,74.62,0,1,0,52.23,71.18V0l88,0a121.18,121.18,0,0,0,1.86,22.17h0A122.18,122.18,0,0,0,381,102.39a121.43,121.43,0,0,0,67,20.14Z" />
                                                    </svg>
                                                    <a href="https://www.tiktok.com/@mymsacademy">@mymsacademy</a>

                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </section>

                <section class="py-12 text-center lg:text-left" id="team">

                    <h2 class="mb-12  text-center text-3xl font-bold text-gray-900 dark:text-white">
                        Meet <u class="text-red-600">Our Team</u>
                    </h2>

                    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4 xl:gap-x-4">
                        <div data-aos="zoom-in" data-aos-duration="500" class="mb-6 lg:mb-0">
                            <div
                                class="rounded-mb lg:rounded-lgrelative block rounded-lg p-6 bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-gray-800">
                                <div class="flex-row items-center lg:flex">
                                    <div class="w-full shrink-0 grow-0 basis-auto lg:w-5/12 lg:pr-6">
                                        <img src="assets/img/cgdi.jpg" alt="Trendy Pants and Shoes"
                                            class="mb-6 w-full rounded-md lg:mb-0" />
                                    </div>
                                    <div class="w-full shrink-0 grow-0 basis-auto lg:w-7/12">
                                        <h5 class="mb-2 text-lg font-bold text-gray-900 dark:text-white">
                                            Marzaidi Bin Abdul Aziz
                                        </h5>
                                        <p class="mb-4 text-neutral-500 dark:text-neutral-300">Managing Director</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-aos="zoom-in" data-aos-duration="500" data-aos-delay="500" class="mb-6 lg:mb-0">
                            <div
                                class="relative block rounded-lg p-6 bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-gray-800">
                                <div class="flex-row items-center lg:flex">
                                    <div class="w-full shrink-0 grow-0 basis-auto lg:w-5/12 lg:pr-6">
                                        <img src="assets/img/wak.jpg" alt="Trendy Pants and Shoes"
                                            class="mb-6 w-full rounded-md lg:mb-0" />
                                    </div>
                                    <div class="w-full shrink-0 grow-0 basis-auto lg:w-7/12">
                                        <h5 class="mb-2 text-lg font-bold text-gray-900 dark:text-white">
                                            Mohd Nazir Bin Ngadiman
                                        </h5>
                                        <p class="mb-4 text-neutral-500 dark:text-neutral-300">
                                            Project Manager
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-aos="zoom-in" data-aos-duration="500" class="mb-6 lg:mb-0">
                            <div
                                class="relative block rounded-lg p-6 bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-gray-800">
                                <div class="flex-row items-center lg:flex">
                                    <div class="w-full shrink-0 grow-0 basis-auto lg:w-5/12 lg:pr-6">
                                        <img src="assets/img/wina.jpg" alt="Trendy Pants and Shoes"
                                            class="mb-6 w-full rounded-md lg:mb-0" />
                                    </div>
                                    <div class="w-full shrink-0 grow-0 basis-auto lg:w-7/12">
                                        <h5 class="mb-2 text-lg font-bold text-gray-900 dark:text-white">
                                            Mirza Syazwina Binti Maizan
                                        </h5>
                                        <p class="mb-4 text-neutral-500 dark:text-neutral-300">Project Engineer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-aos="zoom-in" data-aos-duration="500" data-aos-delay="1000" class="mb-6 lg:mb-0">
                            <div
                                class="relative block rounded-lg p-6 bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-gray-800">
                                <div class="flex-row items-center lg:flex">
                                    <div class="w-full shrink-0 grow-0 basis-auto lg:w-5/12 lg:pr-6">
                                        <img src="assets/img/irfan.jpg" alt="Trendy Pants and Shoes"
                                            class="mb-6 w-full rounded-md lg:mb-0" />
                                    </div>
                                    <div class="w-full shrink-0 grow-0 basis-auto lg:w-7/12">
                                        <h5 class="mb-2 text-lg font-bold text-gray-900 dark:text-white">
                                            Muhammad Irfan Bin Rohaizad
                                        </h5>
                                        <p class="mb-4 text-neutral-500 dark:text-neutral-300">Training Engineer
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="my-6 p-6 bg-white mx-auto max-w-3xl dark:bg-gray-800 rounded-md lg:rounded-lg">
                    <div class="mx-auto max-w-screen-md">
                        <h2
                            class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">
                            Inquiry</h2>
                        <p class="mb-4 font-light text-center text-gray-500 dark:text-gray-400 sm:text-xl">
                        </p>
                        <livewire:inquiry-form />
                    </div>
                </section>

                <section class="rounded-md lg:rounded-lg ">
                    <div class="py-8 lg:py-16 mx-auto max-w-screen-xl px-4">
                        <h2
                            class="mb-8 lg:mb-16 text-3xl font-extrabold tracking-tight leading-tight text-center text-gray-900 dark:text-white md:text-4xl">
                            In collaboration with:
                        </h2>
                        <div
                            class="grid grid-cols-2 gap-8 text-gray-500 sm:gap-12 md:grid-cols-3 lg:grid-cols-5 dark:text-gray-400">
                            <a href="#" class="flex justify-center items-center">
                                <img src="{{ asset('assets/img/logo/cidb.svg') }}" alt="">
                            </a>
                            <a href="#" class="flex justify-center items-center">
                                <img src="{{ asset('assets/img/logo/hrdf.svg') }}" alt=""
                                    class="flex dark:hidden">
                                <img src="{{ asset('assets/img/logo/hrdf-dark.svg') }}" alt=""
                                    class="hidden dark:flex">
                            </a>
                            <a href="#" class="flex justify-center items-center">
                                <img src="{{ asset('assets/img/logo/mbot.svg') }}" alt=""
                                    class="flex dark:hidden">
                                <img src="{{ asset('assets/img/logo/mbot-dark.svg') }}" alt=""
                                    class="hidden dark:flex">
                            </a>
                            <a href="#" class="flex justify-center items-center">
                                <img src="{{ asset('assets/img/logo/tnb.svg') }}" alt="">
                            </a>
                            <a href="#" class="flex justify-center items-center">
                                <img src="{{ asset('assets/img/logo/st.svg') }}" alt="">
                            </a>
                        </div>
                    </div>
                </section>
            </main>
        </div>

        @stack('modals')

        @livewireScripts

        <script src="{{ asset('assets/js/script.js') }}"></script>

        @push('scripts')
            <script>
                const text =
                    "Empowering Innovation Through Electrical Engineering Excellence. Elevate Your Career with Expert-Led Classes.";
                const typingSpeed = 30; // Adjust this value to control typing speed in milliseconds

                let index = 0;

                function typeText() {
                    if (index < text.length) {
                        document.getElementById("typing-text").innerHTML += text.charAt(index);
                        index++;
                        setTimeout(typeText, typingSpeed);
                    }
                }

                document.addEventListener("DOMContentLoaded", function() {
                    setTimeout(typeText, 1000);
                });
            </script>

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
