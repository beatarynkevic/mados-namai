@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Outfits List</h2>

                    <div class="make-inline">
                        <form action="{{route('outfit.index')}}" method="get" class="make-inline">
                            <div class="form-group make-inline">
                                <label>Master: </label>
                                <select class="form-control" name="master_id">
                                    <option value="0" disabled @if($filterBy==0) selected @endif>Select master</option>
                                    @foreach ($masters as $master)
                                    <option value="{{$master->id}}" @if($filterBy==$master->id) selected @endif>
                                        {{$master->name}} {{$master->surname}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <label>Sort by type:</label>
                            <div class="form-group form-check make-inline">
                                <input type="radio" name="sort" value="asc" class="form-check-input" id="sortASC" @if($sortBy=='asc' ) checked @endif>
                                <label class="form-check-label" for="sortASC">ASC</label>
                                <div class="form-group form-check make-inline">
                                    <input type="radio" name="sort" value="desc" class="form-check-input" id="sortDESC" @if($sortBy=='desc' ) checked @endif>
                                </div>
                                <label class="form-check-label" for="sortDESC">DESC</label>
                            </div>

                            <button type="submit" class="btn btn-info ">Filter</button>
                        </form>
                        <a href="{{route('outfit.index')}}" class="btn btn-info">Clear filter</a>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($outfits as $outfit)
                        <li class="list-group-item list-line">
                            <div class="list-line__outfits">
                                <div class="list-line__outfits__type">
                                    {{$outfit->type}}
                                </div>
                                <div class="list-line__outfits__master">
                                    {{$outfit->outfitmaster->name}} {{$outfit->outfitmaster->surname}}
                                </div>
                            </div>
                            <div class="list-line__buttons">
                                <a href="{{route('outfit.show',[$outfit])}}" class="btn btn-info">SHOW</a>
                                <a href="{{route('outfit.edit',[$outfit])}}" class="btn btn-info">EDIT</a>
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
