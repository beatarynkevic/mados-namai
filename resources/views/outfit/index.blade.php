@foreach ($outfits as $outfit)
{{$outfit->color}} {{$outfit->type}} {{$outfit->outfitMaster->name}} {{$outfit->outfitMaster->surname}}<a href="{{route('outfit.edit',[$outfit])}}">EDIT</a>
<form method="POST" action="{{route('outfit.destroy', [$outfit])}}">
    @csrf
    <button type="submit">DELETE</button>
</form>
<br>
@endforeach
