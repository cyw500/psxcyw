<?php

   include('config.php');
   session_start();

   // echo str_repeat('&nbsp;', 20);
   // print_r($_SESSION);
   // echo "<br><br>";

   $error = "";

//   if($_SERVER["REQUEST_METHOD"] == "POST") {
     if(isset($_POST["submit"])){
      // username and password sent from form
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);

      $sql = "SELECT * FROM Officer_access WHERE username = '$myusername' and password = '$mypassword';";
      $result = mysqli_query($db,$sql);
      // = mysqli_fetch_array($result); // there isnt a point of this
      //$count = mysqli_num_rows($result);
      // If result matched $myusername and $mypassword, table row must be 1 row
      if(mysqli_num_rows($result) == 1) {
        $_SESSION['login_user'] = $myusername;

        header("Location: home.php");
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
      <div align = "center">
         <div style = "width:350px; border: solid 1px #333333; margin:5%;" align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:15px ;"><b>Login</b></div>

            <div style = "margin:30px">

               <form action = "" method = "post" autocomplete="off">
                     <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" name="username" class="form-control" placeholder="Username">
                     </div><br>
                      <div class="input-group">
                       <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                       <input type="password" name="password" class="form-control" placeholder="Password">
                   </div><br>
                      <input type = "submit" name="submit" value = " Login " class="btn btn-default btn-block"/><br />
               </form>

               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error ?></div>

            </div>

         </div>

      </div>

   </body>
</html>
