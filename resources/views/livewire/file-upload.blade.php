<form action="{{ route('career.store') }}" class="space-y-8" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name</label>
        <input type="name" wire:model="name" name="name" id="name"
            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"
            placeholder="Your name" required>
    </div>
    <div>
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your
            email</label>
        <input wire:model="email" type="email" name="email" id="email"
            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"
            placeholder="name@example.com" required>
    </div>
    <div>
        <label for="contact" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your
            phone number</label>
        <input wire:model="contact" type="number" name="contact" id="contact"
            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"
            placeholder="Phone Number" required>
    </div>
    <div>
        <label for="position_to_apply" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Position to Apply</label>
        <input wire:model="position_to_apply" type="text" name="position_to_apply"
            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"
            placeholder="eg: tester" required>
    </div>

    <div>
        <label for="resume" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Resume</label>
        <input required accept="application/pdf"
            class="p-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
            id="resume" name="resume" wire:model="resume" type="file">

        {{ $upload_status }}
    </div>
    <button type="submit"
        class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-blue-700 sm:w-fit hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Submit
    </button>
</form>
