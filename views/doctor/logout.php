<?php
    session_start();
    include('include/config.php');
    $_SESSION['username']=="";
    session_unset();
    //session_destroy();
    $_SESSION['errmsg']="You have successfully loggedout";
?>
<script language="javascript">
    document.location="../../index.php";
</script>
