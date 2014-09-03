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
    <link href='http://fonts.googleapis.com/css?family=Rokkitt' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="<?php echo \helpers\url::get_template_path();?>css/sticky-footer.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <script>
        cheet('↑ ↑ ↓ ↓ ← → ← → b a', function () {
           $(".container").hide('slow');
           $("#easter").show('slow');
        });
    </script>
</head>
<body>
    <div id="easter" style="display: none; width: 100%; height: 1100px; background-repeat: repeat; background:url('<?php echo \helpers\url::get_template_path();?>images/pika.gif')"></div>
    <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="navbar navbar-default">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="<?php echo DIR  ?>">exQuizIt</a>
                        </div>
                        <div class="navbar-collapse collapse navbar-responsive-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a>Hallo, <?php echo $data['username'] ?></a></li>
                                <li><a href="admin/logout"><span class="label label-danger "><span class="glyphicon glyphicon-log-out"></span></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>



