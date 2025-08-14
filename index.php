<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Task Manager</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h1>Task Manager</h1>
    <form id="taskForm">
        <input type="text" id="taskTitle" placeholder="New Task" required>
        <button type="submit">Add</button>
    </form>
    <div id="taskList"></div>
    <a href="logout.php">Logout</a>
    <script src="assets/script.js"></script>
</body>
</html>
