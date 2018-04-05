<?php

$form_id = $_POST['form_id'];
$categoryname=$_POST['categoryname'];
$subcategoryname=$_POST['subcategoryname'];
$skillname=$_POST['skillname'];
$formname=$_POST['formname'];

$sql_temp = "select * from category_master cm,sub_category_master scm,skill_master sm where cm.category_id = scm.category_id and scm.sub_category_id = sm.sub_category_id and cm.category_description='$categoryname' and scm.sub_category_description='$subcategoryname' and sm.skill_description='$skillname'";

$res_temp = mysqli_query($connect,$sql_temp);
$row_temp = mysqli_fetch_assoc($res_temp);
$category_id = $row_temp['category_id'];
$sub_category_id = $row_temp['sub_category_id'];
$skill_id = $row_temp['skill_id'];

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

    $sql_temp = "update `form_master` set `form_name` = '$formname',`skill_id` = $skill_id where `form_id` = $form_id";
    $res_temp = mysqli_query($connect,$sql_temp);
    
    if($res_temp)
    {
        $response['success']=true;
    }
    else
    {
        $response['success']=false;
        $response['error_message']= "Data not Updated";    
    }
    
}
echo json_encode($response);
?>