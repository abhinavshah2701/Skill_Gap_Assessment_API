<?php

$sql = "SELECT form_id,form_name,sm.skill_id,skill_description,sub_category_description,category_description from form_master f,skill_master sm,sub_category_master scm,category_master cm where f.skill_id = sm.skill_id and sm.sub_category_id = scm.sub_category_id and scm.category_id = cm.category_id";

$res = mysqli_query($connect,$sql);
$skill = array();

$flag=0;

while($row=mysqli_fetch_assoc($res))
{
    if($row)
    {
        $flag=1;
        array_push($skill,$row);
    }
}

if($flag==0)
{
    $response['success']=false;
    $response['error_message']= "Data Not Available";    
}
else
{
    $response['success']=true;
    $response['data']= $skill;  
}

echo json_encode($response);

?>
