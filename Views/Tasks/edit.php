<h1>Edit task</h1>
<form method='post' action='/mvc/tasks/saveEdit/'>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" placeholder="Enter a title" name="title" value ="<?php if (isset($task->title)) echo $task->title;?>">
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" id="description" placeholder="Enter a description" name="description" value ="<?php if (isset($task->description)) echo $task->description;?>">
    </div>
    <input type="hidden" name="id" id="id" value="<?php if (isset($task->id)) echo $task->id;?>"></input>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>