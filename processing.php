<?php
session_start();
require('dbconnect.php');
?>
<?php

if(isset($_POST['submit'])){    
/* get the values submitted in the form */
$name = $_POST['name'];
$phone = $_POST['phonenumber'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$_SESSION['fullname'] = $name;
$_SESSION['phonenumber'] = $phone;
$_SESSION['email'] = $email;
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
echo '<script type="text/javascript">
      window.location="mt.html";
      </script>';
 }
      if($_GET['action'] == "login")
       {
       //proccessing the login page
          $username = $_POST['username'];
          $password = $_POST['password'];
      
          if($username == $_SESSION['username'])
             {
              if($password == $_SESSION['password'])
              {
              
              echo '<script type="text/javascript">
              window.location="mt.html";
              </script>';
          }
      }
     
    if(!empty($name) && !empty($email) && !empty($username) && !empty($phone) && !empty($password)){
      $db = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
      $insert=$db->exec("INSERT INTO users(name,phonenumber,email,username,password,)VALUES('$name','$phone','$email','$username',md5('$password'),NOW(),1)");
      $result = $db->lastInsertId();
      //var_dump($result); die();
      if($result > 0){
      echo '<script type="text/javascript"> alert("Registration succesful");
      windows.location="mt.html";
      </script>';
      }
    }
  }
   /* }else{
      echo '<script type="text/javascript"> alert("Registration unsuccesful");
      </script>';
    }
  }else{
      echo'<script type="text/javascript"> alert("fill all the fill");
      </script>';
  }
  {
  }
/*else{
       echo'<script type="text/javascript"> alert("incorrect confirm password");
       </script>';*/
  




  
      ?>