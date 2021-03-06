<?php
include('libraries/connection.php');
include('libraries/headers.php');

if(isset($_POST['login']))
    include('libraries/login.php');
    
else if(isset($_POST['addCategory']) || isset($_POST['updateCategory']) || isset($_POST['deleteCategory']))
    include('libraries/manageCategory.php');
else if(isset($_GET['viewCategory']))
    include('libraries/viewCategory.php');

else if(isset($_POST['addSubCategory']) || isset($_POST['updateSubCategory']) || isset($_POST['deleteSubCategory']))
    include('libraries/manageSubCategory.php');
else if(isset($_GET['viewSubCategory']))
    include('libraries/viewSubCategory.php');

else if(isset($_POST['addSkill']))
    include('libraries/addSkill.php');
else if(isset($_GET['viewSkill']))
    include('libraries/viewSkill.php');
else if(isset($_POST['updateSkill']))
    include('libraries/updateSkill.php');
else if(isset($_POST['deleteSkill']))
    include('libraries/deleteSkill.php');

else if(isset($_POST['addForm']))
    include('libraries/addForm.php'); 
else if(isset($_GET['viewForm']))
    include('libraries/viewForm.php');
else if(isset($_POST['updateForm']))
    include('libraries/updateForm.php'); 
else if(isset($_POST['deleteForm']))
    include('libraries/deleteForm.php');

else if(isset($_GET['viewCategoryData']))
    include('libraries/viewCategoryData.php');    
else if(isset($_GET['viewSubCategoryData']))
    include('libraries/viewSubCategoryData.php');      
else if(isset($_GET['viewSkillData']))
    include('libraries/viewSkillData.php');    
else if(isset($_GET['viewFormData']))
    include('libraries/viewFormData.php');

else if(isset($_POST['addQuestion']))
    include('libraries/addQuestion.php');
else if(isset($_GET['viewQuestions']))
    include('libraries/viewQuestions.php');
?>


