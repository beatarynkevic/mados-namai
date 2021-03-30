<form method="POST" action="{{route('outfit.store')}}">
    Type: <input type="text" name="outfit_type">
    Color: <input type="text" name="outfit_color">
    Size: <input type="text" name="outfit_size">
    About: <textarea name="outfit_about"></textarea>
    <select name="master_id">
        @foreach ($masters as $master)
        <option value="{{$master->id}}">{{$master->name}} {{$master->surname}}</option>
        @endforeach
    </select>
    @csrf
    <button type="submit">ADD</button>
</form>

@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">PAVADINIMAS</div>
                <div class="card-body">
                    BLADE TURINYS
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
