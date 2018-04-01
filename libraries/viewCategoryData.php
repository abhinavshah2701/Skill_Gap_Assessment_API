<?php

$category_id = $_GET['category_id'];
$sql = "SELECT * FROM `category_master` where `category_id`=$category_id";
$res = mysqli_query($connect,$sql);

$flag = 0;

if($row=mysqli_fetch_assoc($res)){
    $flag = 1;
}

if($flag==0)
{
    $response['success']=false;
    $response['error_message']= "Data Not Available";    
}
else
{
    $response['success']=true;
    $response['data']= $row;  
}

echo json_encode($response);

?>
