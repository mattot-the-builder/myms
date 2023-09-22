<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Register') }}
        </h2>
    </x-slot>

    <section class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="mb-4 text-2xl font-bold text-gray-900 dark:text-white">Select Course</h2>
                    <form action="{{ route('course.store') }}" method="POST" class="max-w-2xl mx-auto">
                        @csrf
                        <livewire:course-register />
                        {{-- <div --}}
                        {{--     class="mb-6 grid gap-4 sm:grid-cols-2 sm:gap-6 border-b border-gray-900/10  dark:border-gray-600 pb-12"> --}}
                        {{--     <div> --}}
                        {{--         <label for="course_id" --}}
                        {{--             class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Course</label> --}}
                        {{--         <select id="course_id" name="course_id" --}}
                        {{--             class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"> --}}
                        {{--             <option selected="">Select Course</option> --}}
                        {{--             @foreach ($courses as $course) --}}
                        {{--                 {{ dd($course->id) }} --}}
                        {{--                 <option value="{{ $course->id }}"> --}}
                        {{--                     {{ $course->name }} --}}
                        {{--                 </option> --}}
                        {{--             @endforeach --}}
                        {{--         </select> --}}
                        {{-- --}}
                        {{--     </div> --}}
                        {{-- --}}
                        {{-- --}}
                        {{--     <div class="flex-wrap"> --}}
                        {{--         <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> --}}
                        {{--             Date : {{ $course->date }} --}}
                        {{--         </span> --}}
                        {{--         <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> --}}
                        {{--             Start : {{ $course->started_at }} --}}
                        {{--         </span> --}}
                        {{--         <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> --}}
                        {{--             End : {{ $course->ended_at }} --}}
                        {{--         </span> --}}
                        {{--     </div> --}}
                        {{-- </div> --}}
                        <div
                            class="mb-6 grid gap-4 sm:grid-cols-2 sm:gap-6 border-b border-gray-900/10  dark:border-gray-600 pb-12">
                            <h2 class="sm:col-span-2 text-xl font-bold text-gray-900 dark:text-white">Personal
                                Details</h2>
                            <div class="sm:col-span-2">
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                <input type="text" name="name" id="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Enter name" required="">
                            </div>
                            <div class="w-full">
                                <label for="ic_number"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">IC
                                    Number</label>
                                <input type="number" name="ic_number" id="ic_number"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="IC Number" required="">
                            </div>
                            <div class="w-full">
                                <label for="contact"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contact</label>
                                <input type="number" name="contact" id="contact"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Contact" required="">
                            </div>
                            <div class="sm:col-span-2">
                                <label for="address"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                                <textarea id="address" name="address" rows="3"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Address">
                    </textarea>
                            </div>
                        </div>
                        <div
                            class="mb-6 grid gap-4 sm:grid-cols-2 sm:gap-6 border-b border-gray-900/10  dark:border-gray-600 pb-12">
                            <h2 class="sm:col-span-2 text-xl font-bold text-gray-900 dark:text-white">Company
                                Details</h2>
                            <div class="w-full">
                                <label for="company_name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Company
                                    Name</label>
                                <input type="text" name="company_name" id="company_name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Company Name" required="">
                            </div>
                            <div class="w-full">
                                <label for="position"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Position</label>
                                <input type="text" name="position" id="position"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Position" required="">
                            </div>
                            <div>
                                <label for="competency"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Competency</label>
                                <select id="competency" name="competency"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option selected="">Select competency</option>
                                    <option value="1">Level 1</option>
                                    <option value="2">Level 2</option>
                                    <option value="3">Level 3</option>
                                </select>
                            </div>
                            <div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" name="is_sponsored" value="0" class="sr-only peer">
                                    <div
                                        class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                    </div>
                                    <span
                                        class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Sponsorship</span>
                                </label>
                            </div>
                        </div>
                        <button type="submit"
                            class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                            Add product
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    {{-- <livewire:course-register :courses="$courses" /> --}}
</x-app-layout>
