<?php
/**
 * Created by PhpStorm.
 * User: alain.buetler
 * Date: 07.08.14
 * Time: 11:08
 */



$item = array_rand($data['questions']);
$question = $data['questions'][$item];

$answers = array();

foreach($data['answers'] as $answer)
{
    if($question->frageID == $answer->frageID)
    {
        array_push($answers, $answer);
    }

}

shuffle($answers);


?>

<div class="row">
    <div class="col-lg-3">
        <div class="panel panel-default">
            <div class="panel-heading"><h4>Punkte</h4></div>
            <div class="panel-body">
                <h5><span style="fon-size: 120%" class="label label-primary">0</span></h5>
            </div>
        </div>
    </div>
    <div class="col-lg-6 ">
        <div class="panel panel-default">
             <div class="panel-body">
                    <h4><?php echo $question->text; ?></h4>
            </div>
        </div>
        <div class="row" style="margin-top: 10px">
        <?php
            $i = 0;
            foreach($answers as $answer)
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
                        <button id="fiftyfifty" value="<?php echo $question->frageID; ?>" class="btn btn-warning">50/50</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <button class="btn btn-lg btn-success">Quiz beenden</button>
                <button class="btn btn-lg btn-danger">Quiz abbrechen</button>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="panel panel-default">
            <div class="panel-heading"><h4>Kategorien</h4></div>
            <div class="panel-body">
                <ul>
                    <?php
                    for ($i = 0; $i < count($data['categories']); ++$i) {
                        foreach($data['categories'][$i] as $category)
                        {
                            if($question->kategorieID == $category->kategorieID)
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