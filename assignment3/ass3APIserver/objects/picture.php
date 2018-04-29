<?php
class Picture{
    // database connection and table name
    private $database;
    private $table_name = "picture";
 
    // object properties
    public $studentID;
    public $pictureID;
 
    // constructor with $db as database connection
    public function __construct($databaseConn){
        $this->database = mysqli_select_db($databaseConn, "ass3");
    }
    /* add a picture to a student*/
    function addPicture() {
        $query = "INSERT INTO " . $this->table_name . " (studentID, pictureID)
        VALUES ( '" . $this->studentID . "' , '" . $this->pictureID . "' )";
        return $query;
    }
}
?>