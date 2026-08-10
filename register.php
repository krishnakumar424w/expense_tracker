<?php
$pageTitle = "Register";
include 'includes/header.php';
include 'includes/navbar.php';
?>

<h2>Create Account</h2>
<form method="POST" action="api/register.php">
  <div class="form-group">
    <label>Username</label>
    <input type="text" name="username" required>
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="email" name="email" required>
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" name="password" required>
  </div>
  <button type="submit">Register</button>
</form>

<?php include 'includes/footer.php'; ?>
