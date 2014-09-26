<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading"><h4>Adminpanel</h4></div>
            <div class="panel-body">
                <?php
                    if(isset($_GET['error']))
                    echo '<div class="alert alert-dismissable alert-danger">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>Fehler!</strong><br>Benutzername oder Passwort nicht korrekt oder Zugriff vergweiget.
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
                </form>
            </div>
        </div>
    </div>
</div>
