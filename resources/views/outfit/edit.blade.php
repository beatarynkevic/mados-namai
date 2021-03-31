@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit outfit</div>
                <div class="card-body">
                    <form method="POST" action="{{route('outfit.update', [$outfit])}}">

                        <div class="form-group">
                            <label>Type</label>
                            <input type="text" class="form-control" name="outfit_type" value="{{$outfit->type}}">
                            <small class="form-text text-muted">Please enter type</small>
                        </div>
                        <div class="form-group">
                            <label>Color</label>
                            <input type="text" class="form-control" name="outfit_color" value="{{$outfit->color}}">
                            <small class="form-text text-muted">Please enter color</small>
                        </div>
                        <div class="form-group">
                            <label>Size</label>
                            <input type="text" class="form-control" name="outfit_size" value="{{$outfit->size}}">
                            <small class="form-text text-muted">Please enter size</small>
                        </div>

                        <div class="form-group">
                            <label>About</label>
                            <textarea id="summernote" name="outfit_about">{{$outfit->about}}</textarea>
                            <small class="form-text text-muted">Parasykite ka nors</small>
                        </div>

                        <div class="form-group">
                            <label>Author: </label>
                            <select name="master_id">
                                @foreach ($masters as $master)
                                <option value="{{$master->id}}" @if($master->id == $outfit->master_id) selected @endif>
                                    {{$master->name}} {{$master->surname}}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Please select masters name</small>
                        </div>
                        @csrf
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        $('#summernote').summernote();
    });

</script>
@endsection
