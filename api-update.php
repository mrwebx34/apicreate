<?php 
header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Method:POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Access-Control-Allow-Method, Content-Type,Authorization,X-Requested-With');

include 'db-conn.php';
$data =json_decode(file_get_contents("php://input"),true);  
$student_id =$data['sid'];
$student_name=$data['sname']??null;
$student_class=$data['sclass']??null;
$student_age=$data['sage']??null;

$sql = "UPDATE students SET name='{$student_name}', `class`='{$student_class}', age='{$student_age}' WHERE id={$student_id}";

if(mysqli_query($conn,$sql)){
  
   echo(json_encode(array('message'=>'Students record updated.','status'=>true)));
}
else{
     echo(json_encode(array('message'=>'Students record not updated.','status'=>false)));
}


?>