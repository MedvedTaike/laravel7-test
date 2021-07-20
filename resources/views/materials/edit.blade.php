@extends('mainLayout')

@section('title', 'Редактировать материал')

@section('content')
<div class="container">
    <h1 class="my-md-5 my-4">Редактировать материал</h1>
    <div class="row flex-column">
        @include('parts.errors')
        <div class="col-lg-5 col-md-8">
            {{ Form::open(['route' => ['materials.update', $material->id], 'method' => 'put']) }}
                <div class="form-floating mb-3">
                    {{Form::select('id_type', 
                        $types, 
                        $material->type->id, 
                        ['class' => 'form-select', 'id' => "floatingSelectType"])
                      }}
                    <label for="floatingSelectType">Тип</label>
                    <div class="invalid-feedback">
                        Пожалуйста, выберите значение
                    </div>
                </div>
                <div class="form-floating mb-3">
                    {{Form::select('id_category', 
                        $categories, 
                        $material->category->id, 
                        ['class' => 'form-select', 'id' => "floatingSelectCategory"])
                      }}
                    <label for="floatingSelectCategory">Категория</label>
                    <div class="invalid-feedback">
                        Пожалуйста, выберите значение
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingName" name="name" value="{{ $material->name }}">
                    <label for="floatingName">Название</label>
                    <div class="invalid-feedback">
                        Пожалуйста, заполните поле
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingAuthor" name="authors" value="{{ $material->authors }}">
                    <label for="floatingAuthor">Авторы</label>
                    <div class="invalid-feedback">
                        Пожалуйста, заполните поле
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" id="floatingDescription" name="description"
                        style="height: 100px">{{ $material->description }}</textarea>
                    <label for="floatingDescription">Описание</label>
                    <div class="invalid-feedback">
                        Пожалуйста, заполните поле
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Добавить</button>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection