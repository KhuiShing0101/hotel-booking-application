<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="icon" href="<?= URL::asset("assets/images/logo.jpg") ?>" type="image/ico" />

    <title>@yield("title")</title>

    <!-- Bootstrap -->
    <link href="{{ URL::asset("assets/bootstrap/dist/css/bootstrap.min.css") }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ URL::asset("assets/font-awesome/css/font-awesome.min.css") }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ URL::asset("assets/iCheck/skins/flat/green.css") }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{ URL::asset("assets/css/custom.min.css") }}" rel="stylesheet">
    <!-- Default CSS -->
    <link href="{{ URL::asset("assets/css/style.css") }}" rel="stylesheet">
    <!-- PNotify -->
    <link href="{{ URL::asset("assets/pnotify/dist/pnotify.css") }}" rel="stylesheet">
    <link href="{{ URL::asset("assets/pnotify/dist/pnotify.buttons.css") }}" rel="stylesheet">
    <link href="{{ URL::asset("assets/pnotify/dist/pnotify.nonblock.css") }}" rel="stylesheet">

    <!-- JavaScript -->
    <!-- jQuery -->
    <script src="{{ URL::asset("assets/jquery/dist/jquery.min.js") }}"></script>
    <!-- Bootstrap -->
    <script src="{{ URL::asset("assets/bootstrap/dist/js/bootstrap.bundle.min.js") }}"></script>
    <!-- PNotify -->
    <script src="{{ URL::asset("assets/pnotify/dist/pnotify.js") }}"></script>
    <script src="{{ URL::asset("assets/pnotify/dist/pnotify.buttons.js") }}"></script>
    <script src="{{ URL::asset("assets/pnotify/dist/pnotify.nonblock.js") }}"></script>
    <!-- iCheck -->
    <script src="{{ URL::asset("assets/iCheck/icheck.min.js") }}"></script>
    <!-- validator -->
    <script src="{{ URL::asset("assets/validator/multifield.js") }}"></script>
    <script src="{{ URL::asset("assets/validator/validator.js") }}"></script>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
