<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <main role="main" class="inner cover">
                <h1 class="cover-heading">Авторизация</h1>
                <div class="panel-body">
                    <div class="error"></div>
                    <form class="form-horizontal" method="POST" id="login-form" >
                        <div class="form-group col-md-9">
                            <label for="email" class="control-label">Ваш E-Mail</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                        </div>
                        <div class="form-group col-md-9">
                            <label for="password" class="control-label">Пароль</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 row">
                                <button type="submit" class="clckbtn btn nav-link col-md-4" >
                                        Войти
                                </button>
                                <a rel="nofollow" class="nav nav-link col-md-8" id="forgot" href="" style="color:#fafafa">
                                    <span>Забыли пароль?</span>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
</div>
