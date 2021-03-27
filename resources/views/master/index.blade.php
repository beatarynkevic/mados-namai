@foreach ($masters as $master)
{{$master->name}} {{$master->surname}}<a href="{{route('master.edit',[$master])}}">EDIT</a>
<form method="POST" action="{{route('master.destroy', [$master])}}">
    @csrf
    <button type="submit">DELETE</button>
</form>
<br>
@endforeach
