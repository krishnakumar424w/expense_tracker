<?php
include '../config/db.php';
include '../config/session.php';

$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id      = $_SESSION['user_id'] ?? 1; // fallback for testing
    $expense_name = $_POST['expense_name'];
    $amount       = $_POST['amount'];
    $date         = $_POST['date'];

    $stmt = $conn->prepare("INSERT INTO expenses (user_id, expense_name, amount, date) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isds", $user_id, $expense_name, $amount, $date);

    if ($stmt->execute()) {
        $message = "✅ Expense added!";
    } else {
        $message = "❌ Failed to add expense: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Expense API</title>
  <style>
    body { font-family: Arial; background:#f4f7fc; }
    .box { width:400px; margin:50px auto; background:#fff; padding:20px; border-radius:8px; box-shadow:0 0 10px #ccc; }
    input,button { width:100%; padding:10px; margin:8px 0; }
    button { background:#007bff; color:#fff; border:none; border-radius:4px; }
  </style>
</head>
<body>
<div class="box">
  <h2>Add Expense</h2>
  <form method="POST">
    <input type="text" name="expense_name" placeholder="Expense Name" required>
    <input type="number" step="0.01" name="amount" placeholder="Amount" required>
    <input type="date" name="date" required>
    <button type="submit">Add Expense</button>
  </form>
  <p><?php echo $message; ?></p>
</div>
</body>
</html>
