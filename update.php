<?php

include("includes/db.php");

?>

<?php
require_once 'includes/connection.php';

@$admin = htmlentities($_GET['q']);

$result=mysql_query("select * from admin_login where username='$admin'");
if(!$result){

}
else {
  while($row=mysql_fetch_array($result,MYSQLI_ASSOC))
  {
    @$name_database=$row['username'];
  }

}

?>
<?php
require_once 'includes/connection.php';

$result=mysql_query("select * FROM update");
if(!$result){

}
else {
  while($row=mysql_fetch_array($result,MYSQLI_ASSOC))
  {
    @$id_database=$row['id'];
    @$cost_database=$row['cost'];

    }

}

?>
<?php
if(isset($_POST['update'])){

  $cost=$_POST['cost'];

  if(/*!empty(@$room_no)&&*/!empty($cost)){
    if(@($password_hash!=$password_again_hash)){

    }else{
      @$update_cost="UPDATE `update` SET /*`room_no`='@$room_no' ,*/ `cost`='$cost' ";
      $update_cost_pro=mysqli_query($con,$update_cost);
      if($update_cost_pro){
        echo "<script>alert('Thanku! Per Unit Cost is Successfully Updated !.')</script>";
        echo  "<script>window.open('update.php?q=$admin','_self')</script>";
      }else{
        /*  header("Location:home.php?q=".$email);*/
      }
    }

  }else{
    echo "<script>alert('All field are Required!')</script>";
    echo  "<script>window.open('update.php?q=$admin','_self')</script>";
  }
}
?>

<!DOCTYPE Html>
<html lang="en">
<head>
  <title>Electrity Bill | Update</title>
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
          <li><a id="left" href="bill.php?q=<?php echo $admin ?>">Calculate Bill</a></li>
          <li class="active"><a id="left" href="#">Update</a></li>
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
            <h2 class="modal-title" id="log"></h2>
          </div>
      <div class="modal-body">
        <form role="form" method="post" action="" enctype="multiplepart/form">
          <div id="personal" style="height:6%;">
             Update Per Unit Cost
          </div><br />
          <div class="form-group">
              <span class='label label-info' id="n" style="margin-right:13%;">  1 Kilowatt-hour (kWh) cost </span>
              <input type="text" name="cost" class="form-control" placeholder="Enter per unit cost...." style="width:35%;" />
            </div>
      </div>
      <div class="modal-footer">
        <input type="submit" name="update" id="bt" class="btn btn-primary btn-block" value="Update"  style="width:64%; margin-left:18%;"/>
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
