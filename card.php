<?php

include("includes/db.php");

?>

<?php
require_once 'includes/connection.php';

@$u_username = htmlentities($_GET['q']);

$result=mysql_query("select * from registation where username='$u_username'");
if(!$result)
echo "Error in query.. <br />";
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
  <title>Electrity Bill | Details</title>
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
      <div class="navbar-collapse" id="mainNavBar" style="margin-right:3%;">
        <ul class="nav navbar-nav navbar-right">
          <li><a id="left" href="view_bill_p.php?q=<?php echo $u_username ?>">View Bill</a></li>
          <li class="active"><a id="left" href="#">Make Payment</a></li>
          <li><a id="left" href="feedback.php?q=<?php echo $u_username ?>">Feedback</a></li>
          <li><a id="left" href="user.php">Logout</a></li>
        </ul>
      </div>
    </div>
</nav>
    <div class="container" style="border-bottom:solid 1px white;" id="bg_1">
      <a href="index.php"><img style="margin-left:1%; margin-top:1%;" src="image/home.jpg" class="img-responsive" width="4%" height="4%" /></a>
      <center>
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title" id="log" style="margin-left:5%">Customer Details :</h2>
          </div>
          <table class="table q" border="1" style="background-color:red;">
         <thead>
           <tr>
             <td id="k"style="color:white;">Service Number</td>
             <td id="k" style="color:white;">Name</td>
             <td id="k" style="color:white;">Address</td>
             <td id="k" style="color:white;">Contact</td>
             <td id="k" style="color:white;">Month</td>
             <td id="k" style="color:white;">Amount</td>
             <td id="k" style="color:white;">Status</td>
           </tr>
         </thead>
       </table>
       <?php

            $con=mysqli_connect("localhost","root","","electricity");

           if(mysqli_connect_errno()){

            echo "Field to connect to Mysql:" .mysqli_connect_error();

         }

        global $con;
        @$bill_no = htmlentities($_GET['bill_no']);
        $get_pro="select bill_no,name,address,mobile_no,month,unit_consumed,status from registation, bill where registation.username=bill.bill_name AND bill.bill_name='$u_username' AND bill.bill_no='$bill_no'";
           $run_pro=mysqli_query($con,$get_pro);
              while($row_pro=mysqli_fetch_array($run_pro)){
    //$pro_student_id=$row_pro['student_id'];
                 $pro_bill_no=$row_pro['bill_no'];
                  $pro_name=$row_pro['name'];
                  $pro_address=$row_pro['address'];
                  $pro_mobile_no=$row_pro['mobile_no'];
                 $pro_month=$row_pro['month'];
                 $pro_unit_consumed=$row_pro['unit_consumed'];
                 $pro_status=$row_pro['status'];
         echo "

    <table class='table q'>
    <tbody>
     <tr>
     <td width='22%'><font id='user_result'>$pro_bill_no</font></td>
     <td width='12%'><font id='user_result'>$pro_name</font></td>
    <td width='16%'><font id='user_result'>$pro_address</font></td>
     <td width='15%'><font id='user_result'>$pro_mobile_no</font></td>
     <td width='10%'><font id='user_result'>$pro_month</font></td>
     <td width='14%'><font id='user_result'>$pro_unit_consumed</font></td>
     <td width='20%'><font id='user_result'>$pro_status</font></td>
          </tr>
      </tbody>
    </table>


    ";
  }
  ?>

       <div class="modal-footer">
         <a href="#" style="text-decoration:none;"><input type="submit" name="signin_submit" id="bt" class="btn btn-primary btn-block" value="Payment"  style="width:44%; margin-left:38%;"/></a>
       </div>
        <form action="card_details.php?q=<?php echo $u_username ?>&bill_no=<?php echo $bill_no ?>" method="post" enctype="multipart/form-data" >
          <div class="form-group">
               <label class="checkbox">
                 <a href="card_details.php?q=<?php echo $u_username ?>&bill_no=<?php echo $bill_no ?>" style="text-decoration:none;margin-left:13%;"><input type="checkbox" value="">Credit Card</a>
               </label>
               <label class="checkbox">
                 <a href="card_details.php?q=<?php echo $u_username ?>&bill_no=<?php echo $bill_no ?>" style="text-decoration:none;margin-left:12.7%;"><input type="checkbox" value="">Debit Card</a>
               </label>
               <label class="checkbox">
                 <a href="card_details.php?q=<?php echo $u_username ?>&bill_no=<?php echo $bill_no ?>" style="text-decoration:none;margin-left:13.8%;"><input type="checkbox" value="">Net Banking</a>
               </label>
             </div>
     </form>
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

<?php

if(isset($_POST['card_mode'])){
  echo  "<script>window.open('card_details.php?q=$u_username','_self')</script>";
}
?>
