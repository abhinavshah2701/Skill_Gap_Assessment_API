<?php

$form_id=$_POST['form_id'];
$question_name = $_POST['questionname'];
$question_type = $_POST['questiontype'];
$total_rating = $_POST['totalrating'];

$option_array = $_POST['option_array'];

$sql_temp = "SELECT * FROM `question_master` WHERE `question_description` = '$question_name'";
$res_temp = mysqli_query($connect,$sql_temp);
$data = mysqli_fetch_assoc($res_temp);

if($data!=null)
{
    $response['success']=false;
    $response['error_message']="Question Already Exist";
}

else
{

    $sql_temp = "INSERT INTO `question_master`(`form_id`, `question_type`, `question_description`, `total_rating`) VALUES ($form_id,'$question_type','$question_name',$total_rating)";
    $res_temp = mysqli_query($connect,$sql_temp);
    
    $sql_temp = "SELECT * FROM question_master where `question_description`='$question_name' and `form_id`=$form_id";
    $res_temp = mysqli_query($connect,$sql_temp);
    $data = mysqli_fetch_assoc($res_temp);
        
    $question_id = $data['question_id'];
    $flag = 0;
    
    for($i=0;$i<count($option_array);$i++)
    {
        
        $option_id = $option_array[$i]['optionid'];
        $option_name = $option_array[$i]['optionname'];
        $correct_option = $option_array[$i]['correctoption'];
        $option_rating = $option_array[$i]['optionrating'];
        $sql_temp = "INSERT INTO `question_option_master`(`question_id`, `option_id`, `option_description`, `correct_option`, `option_rating`) VALUES ($question_id,'$option_id','$option_name','$correct_option',$option_rating)";
    
        $res_temp = mysqli_query($connect,$sql_temp);
        
        if($res_temp==true)
        {
            $flag=1;
        }  
    }
    
    if($flag==1)
    {
        
        $response['success']=true;
    }
    else
    {
        $response['success']=false;
        $response['error_message']= "Question Not Added";    
    }
}

echo json_encode($response);
?>