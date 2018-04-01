<?php

$categoryname=$_POST['categoryname'];
$subcategoryname=$_POST['subcategoryname'];

$sql_temp = "SELECT * FROM `category_master` WHERE `category_description` = '$categoryname'";
$res_temp = mysqli_query($connect,$sql_temp);
$row_temp = mysqli_fetch_assoc($res_temp);
$category_id = $row_temp['category_id'];


$sql_temp = "SELECT * FROM `sub_category_master` WHERE `sub_category_description` = '$subcategoryname'";
$res_temp = mysqli_query($connect,$sql_temp);
$data = mysqli_fetch_assoc($res_temp);

if($data!=null)
{
    $response['success']=false;
    $response['error_message']="Sub Category Already Exist";
}
else if(strlen($subcategoryname)<3)
{
    $response['success']=false;
    $response['error_message']="Sub Category Name Should Be Atleast 3 Characters Long.";
}
else{

    $sql_temp = "INSERT INTO `sub_category_master`(`category_id`, `sub_category_description`) VALUES ($category_id,'$subcategoryname')";
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