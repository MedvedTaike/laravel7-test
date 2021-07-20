@extends('mainLayout')

@section('title', 'Создание тега')

@section('content')
<div class="container">
    <h1 class="my-md-5 my-4">Добавить тег</h1>
    <div class="row flex-column">
        @include('parts.errors')
        <div class="col-lg-5 col-md-8">
        {{ Form::open(['route' => 'tags.store']) }}
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" placeholder="Напишите название" id="floatingName" name="name">
                    <label for="floatingName">Название</label>
                    <div class="invalid-feedback">
                        Пожалуйста, заполните поле
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Добавить</button>
        {{ Form::close()}}
        </div>
    </div>
</div>
@endsection