<?php
if (!isset($_SESSION['authenticated']))
{
    echo 'Please login to continue';
    echo ' <br>Already have an account?<a href="../login.php"> Login</a>';
        exit(0);
       
}

?>