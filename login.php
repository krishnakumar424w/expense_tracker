<?php
$pageTitle = "Login";
include 'includes/header.php';
include 'includes/navbar.php';
?>

<h2>Login</h2>
<form method="POST" action="api/login.php">
  <div class="form-group">
    <label>Email</label>
    <input type="email" name="email" required>
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" name="password" required>
  </div>
  <button type="submit">Login</button>
</form>

<?php include 'includes/footer.php'; ?>
