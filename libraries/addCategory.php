<?php

$categoryname=$_POST['categoryname'];

$sql_temp = "SELECT * FROM `category_master` WHERE `category_description` = '$categoryname'";
$res_temp = mysqli_query($connect,$sql_temp);
$data = mysqli_fetch_assoc($res_temp);

if($data!=null)
{
    $response['success']=false;
    $response['error_message']="Category Already Exist";
}
else if(strlen($categoryname)<3)
{
    $response['success']=false;
    $response['error_message']="Category Name Should Be Atleast 3 Characters Long.";
}
else{

    $sql_temp = "INSERT INTO `category_master`(`category_description`) VALUES ('$categoryname')";
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