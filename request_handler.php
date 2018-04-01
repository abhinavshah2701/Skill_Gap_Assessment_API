<?php

// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Headers: *");
// header("Access-Control-Allow-Credentials: true");
// header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
// header('Access-Control-Max-Age: 1000');

include('libraries/connection.php');
include('libraries/headers.php');

if(isset($_POST['login']))
    include('libraries/login.php');
else if(isset($_POST['addCategory']))
    include('libraries/addCategory.php');
else if(isset($_GET['viewCategory']))
    include('libraries/viewCategory.php');
else if(isset($_POST['addSubCategory']))
    include('libraries/addSubCategory.php');
else if(isset($_GET['viewSubCategory']))
    include('libraries/viewSubCategory.php');
else if(isset($_POST['addSkill']))
    include('libraries/addSkill.php');
else if(isset($_GET['viewSkill']))
    include('libraries/viewSkill.php');
else if(isset($_GET['viewCategoryData']))
    include('libraries/viewCategoryData.php');    
else if(isset($_POST['updateCategory']))
    include('libraries/updateCategory.php');
else if(isset($_POST['deleteCategory']))
    include('libraries/deleteCategory.php');    
?>
