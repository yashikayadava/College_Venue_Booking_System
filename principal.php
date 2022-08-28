<!doctype html>
<html lang="en">
  <head>
  	<title>Admin Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="adminpage.css">
	<link rel="stylesheet" href="css/style.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
input[type=text]{
  background-color:black;
  color:white;
  width:90px;
  border:none;
}
</style>
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
				<p >REQUESTS</p>
			    </div>
			</section>



	<section class="ftco-section">
		<div class="container">

			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table">
						  <thead class="thead-dark">
						    <tr>
						      <th>VENUE</th>
						      <th>DATE</th>
						      <th>START TIME</th>
                  <th>END TIME</th>
						      <th>REQUESTED BY</th>
                              <th>DEPT</th>
						      <th>INCHARGE APPROVAL</th>
                  <th>PRINCIPAL APPROVAL</th>



						    </tr>
						  </thead>
						  <tbody>
                <?php
                $con =mysqli_connect("localhost","root","","emsprojectdata");
                if(!$con)
                {
                die("Could not connect:" . mysql_error());
                }
                $sql="select v.vname,v.venueid,b.edate,b.start,b.end,b.requestedby,b.department,b.inchargeApproval from booking b,venues v where b.venueid=v.venueid and principalApproval='pending';";
                $result = $con->query($sql);
               if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            $vname=$row['vname'];
            $date=$row['edate'];
            $start=$row['start'];
            $end=$row['end'];
            $dept=$row['department'];
            $by=$row["requestedby"];
            $in=$row['inchargeApproval'];
          echo '<tr class="alert" role="alert" ><form action="" method="post"><td scope="row">'.'<input type="text" name="vname"  value="'.$vname.'"readonly></td><td scope="row">'.'<input type="text" name="date" value="'.$date.'" readonly></td><td><input type="text"  name="start" value="'.$start.'" readonly></td><td><input type="text" name="end" value="'.$end.'"readonly></td><td><input type="text"  name="by" value="'.$by.'" readonly></td><td><input type="text" name="dept"  value="'.$dept.'" readonly></td><td><input type="text" name="incharge" value="'.$in.'" readonly></td><td><input class="principal" type="submit" name="approve" value="Approve"></td></form></tr>';
          }
          }
          else {
          echo "0 Request pending";
          }
        if(isset($_POST['approve']))
        {  $vname=$_POST['vname'];
          $date=$_POST['date'];
          $start=$_POST['start'];
          $end=$_POST['end'];
$sql1="update booking set principalApproval='approved' where vname='$vname' and edate='$date' and start=$start and end=$end;";
  $result = $con->query($sql1);
}
          $con->close();
          ?>
   <!--<tr class="alert" role="alert">
						      <th scope="row">Shambhavi</th>
						      <td>4 Nov 2021 </td>
						      <td>3pm - 4pm</td>
						      <td>Arjun Roa</td>
                              <td>ECE</td>
                              <td><button class="incharge" type="submit" style="background-color:rgb(181, 148, 212); font-size:18px; font-family:Calibri;">Approve</button></td>
                              <td><button class="incharge" type="submit" style="background-color:rgb(181, 148, 212); font-size:18px; font-family:Calibri;">Approve</button></td>

						    </tr>
						    <tr class="alert" role="alert">
						      <th scope="row">Sadananda</th>
                              <td>6 Nov 2021 </td>
						      <td>3pm - 5pm</td>
						      <td>Suhas MK</td>
                              <td>EEE</td>

                              <td><button class="incharge" type="submit" style="background-color:rgb(181, 148, 212); font-size:18px; font-family:Calibri;">Approve</button></td>
                              <td><button class="incharge" type="submit" style="background-color:rgb(181, 148, 212); font-size:18px; font-family:Calibri;">Approve</button></td>

						    </tr>
						    <tr class="alert" role="alert">
						      <th scope="row">Sadananda</th>
                              <td>9 Nov 2021 </td>
						      <td>2pm - 5pm</td>
						      <td>Shalini Sharma</td>
                              <td>CSE</td>
                              <td><button class="incharge" type="submit" style="background-color:rgb(181, 148, 212); font-size:18px; font-family:Calibri;">Approve</button></td>
                              <td><button class="incharge" type="submit" style="background-color:rgb(181, 148, 212); font-size:18px; font-family:Calibri;">Approve</button></td>

						    </tr>
						    <tr class="alert" role="alert">
						      <th scope="row">Sowparnika</th>
						      <td>11 Nov 2021 </td>
						      <td>2pm - 5pm</td>
						      <td>Suahs Kini</td>
                              <td>CSE</td>
                              <td><button class="incharge" type="submit" style="background-color:rgb(181, 148, 212); font-size:18px; font-family:Calibri;">Approve</button></td>
                              <td><button class="incharge" type="submit" style="background-color:rgb(181, 148, 212); font-size:18px; font-family:Calibri;">Approve</button></td>

						    </tr>
						    <tr class="alert" role="alert">
						      <th scope="row">Phalguni</th>
                              <td>16 Nov 2021 </td>
						      <td>9pm - 1pm</td>
						      <td>Vaibhav Shetty</td>
                              <td>Mech</td>
                              <td><button class="incharge" type="submit" style="background-color:rgb(181, 148, 212); font-size:18px; font-family:Calibri;">Approve</button></td>
                              <td><button class="incharge" type="submit" style="background-color:rgb(181, 148, 212); font-size:18px; font-family:Calibri;">Approve</button></td>
-->
						    </tr>
						  </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>
