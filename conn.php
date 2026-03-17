
<?php 
    $conn=mysqli_connect("localhost","u459015489_cron_job","Shiv@0603","u459015489_cron_job");

    if (!$conn) {
        die("connection Failed");
    }

$date=date("d-M-Y H:i:s");
    $sql = "INSERT INTO u459015489_cron_job (Time)
    VALUES ($date)";

    $res = mysqli_query($conn,$sql);

?>