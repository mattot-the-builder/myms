<div class="mb-6 grid gap-4 sm:grid-cols-2 sm:gap-6 border-b border-gray-900/10  dark:border-gray-600 pb-12">
    <div>
        <label for="course_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Course</label>
        <select id="course_id" name="course_id"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
            <option selected="" value="null" disabled>Select Course</option>
            @foreach ($courses as $course)
            <option value="{{ $course->id }}">
                {{ $course->name }}
            </option>
            @endforeach

        </select>

    </div>
    <select wire:model="course_id">
        <option value="">Select a course</option>
        <option value="1">Course 1</option>
        <option value="2">Course 2</option>
        <option value="3">Course 3</option>
    </select>

    <input type="text" wire:model="course_id" placeholder="Enter course ID">
    {{ $course_id }}


    <div class="flex-wrap">
        <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Date : {{ $course->date }}
        </span>
        <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Start : {{ $course->started_at }}
        </span>
        <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            End : {{ $course->ended_at }}
        </span>
    </div>
</div>
