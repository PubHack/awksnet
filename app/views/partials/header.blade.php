<!DOCTYPE html>
<html lang="en">
    <head>
        <!--
             _____     ____
            /      \  |  o |
           |        |/ ___\|
           |_________/
           |_|_| |_|_|

        -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>awksnet</title>

        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/styles/main.css" charset="utf-8">
        <link href='http://fonts.googleapis.com/css?family=Hind:400,300,500,600,700' rel='stylesheet' type='text/css'>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="page">
        <div class="page__header">
            <h1><a href="/">awksnet</a> <small>Where awkwardness is celebrated.</small></h1>
            <ul class="nav">
                <li class="nav__item"><a class="nav__link" href="/map">Map of awkward</a></li>
                @if(!isset($user))
                <li class="nav__item"><a class="nav__link" href="/login">Login</a></li>
                <li class="nav__item"><a class="nav__link" href="/signup">Signup</a></li>
                @else
                <li class="nav__item"><a class="nav__link" href="/logout">Logout</a></li>
                @endif
            </ul>
        </div>
        <div class="page__content">
