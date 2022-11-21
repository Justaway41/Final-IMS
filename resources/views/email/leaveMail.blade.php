<h2>{{ $mailData['name'] }} has requested for a {{ $mailData['total_days'] }} days leave.</h2>
<br>
<h4>
    Reason: {{ $mailData['reason'] }} <br>
    From date: {{ $mailData['start_date'] }} <br>
    To date: {{ $mailData['end_date'] }} <br>
</h4>
Please log into IMS to accept or decline this request.