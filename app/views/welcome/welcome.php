<div class="row">
    <div class="col-lg-8">
        <div class="panel panel-default" style="min-height: 307px">
            <div class="panel-body" style="text-align: center;">
                <h1 class="logo">exQuizIt</h1>
                <h4>Teste jetzt dein Wissen - einloggen und los gehts!</h4>
            </div>
         </div>
    </div>
    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading"><h4>Login</h4></div>
            <div class="panel-body">
                <?php
                if(isset($_GET['error']))
                    echo '<div class="alert alert-dismissable alert-danger">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>Fehler!</strong><br>Benutzername und Passwort stimmen nicht überein.
                         </div>';
                ?>
                <form id="registerForm" class="form-horizontal" role="form" action="" method="post">
                    <div class="form-group">
                        <label style="text-align: left" for="inputEmail3" class="col-sm-3 control-label">Benutzername</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                                <input class="form-control" name="username" type="text" placeholder="Benutzername eingeben" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" style="text-align: left" class="col-sm-3 control-label">Passwort</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                                <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Passwort eingeben" required>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8" style="padding-left:0">
                            <button type="submit" name="submit" value="submit" class="btn btn-default btn-success">Anmelden</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 control">
                            <div style="border-top: 1px solid#888; padding-top:15px; font-size:90%">
                                Noch kein Konto?
                                <a href="register">
                                    Registrieren
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>









