<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-type" value="text/html; charset=UTF-8" />
    <title><?php echo $data['title'].' - '.SITETITLE; //SITETITLE defined in index.php?></title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link href="<?php echo \helpers\url::get_template_path();?>css/bootstrap.css" rel="stylesheet">
    <script src="<?php echo \helpers\url::get_template_path();?>js/bootstrap.min.js"></script>
    <script src="<?php echo \helpers\url::get_template_path();?>js/edit.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,700,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="<?php echo \helpers\url::get_template_path();?>css/sticky-footer.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="navbar navbar-default">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?php echo DIR ?>admin/main"><span class="glyphicon glyphicon-wrench" /></span> Adminpanel</a>
                    </div>
                    <div class="navbar-collapse collapse navbar-responsive-collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="<?php echo DIR ?>">Home</a></li>
                            <li><a href="<?php echo DIR ?>admin/categories">Kategorien</a></li>
                            <li><a href="<?php echo DIR ?>admin/questions">Fragen</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
