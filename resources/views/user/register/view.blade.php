<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Registration Details') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h2 class="mb-2 text-xl font-semibold leading-none text-gray-900 md:text-2xl dark:text-white">
                        Registration Details
                    </h2>
                    <dl>
                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Registration ID :
                            {{ $course_registration->id }}</dt>
                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Invoice ID :
                            MYMS/IN/E/{{ $course_registration->invoice->first()->id }}</dt>
                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Receipt ID :
                            MYMS/R/E/{{ $course_registration->invoice->first()->id }}</dt>
                    </dl>
                    <p class="mb-4 text-xl font-extrabold leading-none text-gray-900 md:text-2xl dark:text-white">
                        Course Details
                    </p>
                    <p class="mb-4 text-xl font-extrabold leading-none text-gray-900 md:text-2xl dark:text-white">
                        Course Details
                    </p>
                    <dl>
                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Course Name</dt>
                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                            {{-- {{!! $course->contents !!}} --}}
                            {{ $course_registration->course->name }}
                        </dd>
                    </dl>
                    <dl class="grid grid-cols-3">
                        <div>
                            <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Date</dt>
                            <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                {{ $course_registration->course->date }}
                            </dd>
                        </div>
                        <div>
                            <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Start</dt>
                            <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                {{ $course_registration->course->started_at }}
                            </dd>
                        </div>
                        <div>
                            <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">End</dt>
                            <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                {{ $course_registration->course->ended_at }}
                            </dd>
                        </div>
                    </dl>

                    <p class="mb-4 text-xl font-extrabold leading-none text-gray-900 md:text-2xl dark:text-white">
                        Personal Details
                    </p>
                    <div class="grid grid-cols-2">
                        <dl>
                            <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Name</dt>
                            <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                {{-- {{!! $course->contents !!}} --}}
                                {{ $course_registration->name }}
                            </dd>
                        </dl>
                        <dl>
                            <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">IC Number</dt>
                            <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                {{ $course_registration->ic_number }}
                            </dd>
                        </dl>
                        <dl>
                            <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Address</dt>
                            <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                {{ $course_registration->address }}
                            </dd>
                        </dl>
                        <dl>
                            <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Contact</dt>
                            <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                {{ $course_registration->contact }}
                            </dd>
                        </dl>
                    </div>

                    <p class="mb-4 text-xl font-extrabold leading-none text-gray-900 md:text-2xl dark:text-white">
                        Work Details
                    </p>
                    <div class="grid grid-cols-2">
                        <div>
                            <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Company Name</dt>
                            <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                {{ $course_registration->company_name }}
                            </dd>
                        </div>
                        <div>
                            <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Position</dt>
                            <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                {{ $course_registration->position }}
                            </dd>
                        </div>
                        <div>
                            <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Competency</dt>
                            <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                {{ $course_registration->competency }}
                            </dd>
                        </div>
                        <div>
                            <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Sponsorship status
                            </dt>
                            <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                {{ $course_registration->is_sponsored }}
                            </dd>
                        </div>
                    </div>

                    <p class="mb-4 text-xl font-extrabold leading-none text-gray-900 md:text-2xl dark:text-white">
                        Payment Details
                    </p>
                    <div class="grid grid-cols-2">
                        <div>
                            <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Payment Method
                            </dt>
                            <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                {{ $course_registration->invoice->first()->payment_method }}
                            </dd>
                        </div>
                        <div>
                            <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Payment Status
                            </dt>
                            <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                {{ $course_registration->invoice->first()->payment_status }}
                            </dd>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



</x-app-layout>
