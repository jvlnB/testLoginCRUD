<?php
session_start();

      session_destroy();
      unset($_SESSION['authenticated']);
      header("location: ../index.php?loggedout");

?>