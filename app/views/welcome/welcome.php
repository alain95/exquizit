<div class="row">
    <div class="col-md-8">
        <div class="panel panel-default" style="min-height: 319px">
            <div class="panel-body" style="text-align: center;">
                <h1 class="logo">exQuizIt</h1>
                <h4>Teste jetzt dein Wissen - einloggen und los gehts!</h4>
            </div>
         </div>
    </div>
    <div class="col-md-4">
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
                        <div class="col-sm-12">
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicons user"></span></div>
                                <input class="form-control" name="username" type="text" placeholder="Benutzername" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicons lock"></span></div>
                                <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Passwort" required>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit" name="submit" value="submit" class="btn btn-default btn-success pull-right">Anmelden</button>
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









