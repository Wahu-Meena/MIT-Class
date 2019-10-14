<?php
//intiatialize variables
$username =$email = $password1 = $password2 = '';
if(isset($_POST['signupbtn'])){
    // grab the data post
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password1 = $_POST["password1"];
    $password2 = $_POST["password2"];

    if ($password1 == $password2){
        $newpassword = $password1;

        //collect and add data to the db
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = 'facebookKenya';

        $link = mysqli_connect($servername,$username,$password,$dbname);
        if(!$link){
            echo "Connection to the database is unsuccessful";
        }
        else "Connection to the database is successful";

        // excute sql query
        $sql = "INSERT INTO `users`(`id`, `username`, `email`, `password`) VALUES ('null' ,''$username'',''$email'',''$newpassword'')";


        if (mysqli_query($link,$sql)){
            header("location:login.php");
        }
        else {
            echo "saving unsuccessful";
        }


    }
    else{
        header("location:complete_form.php");
    }
    // send user to login page


    echo $username. "<br>";
    echo $email. "<br>";
    echo $password1. "<br>";
    echo $password2. "<br>";
}
?>

<html>
<head>
<title> SignUp Form</title>
    <body>
<form action="complete_form.php" method="post">
    <input type="text" placeholder="Username" name="username" required>
    <input type="email" placeholder="Email" name="email" required>
    <input type="password" placeholder="Password" name="password1" required>
    <input type="password" placeholder="Confirm Password" name="password2" required>
    <input type="submit" name="signupbtn" value="Signup">
</form>

</body>
</head>
</html>


