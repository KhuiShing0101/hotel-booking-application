<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Login Dashboard</title>

    <!-- Bootstrap -->
    <link href="{{ URL::asset('assets/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ URL::asset('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{ URL::asset('assets/vendors/animate.css/animate.min.css') }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{ URL::asset('assets/css/custom.min.css') }}" rel="stylesheet">
    <!-- PNotify -->
    <link href="{{ URL::asset('assets/pnotify/dist/pnotify.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/pnotify/dist/pnotify.buttons.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/pnotify/dist/pnotify.nonblock.css') }}" rel="stylesheet">

    <!-- JavaScript -->
    <!-- jQuery -->
    <script src="{{ URL::asset('assets/jquery/dist/jquery.min.js') }}"></script>
    <!-- PNotify -->
    <script src="{{ URL::asset('assets/pnotify/dist/pnotify.js') }}"></script>
    <script src="{{ URL::asset('assets/pnotify/dist/pnotify.buttons.js') }}"></script>
    <script src="{{ URL::asset('assets/pnotify/dist/pnotify.nonblock.js') }}"></script>
  </head>
  <body class="login">
    
    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="{{ route("auth.login") }}" method="POST">
              <h1>Login Form</h1>
              @csrf
              <div>
                <input type="text" class="form-control rounded-0" name="name" value="{{ session('name') ? session('name') : old('name') }}" placeholder="Username"/>
              </div>
              <div>
                <input type="password" class="form-control rounded-0" name="password" placeholder="Password"/>
              </div>
              <div class="my-3 d-flex ml-4 justify-content-start">
                <input type="checkbox" name="remember" value="1" id="remember" class="form-check-input">
                <label for="remember" class="form-check-label">Remember me</label>
              </div>
              <div>
                <button type="submit" name="submit" class="btn btn-secondary rounded-0 px-4 submit" href="index.html">Log in</button>
              </div>

              <div class="separator">
                <div>
                  <p>&copy;Softguide ©2023 All Rights Reserved.</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>

    @if (session()->has('error_message'))
      <script>
          $(document).ready(function () {
              new PNotify({
                  title   : 'Oh No!',
                  text    : '{{ session()->get('error_message') }}',
                  type    : 'error',
                  styling : 'bootstrap3'
              });
          })
      </script>
    @endif

    @if ($errors->has('name') || $errors->has('password'))
      <script>
        let error_name     = '{{ $errors->first('name') }}';
        let error_password = '{{ $errors->first('password') }}';
        let error_message;
        if (error_name == '') {
          error_message = error_password; 
        } else if (error_password == '') {
          error_message = error_name;
        } else {
          error_message = error_name + '<br/>' + error_password;
        }

        $(document).ready(function () {
            new PNotify({
                title   : 'Oh No!',
                text    : error_message,
                type    : 'error',
                styling : 'bootstrap3'
            });
        })
      </script>
    @endif
      
  </body>
</html>