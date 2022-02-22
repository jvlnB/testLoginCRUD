<?php
session_start();
require_once('../dbconn.php');

if (isset($_POST['login']))
{
    $name = $_POST['uname'];
    $pass = $_POST['pass'];


    $login_qry= sqlsrv_query($oConn, "SELECT * FROM user_login WHERE username LIKE '$name'AND password LIKE '$pass'");  
    
    while($row= sqlsrv_fetch_array($login_qry)){
            $_SESSION['userID'] = $row['id'];
               $_SESSION['user'] = $row['username'];
               $dbPass = $row['password'];
        }

    if($login_qry>0)
    {
               if ($pass==$dbPass)
               {
                    $_SESSION['authenticated']=TRUE;
                    header("location:../index.php?loggedin");
                    exit();
                     } 
                        else 
                            {
                                header("location:../login.php?invalidpass");
                                exit();
                            }
    }
    else 
    {
        header("location:../login.php?invalidemail");
        exit();
    }
}