<?php

session_start();
require('../fpdf.php');
$_SESSION['pdf']->Output();
?>
