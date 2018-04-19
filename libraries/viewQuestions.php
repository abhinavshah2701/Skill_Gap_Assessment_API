<?php

$form_id = $_GET['form_id'];

$sql = "select * from question_master where form_id = $form_id";
$res = mysqli_query($connect,$sql);
$questions = array();

$flag=0;

while($row=mysqli_fetch_assoc($res))
{
    $obj['question_id'] = $row['question_id']; 
    $obj['question_type'] = $row['question_type']; 
    $obj['question_description'] = $row['question_description']; 
    $obj['total_rating'] = $row['total_rating']; 
    $question_id = $row['question_id'];
    if($row)
    {
        $flag=1;
        $sql1 = "select * from question_option_master where question_id = $question_id";
        $res1 = mysqli_query($connect,$sql1);
        $options = array();
        while($row1 = mysqli_fetch_assoc($res1))
        {
            $obj1['option_id'] = $row1['option_id']; 
            $obj1['option_description'] = $row1['option_description']; 
            $obj1['correct_option'] = $row1['correct_option']; 
            $obj1['option_rating'] = $row1['option_rating']; 
            
            array_push($options,$obj1);
        } 
        $obj['options'] = $options; 
    }
    array_push($questions,$obj);
}

if($flag==0)
{
    $response['success']=false;
    $response['error_message']= "Data Not Available";    
}
else
{
    $response['success']=true;
    $response['data']= $questions;  
}

echo json_encode($response);

?>
