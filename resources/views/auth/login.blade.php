<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ env('PROJECT_NAME') }} - Авторизация</title>
    <link rel="stylesheet" href="/dist/css/app.css">
    <script src="/dist/js/app.js"></script>
</head>
<body>
    
    <div id="app" class="app">
        
        <div class="app-content">
            <div class="app-content-body">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-sm-5">
                            <h4 class="text-center mb-4">
                                <div class="app-nav-logo app-nav-logo--dark">
                                    GP <span class="text-muted">{{ env('PROJECT_NAME') }}</span>
                                </div>
                            </h4>

                            <div class="card">
                                <div class="card-header">Авторизация</div>

                                <div class="card-body">
                                    <form method="POST" action="{{ route('login') }}">
                                         @csrf
                                        <div class="row mb-3">
                                            <label for="nickname" class="col-md-4 col-form-label text-md-end">Имя пользователя</label>

                                            <div class="col-md-6">
                                                <input id="nickname" type="text" class="form-control" name="nickname" value="" required autofocus>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="password" class="col-md-4 col-form-label text-md-end">Пароль</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                                            </div>
                                        </div>
                                        @if ($errors->has('inactive'))
                                        <div class="col-md-8 offset-md-4">
                                        <p class="text-primary" role="alert">
                                <strong>{{ $errors->first('inactive') }}</strong>
                            </p></div>@elseif ($errors->has('nickname'))
                            <div class="col-md-8 offset-md-4">
                            <p class="text-primary" role="alert">
                                <strong>{{ $errors->first('nickname') }}</strong>
                            </p>
</div>
                        @endif
                                        <div class="row mb-0">
                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Войти
                                                </button>
                                            </div>
                                            <br>
                                            <div class="col-md-8 offset-md-4">
                                            <a href="/register" class="text-primary"><strong>Регистрация</strong></a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
            
                        </div>
                    </div>
                </div>
            
            </div>
        </div>

    </div>
</body>
</html>