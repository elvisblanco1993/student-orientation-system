@component('mail::message')
# Orientation is ready.

Hello there,
We just wanted to let you know that your orientation is ready. You can access it and complete it by clicking on the button below.

@component('mail::button', ['url' => $url])
Orientation
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
