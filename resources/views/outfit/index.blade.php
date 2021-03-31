@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Outfits list</div>
                <div class="card-body">
                    @foreach ($outfits as $outfit)
                    {{$outfit->color}} {{$outfit->type}} {{$outfit->outfitMaster->name}} {{$outfit->outfitMaster->surname}}<a href="{{route('outfit.edit',[$outfit])}}">EDIT</a>
                    <form method="POST" action="{{route('outfit.destroy', [$outfit])}}">
                        @csrf
                        <button type="submit">DELETE</button>
                    </form>
                    <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
