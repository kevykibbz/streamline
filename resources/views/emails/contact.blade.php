@component('mail::message')
# Query received
Thank you for contacting us. we will get back to you assoon as possible.

Thanks,<br>
{{ $site->site_name ? $site->site_name : config('constants.site_name') }}
<br>
Contact <a href="tel:{{ $site->phone ? $site->phone : config('constants.phone') }}">{{ $site->phone ? $site->phone : config('app.phone') }}</a><br>
Visit  <a href="{{ $site->site_url ? $site->site_url : config('constants.site_url') }}">{{ $site->site_url ? $site->site_url : config('constants.site_url') }}
</a>
@endcomponent
