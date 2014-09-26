<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $data['title'].' - '.SITETITLE; //SITETITLE defined in index.php?></title>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="<?php echo \helpers\url::get_template_path();?>css/bootstrap.css" rel="stylesheet">
    <script src="<?php echo \helpers\url::get_template_path();?>js/bootstrap.min.js"></script>
    <script src="<?php echo \helpers\url::get_template_path();?>js/edit.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,700,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="<?php echo \helpers\url::get_template_path();?>css/sticky-footer.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo \helpers\url::get_template_path();?>css/glyphicons.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo \helpers\url::get_template_path();?>css/font-awesome.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
</head>
<body>
    <div id="wrap">
    <div class="container" style="padding-bottom: 60px">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar navbar-default">
                        <div class="container">
                            <div class="navbar-header">
                                <a href="<?php echo DIR ?>admin/main" class="navbar-brand">Adminpanel</a>
                                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="navbar-collapse collapse" id="navbar-main">
                                <ul class="nav navbar-nav">
                                    <li><a href="<?php echo DIR ?>admin/categories">Kategorien</a></li>
                                    <li><a href="<?php echo DIR ?>admin/questions">Fragen</a></li>
                                </ul>
                                <ul class="nav navbar-nav navbar-right" style="margin-right:0">
                                    <li><a href="/logout"><span class="label label-danger "><span class="glyphicons log_out"></span> Logout</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
