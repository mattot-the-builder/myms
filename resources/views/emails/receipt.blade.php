@component('mail::message')
# Receipt
@component('mail::subcopy')
Date : {{ $invoice['date'] }} <br>
Invoice No: MYMS/IN/R/{{ $invoice['id'] }}
@endcomponent


## Bill To
{{ $invoice['user_name'] }} <br>
{{ $invoice['user_address'] }}

<x-mail::table>
    | Description | Amount
    | :------------- | -------------:|
    | {{ $invoice['course_name'] }} | RM {{ $invoice['fee'] }} |
    | Total | RM {{ $invoice['fee'] }} |
</x-mail::table>

Thanks, <br>
MYMS
@endcomponent
