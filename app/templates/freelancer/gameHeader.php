<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $data['title'].' - '.SITETITLE; //SITETITLE defined in index.php?></title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<link href="<?php echo \helpers\url::get_template_path();?>css/bootstrap.css" rel="stylesheet">
    <script src="<?php echo \helpers\url::get_template_path();?>js/bootstrap.min.js"></script>
    <script src="<?php echo \helpers\url::get_template_path();?>js/game.js"></script>
    <script src="<?php echo \helpers\url::get_template_path();?>js/cheet.js"></script>
    <script src="<?php echo \helpers\url::get_template_path();?>js/chart.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Rokkitt' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="<?php echo \helpers\url::get_template_path();?>css/sticky-footer.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <script>
        cheet('↑ ↑ ↓ ↓ ← → ← → b a', function () {
           $(".container").hide('slow');
           $("#easter").show('slow');
        });

        var pieData = [
            {
                value: <?php echo ($data['question']->beantwortet - $data['question']->richtigBeantwortet) ?>,
                color:"#18bc9c",
                highlight: "#128f76",
                label: "Falsch"
            },
            {
                value: <?php echo $data['question']->richtigBeantwortet ?>,
                color: "#e74c3c",
                highlight: "#d62c1a",
                label: "Richtig"
            }

        ];

        window.onload = function() {
            var ctx = document.getElementById("questionChart").getContext("2d");
            window.myPie = new Chart(ctx).Pie(pieData);
        }
    </script>
</head>
<body>
    <div id="easter" style="display: none; width: 100%; height: 1100px; background-repeat: repeat; background:url('<?php echo \helpers\url::get_template_path();?>images/pika.gif')"></div>
    <div id="mainContainer" class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="navbar navbar-default">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="<?php echo DIR  ?>">exQuizIt</a>
                        </div>
                        <div class="navbar-collapse collapse navbar-responsive-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li style="line-height: 64px"><span style="color: #ffffff">Hallo, <?php echo $data['username'] ?></span></li>
                                <li><a href="/profil?id=<?php echo $data['userID'] ?>"><span class="label label-info "><span class="glyphicon glyphicon-user"></span></span></a></li>
                                <li><a href="/logout"><span class="label label-danger "><span class="glyphicon glyphicon-log-out"></span></span></a></li>
                            </ul>
                    </div>
                    </div>
                </div>
            </div>



