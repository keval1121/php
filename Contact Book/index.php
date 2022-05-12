<?php 


session_start();

  $con = mysqli_connect('localhost','root','','contact_book');

if(isset($_SESSION['user_id']))
{
  header('location:Dashboard.php');
}

  if (isset($_POST['login'])) 
  {
      $email = $_POST['email'];
      $password = $_POST['password'];

      $sql_login = "select * from registration where email = '$email' and password = '$password'";
      $login_data = mysqli_query($con,$sql_login);

      $check_login = mysqli_num_rows($login_data);


       if($check_login==1)
          {
                 $row = mysqli_fetch_assoc($login_data);
                 $_SESSION['user_id'] = $row['id'];
                 header('location:Dashboard.php');
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

      input[type=text], input[type=password], input[type=email]   
      {
        width: 100%;
        padding: 12px 20px; 
        margin: 8px 0;
        display: inline-block;
        border: 1px solid da;
        box-sizing: border-box;
      }

      button 
      {
        width: 50%;
        background-color: deepskyblue;
        color: black;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
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
  <div class="container">
    <label for="email"><b>email</b></label>
    <input type="email" placeholder="Enter email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
        
    <button type="submit" name="login" value="login">login </button>
  </div>

  <a href="registration.php">registration?</a>

   
</form>

</center>