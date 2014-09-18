<div class="row">
    <div class="col-lg-3">
        <div class="panel panel-default">
            <div class="panel-heading"><h4>Zeit</h4></div>
            <div class="panel-body">
                <h5><span class="label label-primary">Start: <?php echo $data['startTime'] ?></span></h5>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading"><h4>Punkte</h4></div>
            <div class="panel-body">
                <h5><span class="label label-primary">0</span></h5>
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
                        <button id="answer'.$answer->antwortID.'" value="'.$answer->antwortID.'" class="answer btn btn-lg btn-block btn-primary">'.$answer->text.'</button>
                      </div>';
                $i++;
                if($i==2)
                {
                    echo '</div><div style="margin-top: 10px" class="row">';
                }
            }
        ?>
        </div>
        <div style="margin-top: 23px" class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <button id="fiftyfifty" value="<?php echo$data['question']->frageID; ?>" class="btn btn-warning">50/50</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div id="gameButtons" class="col-lg-12 text-center">
                <button class="btn btn-lg btn-success">Quiz beenden</button>
                <button class="btn btn-lg btn-danger">Quiz abbrechen</button>
            </div>
            <div style="display: none" id="nextRoundButton" class="col-lg-12 text-center">
                <button onClick="location.reload();" class="btn btn-lg btn-primary">Nächste Frage</button>
            </div>

        </div>
    </div>
    <div class="col-lg-3">
        <div class="panel panel-default">
            <div class="panel-heading"><h4>Kategorien</h4></div>
            <div class="panel-body">
                <ul>
                    <?php
                    for ($i = 0; $i < count($data['categories']); ++$i)
                    {
                        foreach($data['categories'][$i]  as $category)
                        {
                           echo '<li>'. $category->bezeichnung . '</li>';
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>