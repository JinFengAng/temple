<?php
session_start();
session_unset();
echo "<script>alert('You have logout successfully!')</script>";
echo "<script> window.location='index.html'</script>";
?>
?>