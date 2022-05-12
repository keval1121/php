 <?php 

		session_start();

				$con = mysqli_connect('localhost','root','','contact_book');

		if(!isset($_SESSION['user_id']))
		{
			header('location:add_contact.php');

		}

			if (isset($_GET['id'])) 
				{
						$id = $_GET['id'];

						$sql_delete = "delete from contact where id = '$id' ";

						mysqli_query($con,$sql_delete);
				}


			$id = $_SESSION['user_id'];

			$limit = 5;

				$sql_page= "select *from contact";
				$page = mysqli_query($con,$sql_page);
				$total_record = mysqli_num_rows($page);

				$total_page = ceil($total_record / $limit);

				if (isset($_GET['page'])) 
				{
					$page = $_GET['page'];
				}
				else
				{
					$page = 1;
				}

				$start = ($page-1)*$limit;

				$sql_select = "select * from contact where user_id = '$id' limit $start,$limit";
			  $login_data = mysqli_query($con,$sql_select);



 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css\bootstrap.min.css">

	<style type="text/css">

	.a{
				color: darkblue;
		}
		.b
		{
			color: red;

		}
		.d
		{
			color: green;
		}
		.e
		{
			color: purple;
		}
		.f
		{
			color: brown;
		}
		.g
		{
			color: #4d0000;
		}
		.h
		{
			color: lightgreen;
		}
		.i
		{
			color: #e60073;
		}
		
	</style>
</head>
<body>
   <div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="Dashboard.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
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

   <table border="" class="table">
	
   	<th class="a">ID</th>																														
   	<th class="b">NAME</th>
   	<th class="c">EMAIL</th>
   	<th class="d">CITY</th>
   	<th class="e">ADDRESS</th>
   	<th class="f">GENDER</th>
   	<th class="g">CONTACT_NO</th>
   	<th class="h">HOBBY</th>
   	<th class="i">ACTION</th>
 



		  <?php while($row = mysqli_fetch_assoc($login_data)) { ?>

			<tr >
				<td><?php echo $row['id']; ?></td>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['email']; ?></td>
				<td><?php echo $row['city']; ?></td>
				<td><?php echo $row['address']; ?></td>
				<td><?php echo $row['gender']; ?></td>
				<td><?php echo $row['contact_no']; ?></td>
				<td><?php echo $row['hobby']; ?></td>
				<td><a href="viewContact.php?id=<?php echo $row['id']; ?>">Delete</a>||<a href="add_contact.php?u_id=<?php echo $row['id']; ?>">update</a></td>
			
			</tr>

<?php } ?>	
   	
   </table>
    </div>
  </body>
</html>
<?php  
for ($i=1; $i <=$total_page ; $i++) { ?>
	
	<a href="viewContact.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>

<?php } ?>
