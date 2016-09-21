<?php

include("includes/db.php");

?>

<?php
require_once 'includes/connection.php';

@$search_username = htmlentities($_GET['username']);
@$admin = htmlentities($_GET['q']);

$result=mysql_query("select * from admin_login where username='$admin'");
if(!$result)
echo "Error in query.. <br />";
else {
  while($row=mysql_fetch_array($result,MYSQLI_ASSOC))
  {
    @$name_database=$row['username'];
  }

}

?>

<?php

if(isset($_POST['search'])){
  $search_username = $_POST['username'];
  $result_username=mysql_query("select name from registation where username LIKE '%$search_username%' ");
  if(!$result_username)
  echo "Error in query.. <br />";
  else {
    header("Location:bill.php?q=$admin&username=".$search_username);
  }
}
@mysqli_free_result($result_username);
@mysqli_close($dbh);

?>

<?php
include("includes/db.php");
include("includes/connection.php");


if(isset($_POST['calculate'])){

@$search_username = htmlentities($_GET['username']);
  @$bill_no=$_POST['bill_no'];
  @$month=$_POST['month'];
  @$date_e=$_POST['date_e'];
  @$unit_consumed=$_POST['unit_consumed'];
  @$update_unit_cost=(($unit_consumed)*9);
  @$status="Not Paid";
  if(!empty($bill_no)&&!empty($unit_consumed)){
    if(@($password_hash!=$password_again_hash)){

      }else{
        $query="INSERT into bill (bill_name,bill_no,month,date_e,unit_consumed,status) values('$search_username','$bill_no','$month','$date_e','$update_unit_cost','$status')";
        $query_pro=mysqli_query($con,$query);
        //@$query="UPDATE `registation` SET /*`room_no`='@$room_no' ,*/  `bill_no`='$bill_no',`month`='$month',`date_e`='$date_e',`unit_consumed`='$update_unit_cost',`status`='$status' WHERE `username`='$search_username' ";
      //  $query_pro=mysqli_query($con,$query);
        if($query_pro){
          echo "<script>alert('Consumer Bill Is Successfully Submitted!')</script>";
          echo  "<script>window.open('bill.php?q=$admin&username=$search_username','_self')</script>";
        //header("Location:bill.php?q=$admin&username=".$search_username);
      }else{
        /*  header("Location:home.php?q=".$email);*/
      }
   }
  }else{
    echo "<script>alert('All field are Required!')</script>";
    echo  "<script>window.open('bill.php?q=$admin','_self')</script>";
  }
}

?>




<!DOCTYPE Html>
<html lang="en">
<head>
  <title>Electrity Bill | Bill</title>
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
          <li><a id="left" href="customer.php?q=<?php echo $admin ?>">View Customers</a></li>
          <li class="active"><a id="left" href="#">Calculate Bill</a></li>
          <li><a id="left" href="update.php?q=<?php echo $admin ?>">Update</a></li>
          <li><a id="left" href="view_feedback.php?q=<?php echo $admin ?>">View Feedback</a></li>
          <li><a id="left" href="admin.php">Logout</a></li>
        </ul>
      </div>
    </div>
</nav>
    <div class="container" style="border-bottom:solid 1px white;" id="bg_1">
      <a href="index.php"><img style="margin-left:1%; margin-top:1%;" src="image/home.jpg" class="img-responsive" width="4%" height="4%" /></a>
      <center><div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title" id="log">Electricty Bill Calculation :</h2>
          </div>
      <div class="modal-body">
        <?php

            $con=mysqli_connect("localhost","root","","electricity");

           if(mysqli_connect_errno()){

            echo "Field to connect to Mysql:" .mysqli_connect_error();

         }

        global $con;

        @$search_username = htmlentities($_GET['username']);

          $get_pro="select name,email from registation where username LIKE '%$search_username' ";
          $run_pro=mysqli_query($con,$get_pro);

              while($row_pro=mysqli_fetch_array($run_pro)){
    //$pro_student_id=$row_pro['student_id'];
                 @$pro_name=$row_pro['name'];
                 @$pro_email=$row_pro['email'];
                }
           ?>

        <form role="form" method="POST" action="bill.php?q=<?php echo $admin ?>" enctype="multiplepart/form">
          <div class="form-group">
            <span class='label label-info' id="n">  Consumer Id </span>
            <input type="text" name="username" class="form-control" value="<?php echo @$search_username ?>" style="width:35%;">
          </div>
          <div class="modal-footer">
            <input type="submit" name="search" id="bt" class="btn btn-primary btn-block" value="Search"  style="width:64%; margin-left:18%;"/>
          </div>
        </form>
          <form role="form" method="POST" action="" enctype="multiplepart/form">
            <div class="form-group">
              <span class='label label-info' id="n">  Consumer Name </span>
              <input type="text" name="consumer_name" class="form-control" value="<?php echo @$pro_name ?>" style="width:35%;" >
            </div>
            <div class="form-group">
              <span class='label label-info' id="n">  Bill No </span>
              <input type="text" name="bill_no" class="form-control" placeholder="Enter Bill/Service No..." style="width:35%;" >
            </div>
            <div class="form-group">
              <span class='label label-info' id="n">  Month </span>
              <select class="form-control" id="sel1" name="month" placeholder="Enter Month..." style="width:35%;">
              <option>Select Month</option>
              <option >January</option>
              <option>February</option>
              <option >March</option>
              <option>April</option>
              <option >May</option>
              <option>June</option>
              <option >July</option>
              <option>August</option>
              <option >September</option>
              <option>October</option>
              <option >November</option>
              <option>December</option>
            </select>
            </div>
            <div class="form-group">
              <span class='label label-info' id="n">  Expiry Date </span>
              <input type="date" name="date_e" class="form-control" placeholder="Enter Expiry date..." style="width:35%;" >
            </div>
            <div class="form-group">
              <span class='label label-info' id="n">  Unit Consumed </span>
              <input type="text" name="unit_consumed" class="form-control" placeholder="1 kilowatt (kWh) cost 9" style="width:35%;" >
            </div>
      </div>
      <div class="modal-footer">
        <input type="submit" name="calculate" id="bt" class="btn btn-primary btn-block" value="Calculate"  style="width:64%; margin-left:18%;"/>
      </div>
      </form>
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
