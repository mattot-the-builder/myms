<div>
    <div
        class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg max-w-4xl mx-auto p-6 text-gray-900 dark:text-gray-100">
        <h2 class="mb-2 text-xl font-semibold leading-none text-gray-900 md:text-2xl dark:text-white">
            Registration Details
        </h2>

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
                <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Sponsorship status</dt>
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
                <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Payment Method</dt>
                <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                    {{ $course_registration->invoice->first()->payment_method }}
                </dd>
            </div>
            <div>
                <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Payment Status</dt>
                <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                    {{ $course_registration->invoice->first()->payment_status }}
                </dd>
            </div>
        </div>

    </div>
    <section class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="overflow-hidden">

                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h2 class="mb-6 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Registered courses') }}
                    </h2>

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Course
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Date
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Start
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        End
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">View</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($course_registrations as $course_registration)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $course_registration->course->name }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $course_registration->course->date }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $course_registration->course->started_at }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $course_registration->course->ended_at }}
                                        </td>
                                        <td class="px-6 py-4 text-right flex flex-wrap justify-center space-x-2">
                                            <a href="#"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>
    </section>
</div>
