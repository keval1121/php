<?php 

  $con = mysqli_connect('localhost','root','','img');

if (isset($_POST['save'])) 
{
	$image = rand(0,999999).$_FILES['image']['name'];
	$patha = "upload/".$image;
	move_uploaded_file($_FILES['image']['tmp_name'], $patha);

    $sql = "insert into tbl_img (image) values ('$image')";
	
		mysqli_query($con,$sql);

}

$img_select = "select * from tbl_img";
$img_data = mysqli_query($con,$img_select);

 ?>									
<form method="POST" enctype="multipart/form-data">
<table>
	<tr>
		<td>Image:</td>
		<td>
			<input type="File" name="image">
		</td>
	</tr>
	<tr>	
		<td></td>
		<td>
			<input type="submit" name="save">
		</td>
	</tr>
</table>
</form>

	<table>
		<tr>
			<?php while($row = mysqli_fetch_assoc($img_data)) { ?>
			<td>
				<img src="upload/<?php echo $row['image']; ?>" width = "50px" height = "50px"></td>
		<?php } ?>
		</tr>
	</table>