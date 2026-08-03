<?php
$pageTitle = "Groups";
include 'includes/header.php';
include 'includes/navbar.php';
include 'includes/auth_check.php';
?>

<h2>Create Group</h2>
<form id="create-group-form" method="POST" action="api/create_group.php">
  <div class="form-group">
    <label>Group Name</label>
    <input type="text" name="group_name" required>
  </div>
  <div class="form-group">
    <label>Description</label>
    <textarea name="description" required></textarea>
  </div>
  <button type="submit">Create Group</button>
</form>

<script src="assets/js/group.js"></script>
<?php include 'includes/footer.php'; ?>
