<?php

$skill_id = $_POST['skill_id'];

$sql_temp = "SELECT * FROM `skill_master` WHERE `skill_id` = $skill_id";
$res_temp = mysqli_query($connect,$sql_temp);
$data = mysqli_fetch_assoc($res_temp);

if($data!=null)
{
    $sql_temp = "delete FROM `skill_master` WHERE `skill_id` = $skill_id";
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
    $response['error_message']="Skill Does Not Exist";
}

echo json_encode($response);
?>