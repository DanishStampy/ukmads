@component('mail::message')

<h1>{{$details['title']}}</h1>
<br>
<h4>
  {{$details['event_name']}}
</h4>
<p>{{$details['event_details']}}</p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
