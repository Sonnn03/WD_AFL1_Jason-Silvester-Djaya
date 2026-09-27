<?php
session_start();
unset($_SESSION['officeEmployeeList']); // hapus data pairing Office-Employee yang lama
unset($_SESSION['officeList']);         // hapus data Office lama juga (kalau ada sisa)
header("Location: office.php");
exit;