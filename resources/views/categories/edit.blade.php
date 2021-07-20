@extends('mainLayout')

@section('title', 'Редактирование категории')

@section('content')
<div class="container">
    <h1 class="my-md-5 my-4">Редактировать категорию</h1>
    <div class="row flex-column">
        @include('parts.errors')
        <div class="col-lg-5 col-md-8">
        {{ Form::open(['route' => ['categories.update', $category->id], 'method' => 'put']) }}
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" value="{{ $category->name }}" id="floatingName" name="name">
                    <label for="floatingName">Название категории</label>
                </div>
                <button class="btn btn-primary" type="submit">Редактировать</button>
            {{ Form::close()}}
        </div>
    </div>
</div>
@endsection