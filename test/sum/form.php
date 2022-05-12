<?php

if(isset($_POST['sum']))
{

$a = $_POST['a'];
$b = $_POST['b'];

$c = $a  + $b;



}

if(isset($_POST['dif']))
{

$a = $_POST['a'];
$b = $_POST['b'];

$c = $a  - $b;



}

if (isset($_POST['mul'])) 
{

$a = $_POST['a'];
$b = $_POST['b'];

$c = $a * $b;


}

if (isset($_POST['div'])) 
{
$a = $_POST['a'];
$b = $_POST['b'];

$c = $a / $b;


}
?>
<!-- default (GET) pass data in url
    
    backend (POST)  backend 

-->
  <style type="text/css">
        
        input
        {
            background: lightblue;

        }

    </style>
<form method="POST">
    <table>
        <tr>
            <td>  Enter a:</td>
            <td>
                <input type="text" name="a">
            </td>
        </tr>
        <tr>
            <td> Enter b:</td>
            <td>
                <input type="text" name="b">
            </td>
        </tr>
         <tr>
            <td>ans: </td>
            <td>
                <input type="text" name="ans" value="<?php echo $c; ?>" readonly>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="sum" value="sum">
                <input type="submit" name="dif" value="dif">
                <input type="submit" name="mul" value="mul">
                <input type="submit" name="div" value="div">
            </td>
        </tr>
        
    </table>


</form>




