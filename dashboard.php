<?php
$pageTitle = "Dashboard";
include 'includes/header.php';
include 'includes/navbar.php';
include 'includes/auth_check.php';
?>

<h2>Your Expenses</h2>
<ul id="expense-list"></ul>

<script src="assets/js/dashboard.js"></script>
<?php include 'includes/footer.php'; ?>
