<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");


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

//set studentID
$student->studentID = $data;
//get student
$query = $student->getStudent();

// products array
$picture_arr=array();
$picture_arr["pictures"]=array();

// function use taken from AWS tutorial on connecting to RDS
$result = mysqli_query($databaseConn, $query);

//multiple pictures, per studentID possible
while($query_data = mysqli_fetch_row($result)) {
	$picture_item = array(
            "pictureID" => $query_data[2]
            ); 
    array_push($picture_arr["pictures"], $picture_item);
}
 
echo json_encode($picture_arr);

?>