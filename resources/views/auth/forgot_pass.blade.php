<div class="row" id="row1">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <main role="main" class="inner cover">
                <h1 class="cover-heading">Восстановление пароля</h1>
                <div class="panel-body">
                    <div class="error"></div>
                    <form class="form-horizontal" method="POST" id="forgot-pass" >
                        <div class="form-group col-md-9">
                            <label for="email" class="control-label">Ваш E-Mail</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                        </div>
                        <div class="form-group col-md-9">
                            <label for="secret_phrase" class="control-label">Секретная фраза</label>
                            <input id="secret_phrase" type="text" class="form-control" name="secret_phrase" required>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 row">
                                <input type="submit"  value="Восстановить" class="clckbtn btn nav-link col-md-5" >
                                </input>

                            </div>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
</div>

<div class="row" id="row2">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <main role="main" class="inner cover">
                <h1 class="cover-heading">Введите новый пароль</h1>
                <div class="panel-body">
                    <div class="error"></div>
                    <form class="form-horizontal" method="POST" id="new-pass" >
                        <div class="form-group col-md-9">
                            <label for="password" class="control-label">Ваш новый пароль</label>
                            <input id="password" type="password" class="form-control" name="password" value="{{ old('email') }}" required autofocus>
                        </div>
                        <div class="form-group col-md-9">
                            <label for="repassword" class="control-label">Повторите пароль</label>
                            <input id="repassword" type="password" class="form-control" name="repassword" required>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 row">
                                <input type="submit"  value="Изменить" class="clckbtn btn nav-link col-md-5" >
                            </div>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
</div>
