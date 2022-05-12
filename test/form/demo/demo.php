<?php 

  session_start();

  $con = mysqli_connect('localhost','root','','part');

  
if(isset($_SESSION['user_id']))
{
  header('location:dashbord.php');
}


  if (isset($_POST['login']))
  {
      
      $email = $_POST['email'];
      $password = $_POST['password'];



      $sql_login = "select * from form where email = '$email' and password = '$password'";
      $login_data = mysqli_query($con,$sql_login);

      $check_login = mysqli_num_rows($login_data);



       if($check_login==1)
          {
                 $row = mysqli_fetch_assoc($login_data);
                 $_SESSION['user_id'] = $row['ID'];
                 header('location:dashbord.php');
           }
           else
           {
              $msg = "your email and password rong";
           }
    }


 ?>



<style>

       center
       {
          margin: 230px;
       }

       form 
       {
        width: 50%;
        height: 50%;
        border: 3px solid #f1f1f1;
       }

      input[type=text], input[type=password]   
      {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid silver;
        box-sizing: border-box;
      }

      button 
      {
        background-color: deepskyblue;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        width: 100%;
      }

      .container 
      {
        padding: 16px;
      }

      span.psw 
      {
        float: right;
        padding-top: 16px;
      }
      h2
      {
      }
</style>


<center>

<h2>Login Form</h2>
<form method="post" >
 <?php echo @$msg; ?>
  <div class="container">
    <label for="email"><b>email</b></label>
    <input type="text" placeholder="Enter email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
        
    <button type="submit" name="login" value="login">Login</button>
    
  </div>

   
</form>

</center>

<!-- 
 <form method="POST">
 <table align="center">
  <tr>
    <td>Email:</td>
    <td><input type="email" name="email"></td>
  </tr>
  <tr>
    <td>password:</td>
    <td><input type="password" name="password"></td>
  </tr>
  <tr>
    <td></td>
    <td><input type="submit" name="login" value="Login"></td>
  </tr>
  
 </table>
</form> -->
