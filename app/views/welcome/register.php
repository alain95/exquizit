<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"><h4>Registrieren</h4></div>
            <div class="panel-body">
                <?php
                if(isset($_GET['error']))
                    switch($_GET['error'])
                    {
                        case 'pdnm':
                            echo '
                                <div class="alert alert-dismissable alert-danger">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>Fehler!</strong><br>Passwörter stimmen nicht überein.
                                </div>';
                        case 'unna':
                            echo '
                                <div class="alert alert-dismissable alert-danger">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>Fehler!</strong><br>Username nicht verfügbar.
                                </div>';
                        case 'db':
                            echo '
                                <div class="alert alert-dismissable alert-danger">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>Fehler!</strong><br>Es ist ein Fehler beim Schreiben in die Datenbank aufgetreten bitte nochmals versuchen.
                                </div>';



                    }

                ?>
                <form id="registerForm" class="form-horizontal" role="form" method="post" action="">
                    <div class="form-group">
                        <label style="text-align: left" for="inputEmail3" class="col-sm-3 control-label">Benutzername</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-addon"><span class=" -user"></span></div>
                                <input class="form-control" name="username" type="text" placeholder="Benutzername eingeben" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="text-align: left" for="inputEmail3" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-addon"><span class=" -envelope"></span></div>
                                <input class="form-control" name="email" type="email" placeholder="E-Mail eingeben" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" style="text-align: left" class="col-sm-3 control-label">Passwort</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-addon"><span class=" -lock"></span></div>
                                <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Passwort eingeben" required>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" style="text-align: left" class="col-sm-3 control-label">Passwort bestätigen</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-addon"><span class=" -lock"></span></div>
                                <input type="password" name="password_confirm" class="form-control" id="inputPassword3" placeholder="Passwort bestätigen" required>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" class="btn btn-default btn-success">Registrieren</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
