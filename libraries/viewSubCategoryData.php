<?php

$sub_category_id = $_GET['sub_category_id'];
$sql="SELECT sub_category_id,category_description,sub_category_description FROM `sub_category_master` sc,category_master cm where sc.category_id = cm.category_id and sc.sub_category_id = $sub_category_id";
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
