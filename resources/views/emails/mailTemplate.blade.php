@component('mail::message')
# Welcome

The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent
Thanks,<br>

{{ conconfigfig('app.name') }}
@endcomponent