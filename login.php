<?php include 'connection.php' ?>
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="defaultCenter.css">
    <link rel="stylesheet" href="topNav.css">

    <title>Login</title>

</head>

<body>

    <div class="topnav">

        <a href="login.php">Login</a>
        <a href="registration.php">Registration</a>
        
    </div>

    <div class="container">

        <h1>Login</h1>
        <br><br>

        <form action="" method="post">

            <input type="email" name="email" id="email" placeholder="Enter Your Email">
            <br><br>

            <input type="password" name="password" id="password" placeholder="password">
            <br><br>

            <button type="login" name="login" class="btn">
                Login
            </button>

        </form>

    </div>

</body>

</html>

<?php
    if(isset($_POST['login'])){

        $email = $_POST['email'];
        $password = $_POST['password'];

        $s = "SELECT * FROM user WHERE email ='".$email."' AND password = '".$password."'";

        $q = mysqli_query($conn,$s);
        $row = mysqli_fetch_assoc($q);

        if($row){

            $userStatus = $row['userStatus'];
            $role = $row['role'];

            if($userStatus){
                $_SESSION['userName'] = $row['userName'];
                $_SESSION['role']= $row['role'];
                if($role=="admin"){
                   header('location:dashboard.php'); 
                }
                else{
                    header('location:superAdminDashboard.php');
                }
                
            }
        }
    }
?>