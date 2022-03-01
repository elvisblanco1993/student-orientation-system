@component('mail::message')
Dear student,

The team at URBE University welcomes you with warm hearts.

Prior to begin your first semester you need to complete the University's orientation process.
We highly recommend that you separate at least 1 hour of your time so that you can complete the orientation.
If you cannot finish it, do not worry. You can always complete it at another time of your choosing.

@component('mail::button', ['url' => $url])
Begin the Orientation Process
@endcomponent

If you have any questions during the orientation, please contact your Admissions representative.

With warm regards,<br>
{{ config('app.name') }}
@endcomponent
