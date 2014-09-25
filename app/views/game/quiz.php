<div class="row">
    <div class="col-lg-3">
        <div class="panel panel-default">
            <div class="panel-heading"><h4>Punkte</h4></div>
            <div class="panel-body">
                <h4><span class="label label-primary"><?php echo isset($data['points']) ? $data['points'] : 0 ?></span></h4>
            </div>
        </div>
    </div>
    <div class="col-lg-6 ">
        <div class="panel panel-default">
             <div class="panel-body">
                    <h4><?php echo $data['question']->text; ?></h4>
            </div>
        </div>
        <div class="row" style="margin-top: 10px">
        <?php
            $i = 0;
            foreach($data['answers'] as $answer)
            {
                echo '<div class="col-lg-6" style="margin-top:10px">
                        <button style="white-space: normal;" id="answer'.$answer->antwortID.'" value="'.$answer->antwortID.'" class="answer btn btn-lg btn-block btn-primary">'.$answer->text.'</button>
                      </div>';
                $i++;
                if($i==2)
                {
                    echo '</div><div style="margin-top: 10px" class="row">';
                }
            }
        ?>
        </div>
        <div style="margin-top: 23px" class="row" id="jokerButtons">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <button style="width: 80px;" title="Fifty Fifty Joker" id="fiftyfiftyJoker" value="<?php echo$data['question']->frageID; ?>" class="btn btn-warning" <?php echo $data['fiftyfifty']; ?>>50/50</button>
                        <button style="width: 80px;" title="Überspringen Joker" id="skipQuestionJoker" value="<?php echo$data['question']->frageID; ?>" class="btn btn-warning" <?php echo $data['skip']; ?>><span class="glyphicon glyphicon-share-alt"></span></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div id="gameButtons" class="col-lg-12 text-center">
                <button id="finishGameBtn" value="<?php echo $data['spielID']; ?>" class="btn btn-lg btn-success">Quiz beenden</button>
            </div>
            <div style="display: none; margin-top:23px" id="nextRoundButton" class="col-lg-12 text-center">
                <button onClick="location.reload();" class="btn btn-lg btn-primary">Nächste Frage</button>
            </div>
            <div style="display: none; margin-top:23px" id="lostGame" class="col-lg-12 text-center">
               <div class="alert alert-danger">Das war leider falsch! Spiel verloren</div>
                <button onclick="location.href='/quiz'" class="btn btn-lg btn-primary">Neues Spiel</button>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="panel panel-default">
            <div class="panel-heading"><h4>Frage-Statistik</h4></div>
            <div class="panel-body text-center">
                <?php if($data['question']->beantwortet == 0)
                {
                    echo "<p>Frage noch nie beantwortet! Keine Statistik vorhanden.</p>";
                }
                ?>
                <canvas id="questionChart" width="150" height="150"></canvas>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading"><h4>Kategorien</h4></div>
            <div class="panel-body">
                <ul>
                    <?php
                    for ($i = 0; $i < count($data['categories']); ++$i)
                    {
                        foreach($data['categories'][$i]  as $category)
                        {
                            if($data['question']->kategorieID == $category->kategorieID)
                            {
                                echo '<li><b>'. $category->bezeichnung . '</b></li>';
                            }
                            else
                            {
                                echo '<li>'. $category->bezeichnung . '</li>';
                            }

                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>

