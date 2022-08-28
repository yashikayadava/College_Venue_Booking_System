<?php
session_start();
if(empty($_SESSION['username']))
{
  header('Location:login2.php');
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Page</title>
    <link rel="stylesheet" href="venue.css">
</head>
<body>

    <div class="container">
    <form action="phalgunislot.php" method="post" style="border:1px solid rgb(0, 0, 0)" class="form">
        <a href="FFFFFF.php" class="close">&times;</a>
        <h1>Phalguni Hall</h1>
        <div class="input">
            <label for="datepick"><b>Choose a date :</b></label>
            <input type="date" name="date" id= "datepick">
       </div>
      <!-- <div class="buttonslot">
         <a href="sowparnikaslot.php">
          <button class="button">Available Slots</button>
          </a>

       </div>-->
       <div class="department">
          <b> Department :</b><br>
            <select name="department" id="dept" required>
             <option value="AI/ML">Artificial Intelligence and Machine Learning</option>
             <option value="BT">Biotechnology Engineering</option>
             <option value="CV">Civil Engineering</option>
             <option value="CSE">Computer Science and Engineering</option>
             <option value="CC">Computer and Communication Engineering</option>
             <option value="EEE">Electrical and Electronics Engineering</option>
             <option value="ECE">Electronics and Communication Engineering</option>
             <option value="ISE">Information Science and Engineering</option>
             <option value="Robotics/AI">Robotics and Artificial Intelligence</option>
             <option value="ME">Mechanical Engineering</option>
            </select>
        </div>
       <div class="input-group">
           <input type="text" id="ename" name="ename" required>
           <label for="ename">Enter the event name</label>
         </div>
         <p> </p>
         <div class="input-group">
             <input type="text" id="eid" name="eid" required>
             <label for="eid">Enter the event id</label>
           </div>
           <p> </p>
       <div class="buttons">
          <input type="submit" class="button" value="Slots">
          <p id="demo"></p>
          <script>
             function bookevent() {
             var txt;
             var r = confirm("Confirm booking");
             if (r == true) {
               alert("Your slot has been booked");
             }
             else {
               alert( "Booking canceled");
             }
           }
          </script>


  </div>

</form>
    </div>


</body>
</html>
