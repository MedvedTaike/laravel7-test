@extends('mainLayout')

@section('title', 'Редактирование тега')

@section('content')
<div class="container">
    <h1 class="my-md-5 my-4">Редактировать тега</h1>
    <div class="row flex-column">
        @include('parts.errors')
        <div class="col-lg-5 col-md-8">
        {{ Form::open(['route' => ['tags.update', $tag->id], 'method' => 'put']) }}
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" value="{{ $tag->name }}" id="floatingName" name="name">
                    <label for="floatingName">Название тега</label>
                </div>
                <button class="btn btn-primary" type="submit">Редактировать</button>
            {{ Form::close()}}
        </div>
    </div>
</div>
@endsection