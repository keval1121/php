<?php 

if (isset($_POST['save'])) {
	


$a = $_POST['a'];
$b = $_POST['b'];

	$c = $a + $b;
}
 ?>

<form method="POST">
	<table>
		<tr>
			<td>Enter a:</td>
			<td><input type="text" name="a"></td>
		</tr>
		<tr>
			<td>Enter b:</td>
			<td><input type="text" name="b"></td>
		</tr>
		<tr>
			<td>Ans</td>
			<td><input type="text" name="ans" value="<?php echo $c; ?>" readonly></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="save"></td>
		</tr>
	</table>
</form>