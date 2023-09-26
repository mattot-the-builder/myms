<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

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
                                        Start
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        End
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Countdown
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
                                        <td class="px-6 py-4"
                                            :class="$course_registration - > course - > started_at > Carbon\ Carbon::now() ?
                                                'text-green-600' : 'text-yello-400'">
                                            {{ Carbon\Carbon::parse($course_registration->course->started_at)->format('m/d/Y h:i A') }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ Carbon\Carbon::parse($course_registration->course->ended_at)->format('m/d/Y h:i A') }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ Carbon\Carbon::parse($course_registration->course->started_at)->diffForHumans() }}
                                        </td>
                                        <td class="px-6 py-4 text-right flex flex-wrap justify-center space-x-2">
                                            <a href="{{ route('course-registration.view', $course_registration->id) }}"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    <div class="mx-auto my-4 flex justify-center">
                        <!-- Previous Button -->
                        <a href="{{ $course_registrations->previousPageUrl() }}"
                            class="flex items-center justify-center px-4 h-10 mr-3 text-base font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <svg class="w-3.5 h-3.5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4" />
                            </svg>
                            Previous
                        </a>
                        <a href="{{ $course_registrations->nextPageUrl() }}"
                            class="flex items-center justify-center px-4 h-10 text-base font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            Next
                            <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </section>

</x-app-layout>
