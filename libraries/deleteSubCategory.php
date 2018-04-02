<?php

$sub_category_id = $_POST['sub_category_id'];

$sql_temp = "SELECT * FROM `sub_category_master` WHERE `sub_category_id` = $sub_category_id";
$res_temp = mysqli_query($connect,$sql_temp);
$data = mysqli_fetch_assoc($res_temp);

if($data!=null)
{
    $sql_temp = "delete FROM `sub_category_master` WHERE `sub_category_id` = $sub_category_id";
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
    $response['error_message']="Sub Category Does Not Exist";
}

echo json_encode($response);
?>