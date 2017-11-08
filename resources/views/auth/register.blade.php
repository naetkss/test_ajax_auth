<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
                <main role="main" class="inner cover">
                    <h1 class="cover-heading">Регистрация</h1>
                    <div class="panel-body">
                        <div class="error"></div>
                        <form class="form-horizontal" method="POST" id="register-form" >
                            <div class="form-group col-md-9">
                                <label for="name" class="control-label">Ваше имя</label>
                                <input id="name" type="text" class="form-control" name="name" value="" required autofocus>
                            </div>
                            <div class="form-group col-md-9">
                                <label for="email" class="control-label">Ваш E-Mail</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                            </div>

                            <div class="form-group col-md-9">
                                <label for="password" class="control-label">Пароль</label>
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                           <div class="form-group col-md-9">
                            <label for="password-confirm" class="control-label">Повторите пароль</label>
                            <input id="password-confirm" type="password" class="form-control" name="password-confirm" required>
                            </div>

                            <div class="form-group col-md-9">
                                <label for="secret_phrase" class="control-label">Секретная фраза</label>
                                <input id="secret_phrase" type="text" class="form-control" name="secret_phrase" required>
                            </div>


                            <div class="form-group">
                                <div class="col-md-9 row">
                                    <button type="submit" class="clckbtn btn nav-link col-md-9" >
                                        Зарегистрироваться
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </main>
        </div>
    </div>
</div>

