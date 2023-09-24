@component('mail::message')

# Invoice
@component('mail::subcopy')
Date : {{ $invoice['date'] }} <br>
Invoice No: MYMS/IN/E/{{ $invoice['id'] }}
@endcomponent


## Bill To
{{ $invoice['user_name'] }} <br>
{{ $invoice['user_address'] }} <br>

<x-mail::table>
    | Description | Amount
    | :------------- | -------------:|
    | {{ $invoice['course_name'] }} | RM {{ $invoice['fee'] }} |
    | Total | RM {{ $invoice['fee'] }} |
</x-mail::table>

Thanks, <br>
MYMS
@endcomponent
