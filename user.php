<?php
include("includes/db.php");


if(isset($_POST['user'])){
  $username = htmlentities($_POST['username']);
  $password = htmlentities($_POST['password']);
  $password_hash=md5($password);
  if(!empty($username)&&!empty($password)){
    $result="select * from registation where username='$username'";
    $result_run=mysqli_query($con,$result);
    if(!$result_run)
    echo "Error in query.. <br />";
    else {
      while($row=mysqli_fetch_array($result_run,MYSQLI_ASSOC))
      {
        $password_hash_database=$row['password'];
        $username_database=$row['username'];
        $email_database=$row['email'];
      }
      //echo $uid_database;
      if(@($username==$username_database)&&($password_hash==$password_hash_database)){
        //require 'profile.php';
        header("Location:view_bill_p.php?q=".$username_database);
      } else {
        echo "<script>alert('Please Enter a Correct Username and Password!')</script>";
        echo  "<script>window.open('user.php','_self')</script>";
      }
    }
  }else{
    echo "<script>alert('All Field are required!')</script>";
    echo  "<script>window.open('user.php','_self')</script>";
  }
}
@mysqli_free_result($result);
@mysqli_close($dbh);


?>

<!DOCTYPE Html>
<html lang="en">
<head>
  <title>Electrity Bill | User</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width-device-width scale=1.0" />
  <link rel="shortcut icon" href="image/user.png" ></link>
  <link rel="stylesheet" href="css/style.css" ></link>
  <link rel="stylesheet" href="css/circle-hover.css" ></link>
  <link rel="stylesheet" href="css/bootstrap.min.css" ></link>
  <script type="text/javascript" src="js/script.js" ></script>
  <script type="text/javascript" src="js/jquery.min.js" ></script>
  <script type="text/javascript" src="js/bootstrap.min.js" ></script>
  <script type="text/javascript" src="js/jquery.kwicks-1.5.1.js"></script>
</head>
<body>
  <div class="container-fluid" id="bg_image">
    <div class="container" style="border-bottom:solid 1px white;"  id="bg">
      <table class="table">
        <thead>
           <tr>
             <td id="f"><font ></font></td>
           </tr>
         </thead>
      </table>
      <div class="full_header">
           <div id="images1">
          <ul id="images">
          <li><img id="slide_i" src="image/banner1.jpg"  alt="gallery_buildings_one" /></li>
          <li><img id="slide_i" src="image/banner2.jpg"   alt="gallery_buildings_two" /></li>
          <li><img id="slide_i" src="image/banner3.jpg"   alt="gallery_buildings_three" /></li>
          </ul>
  		</div>
    </div>
  </div>
  <script type="text/javascript" src="js/jquery.kwicks-1.5.1.js"></script>
  <script type="text/javascript" src="js/jquery.sooperfish.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#images').kwicks({
        max : 650,
        spacing : 3
      });
      $('ul.sf-menu').sooperfish();
    });
  </script>
  <nav class="navbar navbar-inverse" id="bg_2" style="width:88.7%;margin-left:5.7%">
    <div class="container">
      <div class="navbar-collapse" id="mainNavBar">
        <ul class="nav navbar-nav navbar-right" style="margin-right:5%;">
          <li class="active"><a id="left" href="#">Login</a></li>
          <li ><a id="left" href="user_registation.php">Registation</a></li>
        </ul>
      </div>
    </div>
</nav>
    <div class="container" style="border-bottom:solid 1px white;" id="bg_1">
      <a href="index.php"><img style="margin-left:1%; margin-top:1%;" src="image/home.jpg" class="img-responsive" width="4%" height="4%" /></a>
      <center><div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title" id="log"></h2>
          </div>
      <div class="modal-body">
        <form role="form" method="post" action="" enctype="multiplepart/form">
          <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Username" style="width:35%;">
          </div>
          <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Password" style="width:35%;">
          </div>
      </div>
      <div class="modal-footer">
        <input type="submit" name="user" id="bt" class="btn btn-primary btn-block" value="Login"  style="width:64%; margin-left:18%;"/>
      </div>
      </form>
      <a href="user_registation.php" id="new">New User ! Register?</a>
    </div></center>

  </div>

  <nav class=" navbar navbar-inverse"  id="bg_2" style="width:88.7%;margin-left:5.7%;margin-top:0.2%;margin-bottom:0.6%;border-bottom-left-radius:0px;border-bottom-right-radius:0px;border-top-left-radius:8px;border-top-right-radius:8px;">
    <div class="container" >
    <p id="footer">devloped by BCE Bhagalpur itsolutation. Website: <a href="bhagalpur.ac.in">bcebhagalpur.ac.in</a></p>
  </div>
</nav>
</div>
</body>
</html>
