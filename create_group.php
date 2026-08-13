<?php
include '../config/db.php';
include '../config/session.php';

$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $group_name  = $_POST['group_name'];
    $description = $_POST['description'];
    $user_id     = $_SESSION['user_id'] ?? 1;

    $stmt = $conn->prepare("INSERT INTO groups (group_name, description, created_by) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $group_name, $description, $user_id);

    if ($stmt->execute()) {
        $message = "✅ Group created!";
    } else {
        $message = "❌ Failed to create group: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Create Group</title>
  <style>
    body { font-family: Arial; background:#f4f7fc; }
    .box { width:400px; margin:50px auto; background:#fff; padding:20px; border-radius:8px; box-shadow:0 0 10px #ccc; }
    input,textarea,button { width:100%; padding:10px; margin:8px 0; }
    button { background:#007bff; color:#fff; border:none; border-radius:4px; }
  </style>
</head>
<body>
<div class="box">
  <h2>Create Group</h2>
  <form method="POST">
    <input type="text" name="group_name" placeholder="Group Name" required>
    <textarea name="description" placeholder="Description" required></textarea>
    <button type="submit">Create Group</button>
  </form>
  <p><?php echo $message; ?></p>
</div>
</body>
</html>
