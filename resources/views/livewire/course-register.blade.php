<div class="mb-6 grid gap-4 sm:grid-cols-2 sm:gap-6 border-b border-gray-900/10  dark:border-gray-600 pb-12">
    <div>
        <label for="course_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Course</label>
        <select id="course_id" name="course_id"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
            <option selected="" value="null" disabled>Select Course</option>
            @foreach ($courses as $course)
                @if ($course->id == $course_id)
                    <option selected wire:click="updateCourse({{ $course->id }})" value="{{ $course->id }}">
                        {{ $course->name }}
                    </option>
                @else
                    <option wire:click="updateCourse({{ $course->id }})" value="{{ $course->id }}">
                        {{ $course->name }}
                    </option>
                @endif
            @endforeach

        </select>

    </div>

    <div class="flex-wrap">
        <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Date : {{ $course_date }}
        </span>
        <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Start : {{ $course_started_at }}
        </span>
        <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            End : {{ $course_ended_at }}
        </span>
    </div>
</div>
