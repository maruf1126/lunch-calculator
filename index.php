<?php //Start the Session
session_start();
require('connect.php');

if (isset($_POST['username']) and isset($_POST['password'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM `user` WHERE username='$username' and password='$password'";

    $result = mysql_query($query) or die(mysql_error());
    $count = mysql_num_rows($result);
    while($row=mysql_fetch_array($result))
    { $id = $row['id']; }


    if ($count == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $id;


    } else {
        echo '<div class="form-msg-2">Invalid Login user name or password</div>';
    }
}

if (isset($_SESSION['username']) && isset($_SESSION['password'])){
    header("location: welcome.php");
}
else{
// When the user visits the page first time, simple login form will be displayed.
?>
<!DOCTYPE html>
<head xmlns="http://www.w3.org/1999/html">
    <link rel="stylesheet" type="text/css" href="./css/style.css"/>
</head>
<body>
<!-- Form for logging in the users -->

<div class="register-form">
    <?php
    if (isset($msg) & !empty($msg)) {
        echo $msg;
    }
    ?>
    <h1>Login</h1>

    <form action="" method="POST">
        <p><label>User Name : </label>
            <input id="username" type="text" name="username" placeholder="username"/></p>

        <p><label>Password&nbsp;&nbsp; : </label>
            <input id="password" type="password" name="password" placeholder="password"/></p>

        <a class="btn" href="register.php">Register</a>
        <button class="btn" type="submit" name="submit" value="Login"> Login</button>
    </form>
</div>
<div class="lunch-btn"> <a class="btn" href="admin.php">Check Launch Time</a> </div>
<?php } ?>
</body>
</html>