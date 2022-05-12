<?php

	session_start();

	if(!isset($_SESSION['user_id']))
	{
		  header('location:viewContact.php');
	}

	$con = mysqli_connect('localhost','root','','contact_book');

	if (isset($_GET['u_id'])) 
	{
				
		$id = $_GET['u_id'];

		$sql_select_data = "select * from contact where id = '$id'";
		$select = mysqli_query($con,$sql_select_data);
		$row= mysqli_fetch_assoc($select);

	}
		

	if(isset($_POST['register']))
	{
		$name = $_POST['name'];
		$email = $_POST['email'];
		$city = $_POST['city'];
		$address = $_POST['address'];
		$gender =  $_POST['gender'];
		$contact_no =  $_POST['contact_no'];
		$hobby = $_POST['hobby'];
		$user_id = $_SESSION['user_id'];



	if (isset($_GET['u_id'])) 
	{
		
		$sql = "update contact set user_id='$user_id',name='$name',email='$email',city='$city',address='$address',gender='$gender',contact_no='$contact_no',hobby='$hobby' where id = '$id'"; 
	}
	else
	{
		$sql = "INSERT INTO contact (user_id,name, email, city, address, gender, contact_no,hobby) VALUES ('$user_id','$name', '$email', '$city', '$address',  '$gender','$contact_no','$hobby')";
	}

	mysqli_query($con,$sql);
	header('location:viewcontact.php');

	}

	


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css\bootstrap.min.css">


<style type="text/css">
		
  input[type=text] {
  width: 100%;
  padding: 4px 0px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid black;
  border-radius: 4px;
  box-sizing: border-box;

}

input[type=submit] {
  width: 100%;
  background-color: darkblue;
  color: white;
  padding: 14px 20px;
  margin: 8px 7;
  border: none;
  border-radius: 4px;
  cursor: pointer;

}


input[type=submit]:hover 
{
  background-color: black;
  color: white;
}

	table
	{
		border: 1px solid black ;
		margin-top: 170px;
		font-weight: bold;
		
	}
	.table
	{
			font-weight: bold;
	}

</style>
</head>
<body>



   <div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
        <span class="fs-4">Dashbord</span>
      </a>

      <ul class="nav nav-pills">
       <li class="nav-item"><a href="add_contact.php" class="nav-link active" aria-current="page">add_contact</a></li>
       <li class="nav-item"><a href="viewContact.php" class="nav-link">viewContact</a></li>
       <li class="nav-item"><a href="manage Account.php" class="nav-link">manage Account</a></li>
       <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
       </ul>
    </header>
<center>
 <form method="post" class="col-4">
		<table class="table">
			<tr>
				<td class="a">name :</td>
				<td>
					<input type="text" name="name" value="<?php echo @$row['name'];?>">
				</td>
			</tr>

			<tr>
				<td class="a">email :</td>
				<td>
					<input type="email" name="email" value="<?php echo @$row['email'];?>">
				</td>
			</tr>

			<tr>
				<td class="a">city :</td>
				
				<td>
					<input type="text" name="city" value="<?php echo @$row['city'];?>">
				</td>
					
			</tr>
			<tr>
			<td class="a">address :</td>
				<td>
					<input type="address" name="address" value="<?php echo @$row['address'];?>">
				</td>
			</tr>


			<tr>
				<td class="a">gender :</td>
				<td>
					<input type="radio" name="gender" value="Male" <?php if(@$row['gender']=="male"){ ?> checked <?php } ?>> Male
					<input type="radio" name="gender" value="Female" <?php if(@$row['gender']=="male"){ ?> checked <?php } ?>>Female
					<input type="radio" name="gender" value="other" <?php if(@$row['gender']=="male"){ ?> checked <?php } ?>>other


				</td>
			</tr>


			<tr>
				<td class="a">contact_no	:</td>
				<td>
					<input type="text" name="contact_no" value="<?php echo @$row['contact_no'];?>"> 
				</td>
			</tr>
		
			<tr>
				<td class="a">hobby :</td>
				<td>
					<input type="text" name="hobby" value="<?php echo @$row['hobby'];?>">
					
				</td>
			</tr>

			
			<tr>
				<td>
					<input type="submit"  name="register" <?php if (isset($_GET['u_id'])) { ?> value= "update" <?php }else{ ?> value="register" <?php } ?>>
				</td>
			</tr>
		</table>
	</form>
	</center>
  </div>
  </body>
</html>
			
