@component('mail::message')
# Application received

We have received your application.Our team is reviewing your application and we will notify your upon the approval of the application.Thank you for choosing {{ config('app.name') }}.

Thanks,<br>
{{ config('app.name') }}
<br>
Contact <a href="tel:{{ config('app.phone') }}">{{ config('app.phone') }}</a><br>
Visit  <a href="{{ config('app.url') }}">website</a>
@endcomponent
