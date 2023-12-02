<?php 
if (isset($_POST['form_submitted'])): 
$user = $_POST['username'];
$passwd = $_POST['password'];
$server = "localhost";
$username = "root";
$password = "";
$dbname = "dbms";
echo "TRYING TO ESTABLISH CONNECTION<br>";
// Create connection
$conn = mysqli_connect($server, $username, $password, $dbname);
// Check connection
if (!$conn) {
 die("Connection failed: " . mysqli_connect_error());
}
echo "CONNECTION ESTABLISHED<br>";

//$query = "SELECT * FROM MyGuests where firstname = '$fname'";
//SELECT * FROM MyGuests where firstname = 'jyoti ' OR '1'='1'
//jyoti ' OR '1'='1
//$result = mysqli_query($conn, $query);

$sql = "SELECT * FROM signup where name = ? or password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $user, $passwd);
$stmt->execute();
$result = $stmt->get_result();

// fetch associative array 
$row = $result->fetch_assoc();
if($row['email']==$user && $row['password']==$passwd){
	header("location: dashboard.html");
}else {
	header("location: login.html");
}

mysqli_close($conn);
?>


 <?php else: ?>
	<?php endif; ?>