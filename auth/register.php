<?php
include "../config/db.php";
?>

<!DOCTYPE html>
<html>
<head>
<title>User Registration</title>
</head>

<body>

<h2>Register</h2>

<form method="POST">

Name:
<input type="text" name="name" required>
<br><br>

Email:
<input type="email" name="email" required>
<br><br>

Password:
<input type="password" name="password" required>
<br><br>

Role:
<select name="role">
<option value="member">Member</option>
<option value="leader">Team Leader</option>
</select>

<br><br>

<button type="submit" name="register">Register</button>

</form>

</body>
</html>
<?php

if(isset($_POST['register'])){

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (name,email,password,role)
VALUES ('$name','$email','$hashed_password','$role')";

if(mysqli_query($conn,$sql)){
echo "User registered successfully";
}
else{
echo "Error: ".mysqli_error($conn);
}

}

?>