<?php include "../app/views/partials/header.php" ?>

<body style="background-color:azure;">

<div class="container mt-5">
  <form action="" method="POST" class="w-50 mx-auto">
    <h2>Edit Task</h2>
    <div class="mb-2">
      <label for="">Task Name</label>
      <input type="text" name="task_name" value="<?= $row->task_name ?>" class="form-control">
    </div>
    <div class="mb-2">
      <label for="">Task Description</label>
      <input type="text" name="task_description" value="<?= $row->task_description ?>" class="form-control">
    </div>
    <div class="mb-2">
    <label for="task_status">Task Status:</label>

<select name="task_status" id="task_status" class="form-control">>
<option value="Select">--Select--</option>
<option value="Simula">1st</option>
<option value="Gitna">2nd</option>
<option value="Wakas">3rd</option>
</select>
    </div>
    <div class="mb-2">
      <label for="">Task Due</label>
      <input type="date" name="task_due" value="<?= $row->task_due ?>" class="form-control">
    </div>

    <button class="btn btn-primary" type="submit">Update</button>
  </form>
</div>

<?php include "../app/views/partials/footer.php" ?>