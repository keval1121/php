<?php 

session_start();

if(!isset($_SESSION['user_id']))
{
	header('location:registration.php');

}


$con = mysqli_connect('localhost','root','','contact_book');


$id = $_SESSION['user_id'];

	$sql_login = "select * from registration where id = '$id'";
	$login_data = mysqli_query($con,$sql_login);
	$row = mysqli_fetch_assoc($login_data);

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


	.table
	{
		border: 1px solid black;
	}
	.a
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
        <span class="fs-4">DASHBORD.HOME</span>
      </a>

      <ul class="nav nav-pills">
       <li class="nav-item"><a href="add_contact.php" class="nav-link active" aria-current="page">add_contact</a></li>
       <li class="nav-item"><a href="viewContact.php" class="nav-link">viewContact</a></li>
       <li class="nav-item"><a href="manage Account.php" class="nav-link">manage Account</a></li>
       <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
       </ul>
    </header>


 <form method="post" class="col-4 ms-auto">
		<table class="table">
			<img src="">
			<tr>
				<td class="a">name :</td>
				<td>
					<input type="text" name="name" value="<?php echo @$row['name'];?>" disabled>
				</td>
			</tr>

			<tr>
				<td class="a">email :</td>
				<td>
					<input type="email" name="email" value="<?php echo @$row['email']; ?>" disabled>
				</td>
			</tr>


			<tr>
				<td class="a">contact	:</td>
				<td>
					<input type="text" name="contact" value="<?php echo @$row['contact']; ?>"disabled>
				</td>
			</tr>

	
			<tr>
				<td class="a">gender :</td>
				<td>
					<input type="radio" name="gender" value="Male"  <?php if(@$row['gender']=="Male"){ ?> checked <?php } ?>disabled> Male
					<input type="radio" name="gender" value="Female" <?php if(@$row['gender']=="Female"){ ?> checked <?php } ?>disabled>Female
					<input type="radio" name="gender" value="Other" <?php if(@$row['gender']=="Other"){ ?> checked <?php } ?>disabled>other

				</td>
			</tr>


			<tr>
				<td class="a">hobby :</td>
				<td>
					<input type="text" name="hobby" value="<?php echo @$row['hobby']; ?>" disabled>
					
				</td>
			</tr>

			<tr>
				<td class="a">city :</td>
				
				<td>
					<input type="text" name="city" value="<?php echo @$row['city']; ?>" disabled>
				</td>
					
			</tr>

		</table>
	</form>
  </div>
  </body>
</html>
