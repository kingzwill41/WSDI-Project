<?php
  //This page is linked to the book-appointment page
  //This page is used to capture the selected doctor's StaffID to store in the appointment table of the database
  include("include/config.php");

  if(!empty($_POST["doctor"])) 
  {
    $name = $_POST['doctor'];
    $query = "select StaffID from staff where Name = '$name'";
    $sql=mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($sql))
    {?>
      <option value="<?php echo htmlentities($row['StaffID']); ?>"><?php echo htmlentities($row['StaffID']); ?></option>
      <?php
    }
  }

?>

