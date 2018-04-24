<?php

if(isset($_POST['addCategory']))
{
    $categoryname=$_POST['categoryname'];

    $sql_temp = "SELECT * FROM `category_master` WHERE `category_description` = '$categoryname'";
    $res_temp = mysqli_query($connect,$sql_temp);
    $data = mysqli_fetch_assoc($res_temp);

    if($data!=null)
    {
        $response['success']=false;
        $response['error_message']="Category Already Exist";
    }
    else if(strlen($categoryname)<3)
    {
        $response['success']=false;
        $response['error_message']="Category Name Should Be Atleast 3 Characters Long.";
    }
    else{

        $sql_temp = "INSERT INTO `category_master`(`category_description`) VALUES ('$categoryname')";
        $res_temp = mysqli_query($connect,$sql_temp);
        
        if($res_temp)
        {
            $response['success']=true;
            $response['success_message']= "Category Added";    
        }
        else
        {
            $response['success']=false;
            $response['error_message']= "Data not Added";    
        }
        
    }
    echo json_encode($response);

}


else if(isset($_POST['updateCategory']))
{
    $category_id = $_POST['category_id'];
    $categoryname=$_POST['categoryname'];

    $sql_temp = "SELECT * FROM `category_master` WHERE `category_description` = '$categoryname'";
    $res_temp = mysqli_query($connect,$sql_temp);
    $data = mysqli_fetch_assoc($res_temp);

    if($data!=null)
    {
        $response['success']=false;
        $response['error_message']="Category Already Exist";
    }
    else if(strlen($categoryname)<3)
    {
        $response['success']=false;
        $response['error_message']="Category Name Should Be Atleast 3 Characters Long.";
    }
    else{

        $sql_temp = "delete FROM `category_master` WHERE `category_id` = $category_id";
        $res_temp = mysqli_query($connect,$sql_temp);

        $sql_temp = "INSERT INTO `category_master`(`category_id`,`category_description`) VALUES ($category_id,'$categoryname')";
        $res_temp = mysqli_query($connect,$sql_temp);
        
        if($res_temp)
        {
            $response['success']=true;
            $response['success_message']= "Category Updated";    
        }
        else
        {
            $response['success']=false;
            $response['error_message']= "Data not Updated";    
        }
        
    }
    echo json_encode($response);
}



else if(isset($_POST['deleteCategory']))
{

    $category_id = $_POST['category_id'];

    $sql_temp = "SELECT * FROM `category_master` WHERE `category_id` = '$category_id'";
    $res_temp = mysqli_query($connect,$sql_temp);
    $data = mysqli_fetch_assoc($res_temp);

    if($data!=null)
    {
        $sql_temp = "delete FROM `category_master` WHERE `category_id` = $category_id";
        $res_temp = mysqli_query($connect,$sql_temp);

        if($res_temp)
        {
            $response['success']=true;
            $response['success_message']= "Category Deleted";
        }
        else
        {
            $response['success']=false;
            $response['error_message']= "Data not Deleted";    
        }
    }
    else
    {
        $response['success']=false;
        $response['error_message']="Category Does Not Exist";
    }

    echo json_encode($response);
}

?>