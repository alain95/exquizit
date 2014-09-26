<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading"><h4>Neueste Fragen <span class="label label-success pull-right">NEU</span></h4></div>
            <div class="panel-body">
                <table class="table table-striped">
                    <?php
                        if($data['latestQuestions'])
                        {
                            foreach($data['latestQuestions'] as $row)
                            {
                                echo '<tr><td>'.$row->text.'</td></tr>';
                            }
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading"><h4>Neuste Kategorien <span class="label label-success pull-right">NEU</span></h4></div>
            <div class="panel-body">
                <table class="table table-striped">
                    <?php
                    if($data['latestCategories'])
                    {
                        foreach($data['latestCategories'] as $row)
                        {
                            echo '<tr><td>'.$row->bezeichnung.'</td></tr>';
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
