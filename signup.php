<head>
<title>SignUp</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<?php


    function Request($conn) {
        $fname =   $_POST['fname'];
        $lname = $_POST['lname'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $pswd = $_POST['pswd'];
        $addr = $_POST['addr'];
        $regno = $_POST['regno'];

        $query = "INSERT INTO `std`(`firstname`, `lastname`, `dob`, `gender`, `email`, `password`, `address`, `rollno`) 
	VALUES ('$fname','$lname','$dob','$gender','$email','$pswd','$addr','$regno')"; 
        $checkUserExist_query = "SELECT * FROM `std` WHERE `rollno`='$regno' AND `email`='$email'";
        $checkUserExist_result = mysqli_query($conn,$checkUserExist_query);
        if(mysqli_num_rows($checkUserExist_result)>0) {
            echo "<p class='error-msg'>User already exist</p>";
        }
        else{
            mysqli_query($conn,$query);
        }
        
    }

    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpassword = '';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpassword,'database');
    if(! $conn ) {
        die('Could not connect:  '.mysqli_error());
    }
    if(isset($_POST['submit'])){
        Request($conn);
        mysqli_close($conn);
    }
    
    


?>

</body>
<form action="" method="post">
    <label for="firstname">FirstName:</label>
    <input type="text" name="fname" id="firstname">
    <br>

    <label for="lastname">LastName:</label>
    <input type="text" name="lname" id="lastname">
    <br>

    <label for="dob">DOB:</label>
    <input type="date" name="dob" id="dob">
    <br>

    <label for="gender">Gender:</label>
    <input type="text" name="gender" id="gender">
    <br>

    <label for="email">Email:</label>
    <input type="text" name="email" id="email">
    <br>

    <label for="pswd">Password:</label>
    <input type="password" name="pswd" id="pswd">
    <br>

    <label for="address">Address:</label>
    <input type="text" name="addr" id="address">
    <br>

    <label for="rno">Register No:</label>
    <input type="text" name="regno" id="rno">
    <br>

    <input type="submit" value="Submit" name="submit">

</form>
<style>
    .error-msg {
        color: red;
    }
</style>
</html>