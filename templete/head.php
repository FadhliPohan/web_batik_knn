<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/png" href="assets/img/logo_sensor.png" />

    <!-- Core Css -->
    <link rel="stylesheet" href="assets_modern/css/styles.css" />
    <link rel="stylesheet" href="assets_modern/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" />
    <link href="assets/css/demo.css" rel="stylesheet" />

    <title>BATIK</title>
</head>

<body>

<?php
if (version_compare(phpversion(), "5.3.0", ">=")  == 1)
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
  error_reporting(E_ALL & ~E_NOTICE);
?>
<?php
session_start();
//error_reporting(0);
require_once "konmysqli.php";

$mnu = "";
if (isset($_GET["mnu"])) {
  $mnu = $_GET["mnu"];
}

date_default_timezone_set("Asia/Jakarta");


if (!isset($_SESSION["cid"])) {
  die("<script>location.href='login.php'</script>");
}

$kp1 = "Januari";
$kp2 = "Februari";
$kp3 = "Maret";
$kp4 = "April";
$kp5 = "Mei";
$kp6 = "Juni";
$kp7 = "Juli";
$kp8 = "Agustus";
$kp9 = "September";
$kp10 = "Oktober";
$kp11 = "November";
$kp12 = "Desember";

$ks1 = "Jan";
$ks2 = "Feb";
$ks3 = "Mar";
$ks4 = "Apr";
$ks5 = "Mei";
$ks6 = "Jun";
$ks7 = "Jul";
$ks8 = "Agu";
$ks9 = "Sep";
$ks10 = "Okt";
$ks11 = "Nov";
$ks12 = "Des";

?>

