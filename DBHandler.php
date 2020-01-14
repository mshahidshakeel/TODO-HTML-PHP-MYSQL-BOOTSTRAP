<?php


class DBHandler
{
    private $conn = null;
    private static $dbhandler = null;

    /**
     * DBHandler constructor.
     */
    private function __construct()
    {
        $this->conn = new mysqli("localhost", "shahid", "123456", "todo_db");
    }

    public static function getInstance(){
        if (self::$dbhandler == null){
            self::$dbhandler = new DBHandler();
        }
        return self::$dbhandler;
    }

    public function getActiveToDos(){
        $query = "  SELECT *
                    FROM todos
                    WHERE `time_completed` IS NULL";

        $result = $this->conn->query($query);
        return $result;
    }

    public function getCompletedToDos(){
        $query = "  SELECT *
                    FROM todos
                    WHERE `time_completed` IS NOT NULL";

        $result = $this->conn->query($query);
        return $result;
    }

    public function addToDo($descrip){

        $stmt = $this->conn->prepare("INSERT INTO todos VALUES(null, default , ? , default, null)");
        $stmt->bind_param('s', $descrip);
        $stmt->execute();

//        $query = "  INSERT INTO todos
//                    VALUES(null, default , '" . $descrip . "', default, null)";
//        $this->conn->query($query);

        $stmt->close();

        if($this->conn->error)
        {
            echo $this->conn->error; die();
        }
    }

    public function addToDoWithTitle($title, $descrip){
        $query = "  INSERT INTO todos
                    VALUES(null, '" . $title . "' , '" . $descrip . "', default, null)";
        $this->conn->query($query);

        if($this->conn->error)
        {
            echo $this->conn->error; die();
        }
    }

    public function deleteToDo($id){
        $query = "  DELETE FROM todos
                    WHERE id = '$id'";

        $this->conn->query($query);

        if($this->conn->error)
        {
            echo $this->conn->error; die();
        }
    }

    public function markCompleted($id){
        $query = "  UPDATE todos
                    SET `time_completed` = CURRENT_TIMESTAMP 
                    WHERE id = '$id'";

        $this->conn->query($query);

        if($this->conn->error)
        {
            echo $this->conn->error; die();
        }
    }
}