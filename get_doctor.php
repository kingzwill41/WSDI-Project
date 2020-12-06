<?php
  //This page is linked to the book-appointment page
  //This page is used to capture the selected doctor's StaffID to store in the appointment table of the database

  if(!empty($_POST["doctor"])) 
  {

    $sql=mysqli_query($conn,"select StaffID from staff where Name='".$_POST['doctor']."'");
    while($row=mysqli_fetch_array($sql))
    {?>
    <option value="<?php echo htmlentities($row['StaffID']); ?>"><?php echo htmlentities($row['StaffID']); ?></option>
      <?php
    }
  }

?>

