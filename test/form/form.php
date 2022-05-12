<?php


	$con = mysqli_connect('localhost','root','','part'); 

	if (isset($_GET['ID'])) 
	{
		$id = $_GET['ID'];

		$sql_delete = "delete from form where ID = '$id' ";

		mysqli_query($con,$sql_delete);
	}

	if (isset($_GET['u_ID'])) 
	{
		
	$ID = $_GET['u_ID'];

	$sql_select_data = "select * from form where ID = '$ID'";
	$select = mysqli_query($con,$sql_select_data);
	$row_data= mysqli_fetch_assoc($select);

	$hobby_arry = explode(',', $row_data['hobby']);


	}


  
	if(isset($_POST['save']))
	{
	
		$name = $_POST["name"];
		$address = $_POST["address"];
		$city = $_POST["city"];
		$gender = $_POST["gender"];
		$hobby = $_POST["hobby"];
		$hobby_srl = implode(',', $hobby);
		$email = $_POST["email"];
		$password = $_POST["password"];

	

	if (isset($_GET['u_ID'])) 
	{
			
			$sql = "update form set name='$name',address='$address',city='$city',gender='$gender',hobby='$hobby_srl',email='$email',password='$password' where ID = '$ID'"; 
	}
	else
	{
		$sql = "insert into form (name,address,city,gender,hobby,email,password) values ('$name','$address','$city','$gender','$hobby_srl','$email','$password')";
	}
		mysqli_query($con, $sql);
		header('location:form.php');
	}

	$limit = 5;

	$sql_page= "select *from form";
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

	$sql_select = "select * from form limit $start,$limit";
	$slect_data = mysqli_query($con,$sql_select);


?> 


	<form method="post">
		<table >
			<tr>
				<td>name :</td>
				<td>
					<input type="text" name="name" value="<?php echo @$row_data['name'];?>">
				</td>
			</tr>

			<tr>
				<td>address :</td>
				<td>
					<input type="text" name="address" value="<?php echo @$row_data['address'];?>">
				</td>
			</tr>

			<tr>
				<td>city :</td>
				<td>
					<select name="city" value="<?php echo @$row_data['city'];?>">
					<option name="city" value="">------select city------!</option>
					<option name="city" value="surat">surat</option>
					<option name="city" value="vapi">vapi</option>
					<option name="city" value="valsad">valsad</option>
					<option name="city" value="bhavnagar">bhavnagar</option>
					<option name="city" value="vadodra">vadodra</option>
					</select>
				</td>
			</tr>

			<tr>
				<td>gender :</td>
				<td>
					<input type="radio" name="gender" value="male"  <?php if(@$row_data['gender']=="male"){ ?> checked <?php } ?>> Male
					<input type="radio" name="gender" value="female" <?php if(@$row_data['gender']=="female"){ ?> checked <?php } ?>>Female
					<input type="radio" name="gender" value="other" <?php if(@$row_data['gender']=="other"){ ?> checked <?php } ?>>other


				</td>
			</tr>

		<tr>
			<td>hobby :</td>
			<td>
				<input type="checkbox" name="hobby[]" value="rading" <?php if (isset($_GET['u_ID'])){ if (in_array("rading",$hobby_arry)) { ?> checked="" <?php } } ?> >rading<br>
				<input type="checkbox" name="hobby[]" value="criket" <?php  if (isset($_GET['u_ID'])){ if (in_array("criket",$hobby_arry)) { ?> checked="" <?php } } ?>>criket<br>
				<input type="checkbox" name="hobby[]" value="voliball" <?php  if (isset($_GET['u_ID'])){ if (in_array("voliball",$hobby_arry)) { ?> checked="" <?php } } ?>>voliball<br>
				<input type="checkbox" name="hobby[]" value="football" <?php  if (isset($_GET['u_ID'])){ if (in_array("football",$hobby_arry)) { ?> checked="" <?php } } ?>>football<br>

			</td>
		</tr>

			<tr>
				<td>email :</td>
				<td>
					<input type="email" name="email" value="<?php echo @$row_data['email'];?>">
				</td>
			</tr>
			<tr>
				<td>password</td>
				<td>
					<input type="password" name="password" value="<?php echo @$row_data['password'];?>">
				</td>
			</tr>

			<tr>
				<td>
					<input type="submit"  name="save" <?php if (isset($_GET['u_ID'])) { ?> value= "update" <?php }else{ ?> value="save" <?php } ?>>
				</td>
			</tr>
			
		</table>
	</form>
			

<table border="">
	<th>ID</th>
	<th>NAME</th>
	<th>ADDRESS</th>   
	<th>CITY</th>
	<th>GENDER</th>
	<th>HOBBY</th>
	<th>EMAIL</th>
	<th>PASSWORD</th>
	<th>ACTION</th>
	
	<?php while($row = mysqli_fetch_assoc($slect_data)) { ?>

	<tr>
		<td><?php echo $row['ID']; ?></td>
		<td><?php echo $row['name']; ?></td>
		<td><?php echo $row['address']; ?></td>
		<td><?php echo $row['city']; ?></td>
		<td><?php echo $row['gender']; ?></td>
		<td><?php echo $row['hobby']; ?></td>
		<td><?php echo $row['email']; ?></td>
		<td><?php echo $row['password']; ?></td>
		 <td><a href="form.php?ID=<?php echo $row['ID']; ?>">Delete</a>||<a href="form.php?u_ID=<?php echo $row['ID']; ?>">update</a></td>


	</tr>

<?php } ?>	
</table>

<?php 
for ($i=1; $i <=$total_page ; $i++) { ?>
	
	<a href="form.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>

<?php } ?>
 