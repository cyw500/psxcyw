<?php

   include('config.php');
   session_start();

   $error = "";

   if($_SERVER["REQUEST_METHOD"] == "POST") {

      // username and password sent from form
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);

      $sql = "SELECT * FROM officer_access WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result); // what is the point of this?

      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {
        $_SESSION['login_user'] = $myusername;

        header("location: home.php");
      }
	  else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>

<html>

   <head>
      <title>Login Page</title>

      <style type = "text/css">

         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }

         .box {
            border:#666666 solid 1px;
         }
      </style>

   </head>

   <body bgcolor = "#FFFFFF">
      <div class="jumbotron text-center">
        <h1>Police Traffic Records</h1>
      </div>
      <div align = "center">
         <div style = "width:350px; border: solid 1px #333333; margin:5%;" align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:15px ;"><b>Login</b></div>

            <div style = "margin:30px">

               <form action = "" method = "post">
                   <div align = "center">
                      <label>Username  : </label><input type = "text" name = "username" class = "box"/><br /><br />
                      <label>Password  : </label><input type = "password" name = "password" class = "box" /><br/><br />
                      <input type = "submit" value = " Login "/><br />
                  </div>
               </form>

               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error ?></div>

            </div>

         </div>

      </div>

   </body>
</html>