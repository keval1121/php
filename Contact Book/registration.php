<?php 


	session_start();

	$con = mysqli_connect('localhost','root','','contact_book');
		

	if(isset($_POST['register']))
	{
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$city = $_POST['city'];
		$address = $_POST['address'];
		$hobby = $_POST['hobby'];
		$gender =  $_POST['gender'];
		$contact =  $_POST['contact'];


		$sql = "INSERT INTO registration (name, email, password, city, address, hobby, gender, contact) VALUES ('$name', '$email', '$password', '$city', '$address', '$hobby', '$gender', '$contact')";

	mysqli_query($con,$sql);
	header('location:index.php');

	}
?>
<center>
 <form method="post">
		<table >
			<tr>
				<td>name :</td>
				<td>
					<input type="text" name="name" >
				</td>
			</tr>

			<tr>
				<td>email :</td>
				<td>
					<input type="email" name="email">
				</td>
			</tr>

			<tr>
				<td>password</td>
				<td>
					<input type="password" name="password">
				</td>
			</tr>

			<tr>
				<td>city :</td>
				
				<td>
					<input type="text" name="city">
				</td>
					
			</tr>
			<tr>
			<td>address :</td>
				<td>
					<input type="address" name="address">
				</td>
			</tr>


		<tr>
			<td>hobby :</td>
			<td>
				<input type="text" name="hobby">
				
			</td>
		</tr>


			<tr>
				<td>gender :</td>
				<td>
					<input type="radio" name="gender" value="Male"> Male
					<input type="radio" name="gender" value="Female">Female
					<input type="radio" name="gender" value="other">other


				</td>
			</tr>

			<tr>
				<td>contact	:</td>
				<td>
					<input type="text" name="contact">
				</td>
			</tr>
		

			<tr>
				<td>
					<input type="submit"  name="register" value="register">
				</td>
			</tr>
			
		</table>
	</form>
</center>
			
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
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 7px;
  border: none;
  border-radius: 4px;
  cursor: pointer;

}


input[type=submit]:hover 
{
  background-color: #45a049;
}

	table
	{
		border: 1px solid black;
		
	}

</style>


