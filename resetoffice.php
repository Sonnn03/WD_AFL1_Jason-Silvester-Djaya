<?php
session_start();
unset($_SESSION['officeEmployeeList']); 
header("Location: office.php");
exit;