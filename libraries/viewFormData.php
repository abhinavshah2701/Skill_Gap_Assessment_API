<?php

$form_id = $_GET['form_id'];
$sql = "SELECT form_id,form_name,skill_description,sub_category_description,category_description from form_master f,skill_master sm,sub_category_master scm,category_master cm where f.skill_id = sm.skill_id and sm.sub_category_id = scm.sub_category_id and scm.category_id = cm.category_id and f.form_id = $form_id";

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
