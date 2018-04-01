<?php

$sql = "SELECT sub_category_id,category_description,sub_category_description FROM `sub_category_master` sc,category_master cm where sc.category_id = cm.category_id";
$res = mysqli_query($connect,$sql);
$subcategories = array();

$flag=0;

while($row=mysqli_fetch_assoc($res))
{
    if($row)
    {
        $flag=1;
        array_push($subcategories,$row);
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
    $response['data']= $subcategories;  
}

echo json_encode($response);



?>
