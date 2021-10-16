<?php
require('config.php');
session_start();

    $sql = "INSERT INTO c_invoice(c_invoice_date, c_invoice_price, c_day, member_id) VALUES ('$DATE', '$subTotal', '$day', '$memberID')";
    if($conn->query($sql)===TRUE){
			echo "<script> alert('New Invoice is created successfully!')</script>";
			echo "<script> window.location='viewinvoice.php'</script>";
	}
		

?>