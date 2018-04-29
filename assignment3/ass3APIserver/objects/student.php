<?php
class Student{
 
    // database connection and table name
    private $database;
    private $table_name = "student";
 
    // object properties
    public $studentID;
    public $nickname;
 
    // constructor with $db as database connection
    public function __construct($databaseConn){
        $this->database = mysqli_select_db($databaseConn, "ass3");
    }

    public function read(){
    // select all query
    $query = "SELECT
                s.studentID, s.nickname, p.pictureID
            FROM
                " . $this->table_name . " s
                LEFT JOIN
                    picture p
                        ON s.studentID = p.studentID
            ORDER BY
                s.studentID ASC";
    // execute query
    return $query;
    }
    /* add a studnet to the list*/
    function addStudent() {
        $query = "INSERT INTO " . $this->table_name . " (studentID, nickname)
        VALUES ( '" . $this->studentID . "' , '" . $this->nickname . "' )";
        return $query;
    }
    /*get a single student by ID*/
    public function getStudent(){
    // select all query
        $query = "SELECT
                s.studentID, s.nickname, p.pictureID
            FROM
                " . $this->table_name . " s
                LEFT JOIN
                    picture p
                        ON s.studentID = p.studentID
            WHERE 
                s.studentID = " . $this->studentID . "";
        // execute query
        return $query;
    }
    //delete student
    function deleteStudent() {
        $query = "DELETE s FROM student s WHERE s.studentID = " . $this->studentID . "";
        return $query;
    }
    //deletes image
    function deleteStudentImage() {
        $query = "DELETE p, s FROM picture p INNER JOIN student s ON p.studentID = s.studentID WHERE s.studentID = " . $this->studentID . "";
        return $query;
    }

}
?>