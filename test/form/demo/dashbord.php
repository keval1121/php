<?php 

session_start();

if(!isset($_SESSION['user_id']))
{
	header('location:demo.php');
}

$con = mysqli_connect('localhost','root','','part');


$id = $_SESSION['user_id'];

	$sql_login = "select * from form where id = '$id'";
	$login_data = mysqli_query($con,$sql_login);
	$row = mysqli_fetch_assoc($login_data);


 ?>

 <h1>NAME    :  <?php echo $row['name']; ?> </h1>

 <h1>ADDRESS :  <?php echo $row['address']; ?> </h1>

 <h1>CITY    :  <?php echo $row['city']; ?> </h1>

 <h1>GENDER  :  <?php echo $row['gender']; ?> </h1>

 <h1>HOBBY   :  <?php echo $row['hobby']; ?> </h1>



 <a href="logut.php">Logout</a>


