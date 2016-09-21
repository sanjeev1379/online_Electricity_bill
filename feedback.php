<?php

include("includes/db.php");

?>

<?php
require_once 'includes/connection.php';

@$u_username = htmlentities($_GET['q']);

@$result=mysql_query("select * from registation where username='$u_username'");
if(@(!$result))
echo "Error in query.. <br />";
else {
  while($row=mysql_fetch_array($result,MYSQLI_ASSOC))
  {
    @$name_database=$row['username'];
  }

}

?>
<?php
include("includes/db.php");
include("includes/connection.php");


if(isset($_POST['submit_feedback'])){

  @$feedback=$_POST['feedback'];
  @$valid="true";

  if(!empty($feedback)){
    if(@($password_hash!=$password_again_hash)){

      }else{
      @$query="UPDATE `registation` SET /*`room_no`='@$room_no' ,*/  `feedback`='$feedback',`feedback_status`='$valid' WHERE `username`='$u_username' ";
      $query_pro=mysqli_query($con,$query);
      if($query_pro){
        echo "<script>alert('Thanku! your Feedback is successfully Submitted.')</script>";
        echo  "<script>window.open('feedback.php?q=$u_username','_self')</script>";
      }else{
        /*  header("Location:home.php?q=".$email);*/
      }
   }
  }else{
    echo "<script>alert('All field are Required!')</script>";
    echo  "<script>window.open('feedback.php?q=$u_username','_self')</script>";
  }
}

?>

<!DOCTYPE Html>
<html lang="en">
<head>
  <title>Electrity Bill | Feedback</title>
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
          <li><a id="left" href="view_bill.php?q=<?php echo $u_username ?>">Make Payment</a></li>
          <li class="active"><a id="left" href="#">Feedback</a></li>
          <li><a id="left" href="user.php">Logout</a></li>
        </ul>
      </div>
    </div>
</nav>
    <div class="container" style="border-bottom:solid 1px white;" id="bg_1">
      <a href="index.php"><img style="margin-left:1%; margin-top:1%;" src="image/home.jpg" class="img-responsive" width="4%" height="4%" /></a>
      <center><div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title" id="log">Feedback :</h2>
          </div>
      <div class="modal-body">
        <form role="form" method="post" action="" enctype="multiplepart/form">
          <div class="form-group">
              <span class='label label-info' id="n">  Consumer Id </span>
              <input type="text" name="consumer" class="form-control" value="<?php echo @$name_database ?>" style="width:35%;" disabled />
            </div>
            <div class="form-group">
              <span class='label label-info' id="n">  Feedback </span>
              <textarea class="form-control" rows="4" name="feedback" id="comment" placeholder="Enter Your Feedback..." style="width:35%;" ></textarea>
            </div>
      </div>
      <div class="modal-footer">
        <input type="submit" name="submit_feedback" id="bt" class="btn btn-primary btn-block" value="Submit"  style="width:64%; margin-left:18%;"/>
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
