<?php

$sql = "SELECT * FROM `category_master`";
$res = mysqli_query($connect,$sql);
$categories = array();

$flag=0;

while($row=mysqli_fetch_assoc($res))
{
    if($row)
    {
        $flag=1;
        array_push($categories,$row);
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
    $response['data']= $categories;  
}

echo json_encode($response);



?>
