@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Outfits list</h2>
                    <form action="{{route('master.index')}}" method="get">
                        <div class="form-group">
                            <label>Author: </label>
                            <select name="master_id" class="form-control">
                                @foreach ($masters as $master)
                                <option value="{{$master->id}}">
                                    {{$master->name}} {{$master->surname}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </form>
                    <a href="{{route('master.index')}}" class="btn btn-info">Default</a>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($outfits as $outfit)
                        <li class="list-group-item list-line">
                            <div class="list-line__outfits">

                                <div class="list-line__outfits__type">
                                    {{$outfit->color}} {{$outfit->type}}
                                </div>

                                <div class="list-line__outfits__master">
                                    {{$outfit->outfitMaster->name}} {{$outfit->outfitMaster->surname}}
                                </div>
                            </div>
                            <div class="list-line__buttons">
                                <a href="{{route('outfit.edit',[$outfit])}}" class="btn btn-primary">EDIT</a>
                                <form method="POST" action="{{route('outfit.destroy', [$outfit])}}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">DELETE</button>
                                </form>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
