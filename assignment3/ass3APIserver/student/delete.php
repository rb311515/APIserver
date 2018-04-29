<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object files
include_once '../config/database.php';
include_once '../objects/student.php';
// instantiate database and student object
$database = new Database();
//this is a Database not a connection
$databaseConn = $database->getDBConnection();
// initialize object
$student = new Student($databaseConn);

// get posted data
$data = json_decode(file_get_contents("php://input"));

//create student
$student->studentID = $data;

//delete student by studentID
$query =  $student->deleteStudentImage();
$query2 = $student->deleteStudent();
//run query with $databaseConn
if(!mysqli_query($databaseConn, $query)) { 
	echo "Error removing picture data.";
} else {
	if(!mysqli_query($databaseConn, $query2)) { 
	echo "Error removing student data.";
	} else {
		echo "success, it was deleted";
	}
}
?>