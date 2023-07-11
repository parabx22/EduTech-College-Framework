<?php
session_start();
require_once('../connection.php');

if (isset($_POST['Login'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $que = mysqli_query($con, "SELECT * FROM faculty WHERE faculty_email='$email' AND password='$pass'");
    $row = mysqli_num_rows($que);
    if ($row) {
        $_SESSION['faculty'] = $email;
        header('location:dashboard.php');
        exit;
    } else {
        $err = "<font color='red';font-family='acme';font-size=25px;>Invalid Login Details..!</font>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <style>
        body {
            background-color:  #f8f9fa;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding-top: 100px;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: #ffffff;
            text-align: center;
            font-weight: bold;
            font-size: 24px;
            padding: 20px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .card-body {
            padding: 20px;
        }

        .form-group label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Admin Login
            </div>
            <div class="card-body">
                <?php if (isset($err)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $err; ?>
                    </div>
                <?php } ?>
                <form method="post">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="Login">Login</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

