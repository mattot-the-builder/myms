<section class="my-12 bg-white dark:bg-gray-800 px-6 rounded-md lg:rounded-lg py-12 text-center" id="courses">

    <div class="flex justify-center">
        <div class="max-w-[700px] text-center">
            <h2 class="mb-6 text-center text-3xl font-bold text-grey-800 dark:text-white">
                Training
                <u class="text-red-600">Courses</u>
            </h2>
            <div>
                <label for="course_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Course</label>
                <select id="course_id" name="course_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option selected="" value="null" disabled>Select Course</option>
                    @foreach ($courses as $course)
                        @if ($course->id == $course_id)
                            <option selected wire:click="setCourse({{ $course->id }})" value="{{ $course->id }}">
                                {{ $course->name }}
                            </option>
                        @else
                            <option wire:click="setCourse({{ $course->id }})" value="{{ $course->id }}">
                                {{ $course->name }}
                            </option>
                        @endif
                    @endforeach

                </select>
            </div>

            <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
                <h2 class="mb-2 text-xl font-semibold leading-none text-gray-900 md:text-2xl dark:text-white">
                    {{ $course_name }}</h2>
                <p class="mb-4 text-xl font-extrabold leading-none text-gray-900 md:text-2xl dark:text-white">
                    RM {{ $course_fee }}</p>
                <dl>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Course Content</dt>
                    <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                        {!! $course_contents !!}
                    </dd>
                </dl>
                <dl class="flex items-center space-x-6">
                    <div>
                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Date</dt>
                        {{ Carbon\Carbon::parse($course_date_start)->format('d F Y') . ' - ' . Carbon\Carbon::parse($course_date_end)->format('d F Y') }}
                        </dd>
                        </dd>
                    </div>
                </dl>
                <div>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Time</dt>
                    <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                        {{ Carbon\Carbon::parse($course_started_at)->format('H:i A') . ' - ' . Carbon\Carbon::parse($course_ended_at)->format('H:i A') }}
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('course.register-selected', $course_id) }}" type="button"
                        class="mx-auto text-white inline-flex items-center bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        <svg aria-hidden="true" class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
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
</section>
