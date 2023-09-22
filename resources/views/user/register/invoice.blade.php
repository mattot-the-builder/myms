<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Student Registration') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border rounded-lg shadow-lg px-6 py-8 max-w-md mx-auto ">
                <h1 class="font-bold text-2xl my-4 text-center text-blue-600">MYMS</h1>
                <hr class="mb-2">
                <div class="flex justify-between mb-6">
                    <h1 class="text-lg font-bold">Invoice</h1>
                    <div class="text-gray-700">
                        <div>Date: {{ $invoice->created_at->format('d-m-Y') }}</div>
                        <div>Invoice No: MYMS/IN/E/ {{ $invoice->id }}</div>
                    </div>
                </div>
                <div class="mb-8">
                    <h2 class="text-lg font-bold mb-4">Bill To:</h2>
                    <div class="text-gray-700 mb-2">{{ $invoice->courseRegistration->name }}</div>
                    <div class="text-gray-700 mb-2">{{ $invoice->courseRegistration->address }}</div>
                </div>
                <table class="w-full mb-8">
                    <thead>
                        <tr>
                            <th class="text-left font-bold text-gray-700">Description</th>
                            <th class="text-right font-bold text-gray-700">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-left text-gray-700">
                                {{ $invoice->courseRegistration->course->name }}
                            </td>
                            <td class="text-right text-gray-700">RM {{ $invoice->courseRegistration->course->fee }}
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td class="text-left font-bold text-gray-700">Total</td>
                            <td class="text-right text-gray-700">RM {{ $invoice->courseRegistration->course->fee }}
                        </tr>
                    </tfoot>
                </table>
                <div class="text-gray-700 mb-2">Thank you for your business!</div>
                {{-- <div class="text-gray-700 text-sm">Please remit payment within 30 days.</div> --}}
            </div>


            <form class="py-8 max-w-xs mx-auto" action="{{ route('invoice.checkout', $invoice->id) }}" method="POST">
                @csrf
                <div>
                    <select name="payment_method"
                        class="mb-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="fpx">FPX</option>
                        <option value="card">Card</option>
                    </select>
                </div>
                <div class="flex justify-center">
                    <button type="submit"
                        class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Pay
                        Now</button>
                    @if ($invoice->courseRegistration->is_sponsored)
                        <a href="{{ route('course.index') }}"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Pay
                            Later
                        </a>
                    @endif
                </div>
        </div>
        </form>


    </div>
    </div>

    </div>
</x-app-layout>
