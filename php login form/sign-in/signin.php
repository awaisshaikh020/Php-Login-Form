<?php
include_once "connection.php";
session_start();

// not come to login page throw the {url} until -> session destroyed
if(isset($_SESSION['name']))
{
    header('location:dashboard.php');
}

// check user correct login -> email and password -> if correct email and password after ->open the dashboard
if(isset($_POST['submit']))
{
    $_name = $_POST['name'];
    $_email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT * FROM `signinpage` WHERE email = '$_email' and password = '$password'";
    $result = mysqli_query($conn,$query);
    $TotalRows =mysqli_num_rows($result);
    // echo $TotalRows;
    if($TotalRows == 1)
    {
$_SESSION['name'] =  $_name;
header('location:dashboard.php');
    }
    else{
       echo "<script>alert('Username and Password is incorrect')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in page</title>
    <!-- bootsrap-5 css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-warning">
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card p-4 mt-5">
                        <h1 style="margin-top: 1rem; text-align: center;">Sign-In Page</h1>
                        <form method="POST" style="margin-top: 5rem;">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>