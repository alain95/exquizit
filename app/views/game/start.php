<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <h3>Neues Quiz</h3>
                <h4>Bitte wähle die gewünschten Fragekategorien, danach gehts gleich los!</h4><br>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading"><h4><span class="label label-primary pull-right"><span class="glyphicons list"></span></span>Alle Kategorien</h4></div>
            <div class="panel-body">
                <div class="row">
                    <?php
                    if($data['categories']){
                        foreach($data['categories'] as $row){
                            echo '<div id="rowCategory'.$row->kategorieID.'" class="col-md-12" >
                                     <button id="categoryButton'.$row->kategorieID.'"  value="'.$row->kategorieID.'" style="width:100%; height: 80px; margin-top:5px; margin-bottom: 5px;" class="categoryButton btn btn-default">
                                       <div class="row">
                                          <div class="col-md-12">
                                            <i style="font-size:150%;" class="'.$row->icon.'"></i>
                                          </div>
                                       </div>
                                        <div class="row" style="margin-top: 10px">
                                          <div class="col-md-12">
                                            <span>'.$row->bezeichnung.'</span>
                                          </div>
                                       </div>
                                    </button>
                                  </div>';
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading"><h4><span class="label label-primary pull-right"><span class="glyphicons list"></span></span>Quiz Kategorien</h4></div>
            <div id="myCategoryTable" class="panel-body">
                <div id="errorNoCategory" style="display: none" class="alert alert-dismissable alert-danger">
                    <strong>Fehler!</strong><br>Mindestens eine Kategorie muss ausgewählt sein.
                </div>
                <div class="row">
                    <?php
                    if($data['categories']){
                        foreach($data['categories'] as $row){
                            echo '<div style="display:none" id="rowGameCategory'.$row->kategorieID.'" class="col-md-12" >
                                     <button id="removeCategoryButton'.$row->kategorieID.'"  value="'.$row->kategorieID.'" style="width:100%; height: 80px; margin-top:5px; margin-bottom: 5px;" class="removeCategoryButton btn btn-primary">
                                       <div class="row">
                                          <div class="col-md-12">
                                            <i style="font-size:150%;" class="'.$row->icon.'"></i>
                                          </div>
                                       </div>
                                        <div class="row" style="margin-top: 10px">
                                          <div class="col-md-12">
                                            <span>'.$row->bezeichnung.'</span>
                                          </div>
                                       </div>
                                    </button>
                                  </div>';
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading"><h4><span class="label label-warning pull-right"><span class="glyphicons crown"></span></span>Highscoreliste</h4></div>
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
        <div class="col-md-4 col-md-offset-4 text-center">
            <form id="startGameForm">
            <?php
                if($data['categories'])
                {
                    foreach($data['categories'] as $row)
                    {
                        echo '<input type="hidden" id="categoryField'.$row->kategorieID.'"/>';
                    }
                }
            ?>
                <button id="startGameBtn" class="btn btn-info btn-lg">Quiz starten</button>
            </form>
        </div>
    </div>
</div>
