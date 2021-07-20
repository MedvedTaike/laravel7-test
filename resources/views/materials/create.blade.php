@extends('mainLayout')

@section('title', 'Создание материала')

@section('content')
<div class="container">
    <h1 class="my-md-5 my-4">Добавить материал</h1>
    <div class="row flex-column">
    @include('parts.errors')
        <div class="col-lg-5 col-md-8">
            {{ Form::open(['route' => 'materials.store']) }}
                <div class="form-floating mb-3">
                    {{Form::select('id_type', 
                        $types, 
                        null, 
                        ['class' => 'form-select', 'placeholder' => 'Выберите тип', 'id' => "floatingSelectType"])
                      }}
                    <label for="floatingSelectType">Тип</label>
                    <div class="invalid-feedback">
                        Пожалуйста, выберите значение
                    </div>
                </div>
                <div class="form-floating mb-3">
                    {{Form::select('id_category', 
                        $categories, 
                        null, 
                        ['class' => 'form-select', 'placeholder' => 'Выберите категорию', 'id' => "floatingSelectCategory"])
                      }}
                    <label for="floatingSelectCategory">Категория</label>
                    <div class="invalid-feedback">
                        Пожалуйста, выберите значение
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" placeholder="Напишите название" id="floatingName" name="name" value="{{ old('name') }}">
                    <label for="floatingName">Название</label>
                    <div class="invalid-feedback">
                        Пожалуйста, заполните поле
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" placeholder="Напишите авторов" id="floatingAuthor" name="authors" value="{{ old('authors') }}">
                    <label for="floatingAuthor">Авторы</label>
                    <div class="invalid-feedback">
                        Пожалуйста, заполните поле
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Напишите краткое описание" id="floatingDescription" name="description" value="{{ old('description') }}"
                        style="height: 100px"></textarea>
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