<?php
session_start();
if(empty($_SESSION['username']))
{
  header('Location:login2.php');
}
if($_SESSION['username']=='incharge')
{
  header('Location:incharge.php');
}
if($_SESSION['username']=='principal')
{
  header('Location:principal.php');
}
 ?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Table 02</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/style.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	</head>




	<body class="u-body">
		<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<div class="wrapper">
		  <header>

			 <nav>
				<div class="menu-icon">
				   <i class="fas fa-bars"></i>
				</div>
				<div class="logo">
				   <h3><b>EMS</b></h3>
				</div>
				<div class="menu">
				   <ul>
					<li><a href="FFFFFF.php">Home</a></li>
					<li><a href="status.php">Venue Status</a></li>
					<li><a href="up.php">Upcoming Events</a></li>
					<li><a href="logoutprocess.php">Logout</a></li>


				   </ul>
				</div>
			 </nav>
			 <script>
			 $(document).ready(function() {
			  $(".menu-icon").on("click", function() {
			  $("nav ul").toggleClass("showing");
			  });
			});
			$(window).on("scroll", function() {
			   if($(window).scrollTop()) {
				 $('nav').addClass('black');
			  }

			   else {
				 $('nav').removeClass('black');
			  }
			});
			</script>

		 </header>
		 </div>

			<section class="head">
				<div class="headin">
				<p>VENUE STATUS</p>
			    </div>
			</section>



	<!--<section class="ftco-section">
		<div class="container">

		<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table">
						  <thead class="thead-dark">
						    <tr>
						      <th>VENUE</th>
						      <th>DATE</th>
						      <th>TIME</th>
						      <th>REQUESTED BY</th>
                              <th>DEPT</th>
						      <th>INCHARGE APPROVAL</th>
						      <th>PRINCIPAL APPROVAL</th>-->
                  <?php
                  $con =mysqli_connect("localhost","root","","emsprojectdata");
                  if(!$con)
                  {
                  die("Could not connect:" . mysql_error());
                  }
                  $username=$_SESSION['username'];
                  $sql="select v.vname,b.edate,b.start,b.end,b.requestedby,b.department,b.inchargeApproval,b.principalApproval from booking b,venues v where b.venueid=v.venueid and  requestedby='$username';";
                  $result = $con->query($sql);
                  echo '<section class="ftco-section">
                		<div class="container">

                			<div class="row">
                				<div class="col-md-12">
                					<div class="table-wrap">
                						<table class="table">
                						  <thead class="thead-dark">
                						    <tr>
                						      <th>VENUE</th>
                						      <th>DATE</th>
                						      <th>TIME</th>
                						      <th>REQUESTED BY</th>
                                              <th>DEPT</th>
                						      <th>INCHARGE APPROVAL</th>
                						      <th>PRINCIPAL APPROVAL</th></tr>
                    						  </thead>
                    						  <tbody>';
                 if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo '<tr class="alert" role="alert"><td scope="row">'.$row["vname"].'</td><td scope="row">'.$row["edate"].'</td><td>'.$row["start"].'-'.$row["end"].'</td><td>'.$row["requestedby"].'</td><td>'.$row["department"].'</td><td>'.$row["inchargeApproval"].'</td><td>'.$row["principalApproval"].'</td></tr>';
  }
}
else {
  echo "0 results";
}
  echo '
</tbody>
</table>
</div>
</div>
</div>
</div>
</section>
</div>';

$con->close();
?>





						    <!--</tr>
						  </thead>
						  <tbody>
						    <tr class="alert" role="alert">
						      <th scope="row">Shambhavi</th>
						      <td>4 Nov 2021 </td>
						      <td>3pm - 4pm</td>
						      <td>Arjun Roa</td>
                              <td>ECE</td>
                              <td>Approved</td>
                              <td>Pending</td>

						    </tr>
						    <tr class="alert" role="alert">
						      <th scope="row">Sadananda</th>
                              <td>6 Nov 2021 </td>
						      <td>3pm - 5pm</td>
						      <td>Suhas MK</td>
                              <td>EEE</td>
                              <td>Approved</td>
                              <td>Pending</td>

						    </tr>
						    <tr class="alert" role="alert">
						      <th scope="row">Sadananda</th>
                              <td>9 Nov 2021 </td>
						      <td>2pm - 5pm</td>
						      <td>Shalini Sharma</td>
                              <td>CSE</td>
                              <td>Pending</td>
                              <td>Pending</td>

						    </tr>
						    <tr class="alert" role="alert">
						      <th scope="row">Sowparnika</th>
						      <td>11 Nov 2021 </td>
						      <td>2pm - 5pm</td>
						      <td>Suahs Kini</td>
                              <td>CSE</td>
                              <td>Pending</td>
                              <td>Pending</td>

						    </tr>
						    <tr class="alert" role="alert">
						      <th scope="row">Phalguni</th>
                              <td>16 Nov 2021 </td>
						      <td>9pm - 1pm</td>
						      <td>Vaibhav Shetty</td>
                              <td>Mech</td>
                              <td>Pending</td>
                              <td>Pending</td>-->



	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>
