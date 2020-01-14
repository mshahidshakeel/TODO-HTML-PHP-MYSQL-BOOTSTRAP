<?php
    require "DBHandler.php";
    $active = DBHandler::getInstance()->getActiveToDos();
    $completed = DBHandler::getInstance()->getCompletedToDos();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <title>ToDo</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-6">
                <?php
                    echo "<h3>Active ToDos = $active->num_rows</h3>";

                    while($row = $active->fetch_assoc()){
                        echo "
                            <div class='card border-0 shadow mb-2'>
                                <div class='card-body'>
                                    <p><strong>" . $row[title] . "</strong></p>
                                    <p class='card-text'>" . $row[descrip] . "</p>
                                </div>
                                <div class='card-footer bg-primary text-light border-0'>
                                    <p class='m-0'>" . $row[time_added] . "
                                        <span class='float-right'>
                                            <a  class='btn btn-success btn-sm'
                                                href='backend.php?op=completed&id=" . $row[id] . "' >
                                                completed
                                            </a>
                                            <a  class='btn btn-danger btn-sm'
                                                href='backend.php?op=delete&id=" . $row[id] . "' >
                                                delete
                                            </a>
                                        </span>
                                    </p>
                                </div> 
                            </div>";
                    }
                ?>

                <hr>

                <?php
                    echo "<h3>Completed ToDos = $completed->num_rows</h3>";

                    while($row = $completed->fetch_assoc()){
                        echo "
                                <div class='card border-0 shadow mb-2'>
                                    <div class='card-body'>
                                        <p><strong>" . $row[title] . "</strong></p>
                                        <p class='card-text'>" . $row[descrip] . "</p>
                                    </div>
                                    <div class='card-footer bg-primary text-light border-0'>
                                        <p class='m-0'>Completion Time: " . $row[time_completed] . "</p>
                                    </div> 
                                </div>";
                    }
                ?>
            </div>
            <div class="col-6 border-left">
                <div class="container shadow m-2 p-3">
                    <h1 class="text-center">Add New</h1>
                    <form action="backend.php" method="post">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input class="form-control" type="text" name="title" placeholder="No Title Defined">
                        </div>
                        <div class="form-group">
                            <label for="descrip">Description</label>
                            <textarea class="form-control" name="descrip" cols="30" rows="10" placeholder="No Description Added" required></textarea>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-danger" type="reset" name="reset" value="Reset">
                            <input class="btn btn-success" type="submit" name="addTodo" value="Add ToDo">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>