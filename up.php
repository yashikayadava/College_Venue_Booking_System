<?php
session_start();
if(empty($_SESSION['username']))
{
  header('Location:login2.php');
}
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Table 01</title>
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
				<p>UPCOMING EVENTS</p>
			    </div>
			</section>

      <?php
      $con =mysqli_connect("localhost","root","","emsprojectdata");
      if(!$con)
      {
      die("Could not connect:" . mysql_error());
      }
      $username=$_SESSION['username'];
      $sql="select b.edate,b.ename,v.vname,b.department from booking b,venues v where b.venueid=v.venueid and b.edate>=curdate();";
      $result = $con->query($sql);
      echo '<section class="ftco-section">
        <div class="container">

          <div class="row">
            <div class="col-md-12">
              <div class="table-wrap">
                <table class="table">
                  <thead class="thead-dark">
                    <tr>

                      <th>DATE</th>
                      <th>EVENT</th>
                      <th>VENUE</th>
                      <th>DEPARTMENT</th></tr>
                      </thead>
                      <tbody>';
      if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
      echo '<tr class="alert" role="alert"><td scope="row">'.$row["edate"].'</td><td scope="row">'.$row["ename"].'</td><td>'.$row["vname"].'</td><td>'.$row["department"].'</td></tr>';
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


<!--	<section class="ftco-section">
		<div class="container">

			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table">
						  <thead class="thead-dark">
						    <tr>
						      <th>DATE</th>
						      <th>EVENT</th>
						      <th>VENUE</th>
						      <th>DEPARTMENT</th>

						    </tr>
						  </thead>
						  <tbody>
						    <tr class="alert" role="alert">
						      <th scope="row">4 Nov 2021</th>
						      <td>Rotary Club Event </td>
						      <td>Sambhram Auditorium</td>
						      <td>EC</td>

						    </tr>
						    <tr class="alert" role="alert">
						      <th scope="row">8 Nov 2021</th>
						      <td>Rotary Club Event</td>
						      <td>Phalguni Seminar Hall</td>
						      <td>CSE</td>

						    </tr>
						    <tr class="alert" role="alert">
						      <th scope="row">12 Nov 2021</th>
						      <td>Rotary Club Event</td>
						      <td>Sadananda Auditorium</td>
						      <td>ISE</td>

						    </tr>
						    <tr class="alert" role="alert">
						      <th scope="row">25 Dec 2021</th>
						      <td>CSI Meet</td>
						      <td>Sambhram Auditorium</td>
						      <td>CSE</td>

						    </tr>
						    <tr class="alert" role="alert">
						      <th scope="row">26 Dec 2021</th>
						      <td>CSI Meet</td>
						      <td>Phalguni Seminar Hall</td>
						      <td>CSE</td>

						    </tr>
						  </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>-->

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>
