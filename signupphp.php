<?php if (isset($_POST['form_submitted'])): 
     $name = $_POST['name'];
     $email = $_POST['email'];
     $pgender = $_POST['gender'];
     $page = $_POST['age'];
     $passwd = $_POST['password'];
     $cpasswd = $_POST['cpassword'];
$server = "localhost";
$username = "root";
$password = "";
$dbname = "dbms";
echo "TRYING TO ESTABLISH CONNECTION<br>";

$conn = mysqli_connect($server, $username, $password, $dbname);

if (!$conn) {
 die("Connection failed: " . mysqli_connect_error());
}
echo "CONNECTION ESTABLISHED<br>";


$sql = "INSERT INTO signup (name, email, gender, age, password, cpassword) VALUES (
'$name',
'$email',
'$pgender',
'$page',
'$passwd',
'$cpasswd')"; 

if (mysqli_query($conn, $sql)) {
 echo "You have been registered successfully";
}
else {
 echo "Error: " . $sql . mysqli_error($conn);
}
mysqli_close($conn);
endif;
?>