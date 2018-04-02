<?php

$skill_id = $_GET['skill_id'];
$sql="SELECT skill_id,category_description,sub_category_description,skill_description FROM category_master c,sub_category_master s, skill_master sm where sm.sub_category_id = s.sub_category_id and s.category_id = c.category_id and sm.skill_id = $skill_id";
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
