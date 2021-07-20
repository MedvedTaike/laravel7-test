<!doctype html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->

    <link href="{{ asset('styles.css') }}" rel="stylesheet">

    <title>Test | @yield('title')</title>
    <style>
      .delete
      {
        cursor: pointer;
        background: transparent;
        border: none;
        color: #337ab7;
        padding: 0px;
      }
      .form-delete{
          display: inline;
      }
      .edit-modal{
        background: transparent;
        border: none;
        color: #337ab7;
        padding: 0px;
      }
      .errorHandling{
          display: none;
      }
      .success-information{
          display: none;
      }
      .search-alert{
          display: none;
      }
      .search-output{
          display: none;
      }
    </style>
</head>
<body>
<div class="main-wrapper">
    <div class="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">Test</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link {{ str_contains(Route::currentRouteName() , 'materials' ) ? 'active' : '' }}" href="{{ route('materials.index')}}">Материалы</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ str_contains(Route::currentRouteName() , 'tags' ) ? 'active' : '' }}" href="{{ route('tags.index') }}">Теги</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ str_contains(Route::currentRouteName() , 'categories' ) ? 'active' : '' }}" href="{{ route('categories.index') }}">Категории</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>
    <footer class="footer py-4 mt-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col text-muted">Test</div>
            </div>
        </div>
    </footer>
</div>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="{{ asset('js/scripts.js') }}"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
@yield('custom_script')
</body>
</html>