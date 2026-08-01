<?php
$pageTitle = "Add Expense";
include 'includes/header.php';
include 'includes/navbar.php';
include 'includes/auth_check.php';
?>

<h2>Add Expense</h2>
<form method="POST" action="api/add_expense.php">
  <div class="form-group">
    <label>Expense Name</label>
    <input type="text" name="expense_name" required>
  </div>
  <div class="form-group">
    <label>Amount</label>
    <input type="number" step="0.01" name="amount" required>
  </div>
  <div class="form-group">
    <label>Date</label>
    <input type="date" name="date" required>
  </div>
  <button type="submit">Add Expense</button>
</form>

<?php include 'includes/footer.php'; ?>
