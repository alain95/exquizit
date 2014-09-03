<?php
/**
 * Created by PhpStorm.
 * User: alain.buetler
 * Date: 09.07.14
 * Time: 20:48
 */

?>
<div class="row" id="editQuestion" style="display: none">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading"><h4><span class="label label-warning pull-right"><span class="glyphicon glyphicon-pencil"></span></span>Frage bearbeiten</h4></div>
            <div class="panel-body">
                <form role="form" method="post" action="" id="updateQuestionForm" class="form-horizontal">
                    <input type="hidden" id="frageID" name="frageID" value=""/>
                    <div class="form-group">
                        <label for="inputQuestion" class="col-sm-3 control-label">Text</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" rows="3"  id="inputQuestion" name="text" placeholder="Frage"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kategorieID" class="col-sm-3 control-label">Kategorie</label>
                        <div class="col-sm-4">
                            <select id="cbCategory" name="kategorieID" class="form-control">
                                <?php
                                if($data['categories']){
                                    foreach($data['categories'] as $row){
                                        echo('<option value="'.$row->kategorieID.'">'.$row->bezeichnung.'</option>');
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputCorrectAnswer" class="col-sm-3 control-label">Richtige Antwort</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="inputCorrectAnswer" name="correctAnswer" placeholder="Richtige Antwort">
                            <input type="hidden" name="correctAnswerID" id="inputCorrectAnswerID" value="" />
                        </div>
                        <label for="inputWrongAnswer1" class="col-sm-3 control-label">Falsche Antwort 1</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="inputWrongAnswer1" name="wrongAnswer1" placeholder="Falsche Antwort">
                            <input type="hidden" name="wrongAnswer1ID" id="inputWrongAnswer1ID" value="" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputWrongAnswer2" class="col-sm-3 control-label">Falsche Antwort 2</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="inputWrongAnswer2" name="wrongAnswer2" placeholder="Falsche Antwort">
                            <input type="hidden" name="wrongAnswer2ID" id="inputWrongAnswer2ID" value="" />
                        </div>
                        <label for="inputWrongAnswer3" class="col-sm-3 control-label">Falsche Antwort 3</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="inputWrongAnswer3" name="wrongAnswer3" placeholder="Falsche Antwort">
                            <input type="hidden" name="wrongAnswer3ID" id="inputWrongAnswer3ID" value="" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-10">
                            <button type="submit" class="submitEditQuestion btn btn-sm btn-warning">Speichern</button>
                            <button class="cancelEditQuestion btn btn-sm btn-danger">Abbrechen</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row" id="addQuestion">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading"><h4><span class="label label-primary pull-right"><span class="glyphicon glyphicon-plus"></span></span>Frage hinzufügen</h4></div>
            <div class="panel-body">
                <form role="form" method="post" action="" class="form-horizontal">
                    <div class="form-group">
                        <label for="inputQuestion" class="col-sm-3 control-label">Text</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" rows="3"  id="inputQuestion" name="text" placeholder="Frage" required></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Kategorie</label>
                        <div class="col-sm-4">
                            <select name="kategorieID" class="form-control" required="">
                                <?php
                                if($data['categories']){
                                    foreach($data['categories'] as $row){
                                        echo('<option value="'.$row->kategorieID.'">'.$row->bezeichnung.'</option>');
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputCorrectAnswer" class="col-sm-3 control-label">Richtige Antwort</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="inputCorrectAnswer" name="correctAnswer" placeholder="Richtige Antwort" required>
                        </div>
                        <label for="inputWrongAnswer1" class="col-sm-3 control-label">Falsche Antwort 1</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="inputWrongAnswer1" name="wrongAnswer1" placeholder="Falsche Antwort" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputWrongAnswer2" class="col-sm-3 control-label">Falsche Antwort 2</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="inputWrongAnswer2" name="wrongAnswer2" placeholder="Falsche Antwort" required>
                        </div>
                        <label for="inputWrongAnswer3" class="col-sm-3 control-label">Falsche Antwort 3</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="inputWrongAnswer3" name="wrongAnswer3" placeholder="Falsche Antwort" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-10">
                            <button type="submit" name="submitNew" value="submit" class="btn btn-sm btn-success">Hinzufügen</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading"><h4><span class="label label-primary pull-right"><span class="glyphicon glyphicon-list"></span></span>Fragen</h4></div>
            <div class="panel-body">
                <?php
                if(isset($data['msg']))
                {
                    echo '<div class="alert alert-success alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>'.$data['msg'].'</div>';
                }
                elseif(isset($data['error']))
                {
                    echo '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>'.$data['error'].'</div>';
                }
                if(isset($data['msgDel']))
                {
                    echo '<div class="alert alert-warning alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>'.$data['msgDel'].'</div>';
                }
                ?>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Text</th>
                        <th>Kategorie</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if($data['questions']){
                        foreach($data['questions'] as $row){
                            echo '<tr>
                                    <td>'.$row->frageID.'</td>
                                    <td id="text'.$row->frageID.'">'.$row->text.'</td>
                                    <td id="categoryQuestion'.$row->frageID.'" data-id="'.$row->kategorieID.'">'.$row->bezeichnung.'</td>
                                    <td style="text-align:center">
                                        <button id="showAnswers'.$row->frageID.'" value="'.$row->frageID.'" class="showAnswersButton btn btn-primary btn-xs">
                                            <span class="glyphicon glyphicon-zoom-in"></span>
                                        </button>
                                    </td>
                                     <td style="text-align:center">
                                        <button id="edit" name="edit" value="'.$row->frageID.'" class="editQuestionButton btn btn-warning btn-xs">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </button>
                                    </td>
                                    <td style="text-align:center">
                                            <button name="delete" value="'.$row->frageID.'" class="deleteQuestionButton btn btn-danger btn-xs">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </button>
                                    </td>
                                  </tr>
                                  <tr style="display:none;" class="alert-danger" id="confirmDeleteQuestion'.$row->frageID.'">
                                  <td colspan="2"></td>
                                  <td><span style="color:#fff">Wirklich löschen?</span></td>
                                  <td></td>
                                  <td style="text-align:center"> <button id="edit" name="edit" value="'.$row->frageID.'" class="confirmDeleteQuestionButton btn btn-success btn-xs">
                                            <span class="glyphicon glyphicon-ok"></span>
                                        </button></td>
                                  <td style="text-align:center"> <button id="edit" name="edit" value="'.$row->frageID.'" class="cancelDeleteQuestionButton btn btn-danger btn-xs">
                                            <span class="glyphicon glyphicon-remove"></span>
                                        </button></td>
                                  </tr>
                                  <tr style="display:none" id="answersQuestion'.$row->frageID.'">
                                    <td colspan="6">
                                        <table class="table table-bordered">
                                            <tr><td colspan="6"><b>Antworten</b></td></tr>
                                            <tr><td>#</td><td>Text</td><td colspan="4">Korrekt</td><tr>';
                          $i = 1;

                          foreach($data['answers'] as $answer)
                          {
                              if($i > 4){$i = 1;}

                              if($answer->frageID == $row->frageID)
                              {
                                  if($answer->korrekt == 1)
                                  {
                                      $glyphiconClass = 'glyphicon-ok';
                                      $labelClass = 'label-success';
                                  }
                                  else
                                  {
                                      $glyphiconClass = 'glyphicon-remove';
                                      $labelClass = 'label-danger';
                                  }
                                  echo(
                                     ' <tr>
                                    <td>'.$answer->antwortID.'</td>
                                    <td id="answer'.$i.'question'.$answer->frageID.'" data-id="'.$answer->antwortID.'">'.$answer->text.'</td>
                                    <td><span class="label '.$labelClass.'"><span class="glyphicon '.$glyphiconClass.'"></span></span></td>
                                    </tr>'
                                  );
                              }

                              $i++;
                          }
                            echo '</table></td></tr>';
                        }
                    }
                    ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


