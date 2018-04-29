<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');


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
$student_arr=array();

// function use taken from AWS tutorial on connecting to RDS
$result = mysqli_query($databaseConn, $query);

$query_data = mysqli_fetch_row($result);

#source of this array json encode https://www.codeofaninja.com/2017/02/create-simple-rest-api-in-php.html
        //$student_item = array(
        	 echo "<table border='1' cellpadding='2' cellspacing='2'>";
  echo "</tr>";
    echo "<td>studentID</td>";
    echo "<td>Nickname</td>";
    echo "<td>pictureID</td>";
  echo "</tr>";
        	 echo "<tr>";
  				echo "<td>",$query_data[0], "</td>",
       				"<td>",$query_data[1], "</td>",
       				"<td>",$query_data[2], "</td>";
  				echo "</tr>";
  	echo "</table>";
           // ); 
        //array_push($student_arr, $student_item);

 
//echo json_encode($student_arr);

?>