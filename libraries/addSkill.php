<?php

$categoryname=$_POST['categoryname'];
$subcategoryname=$_POST['subcategoryname'];
$skillname=$_POST['skillname'];

$sql_temp = "select * from category_master c,sub_category_master s where c.category_id = s.category_id and c.category_description='$categoryname' and s.sub_category_description='$subcategoryname'";
$res_temp = mysqli_query($connect,$sql_temp);
$row_temp = mysqli_fetch_assoc($res_temp);
$category_id = $row_temp['category_id'];
$sub_category_id = $row_temp['sub_category_id'];


$sql_temp = "SELECT * FROM `skill_master` WHERE `skill_description` = '$skillname'";
$res_temp = mysqli_query($connect,$sql_temp);
$data = mysqli_fetch_assoc($res_temp);

if($data!=null)
{
    $response['success']=false;
    $response['error_message']="Skill Already Exist";
}
else if(strlen($skillname)<3)
{
    $response['success']=false;
    $response['error_message']="Skill Name Should Be Atleast 3 Characters Long.";
}
else{

    $sql_temp = "INSERT INTO `skill_master`(`sub_category_id`, `skill_description`) VALUES ($sub_category_id,'$skillname')";
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