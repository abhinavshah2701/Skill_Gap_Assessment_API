<?php

$email=$_POST['email'];
$password=md5($_POST['password']);

$admin = "select * from  user_master where email='$email' and passwd='$password'";
$admin_result=$connect->query($admin);
$admin_row=$admin_result->fetch_array();

if($admin_row['email'] == $email && $admin_row['passwd'] == $password)
{
    $response['success']=true;
    // $response['email']=$admin_row['email'];
    // $response['fname']=$admin_row['first_name'];
    // $response['credentials']=md5($admin_row['email'].":".$password);
}
else
{
    $response['success']=false;
    $response['error_message']= "Invaid Credentials";    
}
echo json_encode($response);
?>