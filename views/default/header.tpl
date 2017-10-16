<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>{$pageTitle}</title>
    <!-- Bootstrap -->
    <link href="{$templateWebPath}css/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="{$templateWebPath}css/main.css" />
    <script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>


</head>
<body>
<div class="container">
    <div id="header" class="page-header">
        <img id="icon" src="/images/icon.jpg" width="50" />
        <a href="/index/">
            <h2>Super online store</h2>
        </a>
    </div>

    <div class="row">
        <div class="col-xs-1 col-sm-2 col-lg-4">
            {include file="leftcolumn.tpl"}
        </div>

        <div class="col-xs-11 col-sm-10 col-lg-8">
            <div id="centerColumn">