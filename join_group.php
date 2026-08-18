<?php
include '../config/db.php';
include '../config/session.php';

$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $group_id = $_POST['group_id'];
    $user_id  = $_SESSION['user_id'] ?? 1;

    $stmt = $conn->prepare("INSERT INTO group_members (group_id, user_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $group_id, $user_id);

    if ($stmt->execute()) {
        $message = "✅ Joined group!";
    } else {
        $message = "❌ Failed to join group: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Join Group</title>
  <style>
    body { font-family: Arial; background:#f4f7fc; }
    .box { width:400px; margin:50px auto; background:#fff; padding:20px; border-radius:8px; box-shadow:0 0 10px #ccc; }
    input,button { width:100%; padding:10px; margin:8px 0; }
    button { background:#28a745; color:#fff; border:none; border-radius:4px; }
  </style>
</head>
<body>
<div class="box">
  <h2>Join Group</h2>
  <form method="POST">
    <input type="number" name="group_id" placeholder="Group ID" required>
    <button type="submit">Join Group</button>
  </form>
  <p><?php echo $message; ?></p>
</div>
</body>
</html>
