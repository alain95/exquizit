<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <h3>Neues Quiz</h3>
                <h4>Bitte wähle die gewünschten Fragekategorien, danach gehts gleich los!</h4><br>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading"><h4><span class="label label-primary pull-right"><span class="glyphicon glyphicon-list"></span></span>Alle Kategorien</h4></div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Bezeichnung</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="categoryTable">
                    <?php
                    if($data['categories']){
                        foreach($data['categories'] as $row){
                            echo '<tr id="row'.$row->kategorieID.'">
                                    <td id="katID'.$row->kategorieID.'">'.$row->kategorieID.'</td>
                                    <td id="bez'.$row->kategorieID.'">'.$row->bezeichnung.'</td>
                                    <td>
                                        <button id="add'.$row->kategorieID.'" name="add" value="'.$row->kategorieID.'" class="addCategoryButton btn btn-success btn-xs">
                                            <span class="glyphicon glyphicon-arrow-right"></span>
                                        </button>
                                    </td>
                                </tr>';
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading"><h4><span class="label label-primary pull-right"><span class="glyphicon glyphicon-list"></span></span>Quiz Kategorien</h4></div>
            <div class="panel-body">
                <div id="errorNoCategory" style="display: none" class="alert alert-dismissable alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Fehler!</strong><br>Mindestens eine Kategorie muss ausgewählt sein.
                </div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Bezeichnung</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="myCategoryTable">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading"><h4><span class="label label-warning pull-right"><span class="glyphicon glyphicon-tower"></span></span>Highscoreliste</h4></div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Rang</th>
                        <th>Spieler</th>
                        <th>Gewichtete Punkte</th>
                    </tr>
                    </thead>
                    <tbody id="highscoreTable">
                    <?php
                    if($data['games']){
                        foreach($data['games'] as $row){
                            echo '<tr>
                                    <td>1</td>
                                    <td>Spieler</td>
                                    <td>
                                       '.$row->gewichtetePunkte.'
                                    </td>
                                </tr>';
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<div class="row" style="padding-bottom: 10px">
    <div class="col-lg-4 col-lg-offset-4 text-center">
        <form id="startGameForm">
            <button id="startGameBtn" class="btn btn-primary btn-lg">Quiz starten</button>
        </form>
    </div>
</div>