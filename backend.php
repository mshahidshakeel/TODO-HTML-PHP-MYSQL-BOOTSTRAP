<?php
    require "DBHandler.php";

    if(isset($_POST['addTodo'])){

        if(!empty($_POST['descrip'])){
            if(!empty($_POST['title'])){
                DBHandler::getInstance()->addToDoWithTitle( $_POST['title'], $_POST['descrip']);
            }
            else {
                DBHandler::getInstance()->addToDo($_POST['descrip']);
            }
            header("Location: index.php?m=SUCCESS");
            die();
        }
        header("Location: index.php?m=DESC_EMPTY");
        die();
    }
    else if(isset($_GET['op']) AND $_GET['op'] == 'delete'){
        if(isset($_GET['id'])){
            DBHandler::getInstance()->deleteToDo($_GET['id']);
            header("Location: index.php?m=DELETE_SUCCESS");
            die();
        }
        header("Location: index.php?m=DELETE_ID_FAILED");
        die();
    }
    else if(isset($_GET['op']) AND $_GET['op'] == 'completed'){
        if(isset($_GET['id'])){
            DBHandler::getInstance()->markCompleted($_GET['id']);
            header("Location: index.php?m=COMPLETED_SUCCESS");
            die();
        }
        header("Location: index.php?m=COMPLETED_ID_FAILED");
        die();
    }
    header("Location: index.php?m=UNKNOWN");