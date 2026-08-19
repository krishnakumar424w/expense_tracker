<?php
include '../config/db.php';
include '../config/session.php';

$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $expense_id = $_POST['expense_id'];

    $stmt = $conn->prepare("UPDATE expenses SET status='paid' WHERE id=?");
    $stmt->bind_param("i", $expense_id);

    if ($stmt->execute()) {
        $message = "✅ Expense marked as paid!";
    } else {
        $message = "❌ Failed to update status: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Mark Expense Paid</title>
  <style>
    body { font-family: Arial; background:#f4f7fc; }
    .box { width:400px; margin:50px auto; background:#fff; padding:20px; border-radius:8px; box-shadow:0 0 10px #ccc; }
    input,button { width:100%; padding:10px; margin:8px 0; }
    button { background:#17a2b8; color:#fff; border:none; border-radius:4px; }
  </style>
</head>
<body>
<div class="box">
  <h2>Mark Expense Paid</h2>
  <form method="POST">
    <input type="number" name="expense_id" placeholder="Expense ID" required>
    <button type="submit">Mark Paid</button>
  </form>
  <p><?php echo $message; ?></p>
</div>
</body>
</html>
