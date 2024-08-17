<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Method:POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Access-Control-Allow-Method, Content-Type,Authorization,X-Requested-With');
include "db-conn.php";

$data =json_decode(file_get_contents("php://input"),true);
$student_name=$data['sname'];
$student_class=$data['sclass'];
$student_age=$data['sage'];

    $student_id = $data['sid'];

$sql ="INSERT INTO students( name , class , age) VALUES('{$student_name}','{$student_class}','{$student_age}')";

$result=mysqli_query($conn,$sql) or die('Sql query failed');

if(mysqli_query($conn,$sql)){
  
   echo(json_encode(array('message'=>'Students record inserted.','status'=>true)));
}
else{
     echo(json_encode(array('message'=>'Students record not inserted.','status'=>false)));
}

?>