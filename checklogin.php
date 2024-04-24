<?php
    include('header.php');
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $connect = mysqli_connect("localhost", "root", "hellonyou", "shopping") or
    die("Please, check your server connection.");
    $cartamount=0;
    $cartamount = $_POST['cartamount'];
    $_SESSION['cartamount']=$cartamount;
    if (isset($_SESSION['name'])){
        $email_address=$_SESSION['name'];
        echo "Welcome " . $email_address . ". <br/>";
    }
    if (isset($_SESSION['password'])){
        $password=$_SESSION['password'];
    }
    if((isset($_SESSION['name']) && $_SESSION['name'] != "") ||
    (isset($_SESSION['password']) && $_SESSION['password'] != "")) {
        $sess = session_id();
        $query="select * from cart where cart_sess = '$sess'";
        $result = mysqli_query($connect, $query) or die(mysql_error());
        if(mysqli_num_rows($result)>=1){
            echo "If you have finished Shopping ";
            echo "<a href=index.php>Click Here</a> to return home and see and newest products";
            echo " Or You can do more purchasing by selecting items from the menu ";
        }else{
            echo "You can do purchasing by selecting items from the menu on left side";
        }       
    }else{
?>

<html>
<head>
</head>
<body>
<h3>Not Logged in yet</h1>
<p>
You are currently not logged into our system.<br>
You can do purchasing only if you are logged in.<br>
If you have already registered,
<a href="login.php">click here</a> to login, or if would like to create an
account, <a href="signup.php">click here</a> to register.
</p>
</body>
</html>

<?php
}
?>