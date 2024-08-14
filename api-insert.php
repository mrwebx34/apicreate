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
if (isset($data['sid']) && !empty($data['sid'])) {
    $student_id = $data['sid'];

$sql ="INSERT INTO students( name , class , age) VALUES('{$student_name}','{$student_class}','{$student_age}')";

$result=mysqli_query($conn,$sql) or die('Sql query failed');

if(mysqli_num_rows($result)>0){
    $output=mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($output);

}
else{
     echo(json_encode(array('message'=>'no records found.','status'=>false)));
}}
else {
    
    echo json_encode(array('message' => 'Invalid student ID.', 'status' => false));
}
?>