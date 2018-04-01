<?php

$category_id = $_POST['category_id'];

$sql_temp = "SELECT * FROM `category_master` WHERE `category_id` = '$category_id'";
$res_temp = mysqli_query($connect,$sql_temp);
$data = mysqli_fetch_assoc($res_temp);

if($data!=null)
{
    $sql_temp = "delete FROM `category_master` WHERE `category_id` = $category_id";
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
    $response['error_message']="Category Does Not Exist";
}

echo json_encode($response);
?>