<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


// include database and object files
include_once '../config/database.php';
include_once '../objects/picture.php';//although in the api call of student doesn't import the object
// instantiate database and picture object
$database = new Database();
//this is a Database not a connection
$databaseConn = $database->getDBConnection();
// initialize object
$picture = new Picture($databaseConn);

// get posted data
$data = json_decode(file_get_contents("php://input"));

//set pictureID
$student->studentID = $data->studentID;
$picture->studentID = $data->studentID;
$picture->pictureID = $data->pictureID;

//add picture
$query = $picture->addPicture();//gets the query to add this picture

//run query with $databaseConn
if(!mysqli_query($databaseConn, $query)) { 
    echo json_encode("Error adding picture data. to ". $picture->studentID . "");
} else {
    echo json_encode("success");
}

?>