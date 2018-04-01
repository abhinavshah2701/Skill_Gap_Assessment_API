<?php

$sql = "SELECT skill_id,category_description,sub_category_description,skill_description FROM category_master c,sub_category_master s, skill_master sm where sm.sub_category_id = s.sub_category_id and s.category_id = c.category_id";
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
