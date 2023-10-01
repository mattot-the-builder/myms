    <section class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="overflow-hidden">
                @if ($course)
                    <div class="px-12 max-w-2xl">
                        <h2 class="mb-2 text-xl font-semibold leading-none text-gray-900 md:text-2xl dark:text-white">
                            {{ $course->name }}
                        </h2>
                        <p class="mb-4 text-xl font-extrabold leading-none text-gray-900 md:text-2xl dark:text-white">
                            RM {{ $course->fee }}
                        </p>
                        <dl>
                            <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Contents</dt>
                            <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                {!! $course->contents !!}
                            </dd>
                        </dl>
                        <div>
                            <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Date</dt>
                            <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                {{ Carbon\Carbon::parse($course->date_start)->format('d F Y') . ' - ' . Carbon\Carbon::parse($course->date_end)->format('d F Y') }}
                            </dd>
                        </div>
                        <div>
                            <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Time</dt>
                            <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                {{ Carbon\Carbon::parse($course->started_at)->format('H:i A') . ' - ' . Carbon\Carbon::parse($course->ended_at)->format('H:i A') }}
                            </dd>
                        </div>
                        <div class="flex items-center space-x-4">
                            <a href="{{ route('course.register-selected', $course->id) }}" type="button"
                                class="text-white inline-flex items-center bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
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
                @endif

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
                                    <a wire:click="setCourse({{ $course->id }})">
                                        <tr wire:click="setCourse({{ $course->id }})"
                                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $course->name }}
                                            </th>
                                            <td class="px-6 py-4">
                                                RM {{ $course->fee }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ Carbon\Carbon::parse($course->date_start)->format('d F Y') }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ Carbon\Carbon::parse($course->date_end)->format('d F Y') }}
                                            </td>
                                            <td class="px-6 py-4 text-right flex flex-wrap justify-center space-x-2">
                                                <a href="#{{ $course->name }}"
                                                    wire:click="setCourse({{ $course->id }})"
                                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                                                <a href="{{ route('course.register-selected', $course->id) }}"
                                                    class="font-medium text-green-600 dark:text-green-500 hover:underline">Register</a>
                                            </td>
                                    </a>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>
    </section>
