<?php

$skill_id=$_POST['skillname'];
$formname = $_POST['formname'];


$sql_temp = "SELECT * FROM `form_master` WHERE `form_name` = '$formname'";
$res_temp = mysqli_query($connect,$sql_temp);
$data = mysqli_fetch_assoc($res_temp);

if($data!=null)
{
    $response['success']=false;
    $response['error_message']="Form Already Exist";
}
else if(strlen($formname)<3)
{
    $response['success']=false;
    $response['error_message']="Form Name Should Be Atleast 3 Characters Long.";
}
else{

    $sql_temp = "INSERT INTO `form_master`(`skill_id`, `form_name`) VALUES ($skill_id,'$formname')";
    $res_temp = mysqli_query($connect,$sql_temp);
    
    if($res_temp)
    {
        $response['success']=true;
    }
    else
    {
        $response['success']=false;
        $response['error_message']= "Data not Added";    
    }
    
}
echo json_encode($response);
?>