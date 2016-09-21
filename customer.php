<?php

include("includes/db.php");

?>

<?php
require_once 'includes/connection.php';

@$admin = htmlentities($_GET['q']);

$result=mysql_query("select * from admin_sign where username='$admin'");
if(!$result){

}
else {
  while($row=mysql_fetch_array($result,MYSQLI_ASSOC))
  {
    @$name_database=$row['username'];
  }

}

?>

<!DOCTYPE Html>
<html lang="en">
<head>
  <title>Electrity Bill | Customer</title>
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
        <ul class="nav navbar-nav navbar-right">
          <li><a id="left" href="registation.php?q=<?php echo $admin ?>">Registation</a></li>
          <li class="active"><a id="left" href="#">View Customers</a></li>
          <li><a id="left" href="bill.php?q=<?php echo $admin ?>">Calculate Bill</a></li>
          <li><a id="left" href="update.php?q=<?php echo $admin ?>">Update</a></li>
          <li><a id="left" href="view_feedback.php?q=<?php echo $admin ?>">View Feedback</a></li>
          <li><a id="left" href="admin.php">Logout</a></li>
        </ul>
      </div>
    </div>
</nav>
    <div class="container" style="border-bottom:solid 1px white;" id="bg_1">
      <a href="index.php"><img style="margin-left:1%; margin-top:1%;" src="image/home.jpg" class="img-responsive" width="4%" height="4%" /></a>
      <center>
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title" id="log" style="margin-left:4%;">Customer Details :</h2>
          </div>
          <table class="table q" border="1" style="background-color:red;">
         <thead>
           <tr>
             <td id="k"style="color:white;">S.no</td>
             <td id="k" style="color:white;">Username</td>
             <td id="k" style="color:white;">Contact No</td>
             <td id="k" style="color:white;">Email Id</td>
             <td id="k" style="color:white;">Address</td>
           </tr>
         </thead>
       </table>

       <?php

            $con=mysqli_connect("localhost","root","","electricity");

           if(mysqli_connect_errno()){

            echo "Field to connect to Mysql:" .mysqli_connect_error();

         }

        global $con;

          $get_pro="select * from registation";
          $run_pro=mysqli_query($con,$get_pro);
             $sno =1;
              while($row_pro=mysqli_fetch_array($run_pro)){
                 $pro_sno=$sno;
    //$pro_student_id=$row_pro['student_id'];
                 $pro_name=$row_pro['username'];
                  $pro_mobile_no=$row_pro['mobile_no'];
                  $pro_email=$row_pro['email'];
                 $pro_address=$row_pro['address'];
             $sno++;
         echo "

    <table class='table q'>
    <tbody>
     <tr>
       <td width='11%'><font id='user_result'>$pro_sno</font></td>
       <td width='20%'><font id='user_result'>$pro_name</font></td>
       <td width='28%'><font id='user_result'>$pro_mobile_no</font></td>
       <td width='20%'><font id='user_result'>$pro_email</font></td>
       <td width='28%'><font id='user_result'>$pro_address</font></td>
          </tr>
      </tbody>
    </table>


    ";
  }
  ?>

      </center>

  </div>

<nav class="navbar navbar-inverse" id="bg_2" style="width:88.7%;margin-left:5.7%;margin-top:0.2%;margin-bottom:0.6%;border-bottom-left-radius:0px;border-bottom-right-radius:0px;border-top-left-radius:8px;border-top-right-radius:8px;">
  <div class="container" >
    <p id="footer">devloped by BCE Bhagalpur itsolutation. Website: <a href="bhagalpur.ac.in">bcebhagalpur.ac.in</a></p>
  </div>
</nav>
</div>
</body>
</html>
