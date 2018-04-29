<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
// include database and object files
include_once '../config/database.php';
include_once '../objects/student.php';
// instantiate database and student object
$database = new Database();
//this is a Database not a connection
$databaseConn = $database->getDBConnection();
// initialize object
$student = new Student($databaseConn);

// query student
$query = $student->read();
 
    // products array
    $student_arr=array();
    $student_arr["students"]=array();

    // function use taken from AWS tutorial on connecting to RDS
    $result = mysqli_query($databaseConn, $query);


echo "<table border='1' cellpadding='2' cellspacing='2'>";
         echo "</tr>";
           echo "<td>studentID</td>";
           echo "<td>Nickname</td>";
           echo "<td>pictureID</td>";
         echo "</tr>";

    while($query_data = mysqli_fetch_row($result)) {
        #/*debug code:*/ echo $query_data[0], ",\t", $query_data[1], ",\t", $query_data[2], "\n";
        //source of this array json encode https://www.codeofaninja.com/2017/02/create-simple-rest-api-in-php.html
         
        //$student_item = array(
            echo "<tr>";
                echo "<td>",$query_data[0], "</td>",
                    "<td>",$query_data[1], "</td>",
                    "<td>",$query_data[2], "</td>";
                echo "</tr>";
        //    );
       // array_push($student_arr["students"], $student_item);
    }
 
//echo json_encode($student_arr);

?>