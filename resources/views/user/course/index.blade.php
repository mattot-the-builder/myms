<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <section class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Fee
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
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($courses as $course)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $course->name }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $course->fee }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $course->date }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $course->started_at }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $course->ended_at }}
                                        </td>
                                        <td class="px-6 py-4 text-right flex flex-wrap justify-center space-x-2">
                                            <a href="#"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                                            <a href="#"
                                                class="font-medium text-green-600 dark:text-green-500 hover:underline">Register</a>
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
    <section class="dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">


        </div>
    </section>
</x-app-layout>
