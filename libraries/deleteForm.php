<?php

$form_id = $_POST['form_id'];

$sql_temp = "SELECT * FROM `form_master` WHERE `form_id` = $form_id";
$res_temp = mysqli_query($connect,$sql_temp);
$data = mysqli_fetch_assoc($res_temp);

if($data!=null)
{
    $sql_temp = "delete FROM `form_master` WHERE `form_id` = $form_id";
    $res_temp = mysqli_query($connect,$sql_temp);

    if($res_temp)
    {
        $response['success']=true;
    }
    else
    {
        $response['success']=false;
        $response['error_message']= "Data not Deleted";    
    }
}
else
{
    $response['success']=false;
    $response['error_message']="Form Does Not Exist";
}

echo json_encode($response);
?>