<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <h2>exQuizit - Neues Quiz</h2>
                <h4>Bitte wähle die gewünschten Fragekategorien, danach gehts gleich los!</h4><br>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
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
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading"><h4><span class="label label-primary pull-right"><span class="glyphicon glyphicon-list"></span></span>Quiz Kategorien</h4></div>
            <div class="panel-body">
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
</div>
<div class="row">
    <div class="col-lg-4 col-lg-offset-4 text-center">
        <form id="startGameForm" method="post" action="quiz/start">
            <button id="startGame" class="btn btn-success btn-lg">Quiz starten</button>
        </form>
    </div>
</div>