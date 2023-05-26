<h2>Create Task</h2>
<form action="create_task.php" method="POST">
  <input type="text" name="title" placeholder="Title" required><br>
  <textarea name="description" placeholder="Description"></textarea><br>
  <input type="date" name="due_date" required><br>
  <select name="status">
    <option value="Pending">Pending</option>
    <option value="In Progress">In Progress</option>
    <option value="Completed">Completed</option>
  </select><br>
  <input type="submit" name="create" value="Create Task">
</form>

<?php
// Check if the task creation form is submitted
if (isset($_POST['create'])) {
  // Get form data
  $title = $_POST['title'];
  $description = $_POST['description'];
  $due_date = $_POST['due_date'];
  $status = $_POST['status'];

  // Connect to the database
  $conn = mysqli_connect("localhost", "username", "password", "task_manager");

  // Insert task data into the database
  $query = "INSERT INTO tasks (title, description, due_date, status) VALUES ('$title', '$description', '$due_date', '$status')";
  mysqli_query($conn, $query);

  // Close the database connection
  mysqli_close($conn);

  // Redirect to a page confirming task creation
  header("Location: tasks.php");
  exit();
}
?>
