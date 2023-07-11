<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/libs/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
    html,
    body {
        height: 100%;
    }

    .content-centered {
        display: flex;
        justify-content: center;
        align-items: center;
        /* height: 100vh; */
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }

    .button {
      background-color: #d6a92b; /* Green */
      border: none;
      color: white;
      padding: 16px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      transition-duration: 0.4s;
      cursor: pointer;
    }

    .button1 {
      background-color: white; 
      color: black; 
      border: 2px solid #d6a92b;
    }

    .button1:hover {
      background-color: #d6a92b;
      color: white;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="container content-centered">
        <div class="row">
            <div class="col-md-7">
                <div class="logo-container">
                    <img src="logo.jpg" alt="Logo" height="357" width="500">
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header text-center">LOGIN HERE</div>
                    <div class="card-body">
                        <form method="post" name="login_sform">
                            <div class="form-group">
                                <input class="form-control form-control-lg" id="username" alt="username" type="text" placeholder="Username" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <input class="form-control form-control-lg" id="password" type="password" alt="password" placeholder="Password" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="remember" onclick="myFunction()"><span class="custom-control-label">Show Password</span>
                                </label>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-lg btn-block button1" value="Sign in" id="btn-admin" name="btn-admin">Sign in</button>
                                <button class="btn btn-lg btn-block button1" value="Sign in" id="btn-admin" name="btn-admin" onclick="window.location.href = '/DTR_Management_system/dtr_panel/dtr_dashboard/Xam/index.php'">STUDENT LOGIN</button>
                            </div>
                            <div class="form-group" id="alert-msg">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->

    <script src="./assets/js/jquery.min.js"></script>
    <script src="./assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="./assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script type="text/javascript">
      document.oncontextmenu = document.body.oncontextmenu = function() {return false;}//disable right click
    </script>
     <script type="text/javascript">
            jQuery(function(){
                $('form[name="login_sform"]').on('submit', function(e){
                    e.preventDefault();

                    var u_username = $(this).find('input[alt="username"]').val();
                    var p_password = $(this).find('input[alt="password"]').val();
                   // var s_status = 1;

                    if (u_username === '' && p_password ===''){
                        $('#alert-msg').html('<div class="alert alert-danger"> Required Username and Password!</div>');
                    }else{
                        $.ajax({
                            type: 'POST',
                            url: './init/controllers/login_process.php',
                            data: {
                                username: u_username,
                                password: p_password
                               // status: s_status
                            },
                            beforeSend:  function(){
                                $('#alert-msg').html('');
                            }
                        })
                        .done(function(t){
                            if (t == 1){

                                $("#btn-admin").html('<img src="./assets/images/loading.gif" /> &nbsp; Signing In ...');
                                setTimeout(' window.location.href = "./dtr_panel/dtr_dashboard/dashboard.php"; ',2000);
                            }else{
                                $('#alert-msg').html('<div class="alert alert-danger">Incorrect username or password!</div>');
                            }
                        });
                    }
                });
           });
        </script>
        <script>
            function myFunction() {
              var x = document.getElementById("password");
              if (x.type === "password") {
                x.type = "text";
              } else {
                x.type = "password";
              }
            }
     </script>
    </body>
</html>