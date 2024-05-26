<?php


if($_SERVER['REQUEST_METHOD']=='POST'){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    // $image = $_POST['image'];
    // echo $image;
    // print_r($_POST);
    // echo "<pre>";
    // print_r($_FILES);
  
    // echo "</pre>";

    $name_pattern  = '/^[a-zA-Z]+[a-zA-Z]+/';
    $phone_pattern  ='/^[0-9]{10}$/';
    $email_pattern ='/[a-zA-Z0-9._]+@[a-zA-Z]+\.[a-zA-Z]{2,}/';
    echo preg_match($name_pattern, $name);
    $isNameValid = preg_match($name_pattern, $name);
    $isphoneValid = preg_match($phone_pattern, $phone);
    $isEmailValid = preg_match($email_pattern, $email);
    if(!$isNameValid){
        echo "place enter a valid name";

    }
    if(!$isphoneValid){
        echo "place enter a valid phone";

    }
   
    
    if(!$isEmailValid){
        echo "place enter a valid email";

    }
if($isNameValid && $isphoneValid && $isEmailValid ){
    if(isset($_FILES)){
        $file = $_FILES['image'];
        $file_name = $file['name'];
        $file_temp = $file['tmp_name'];
        $file_size = $file['size'];
        $target = 'uploding/';
        // 'uploding/img006.jpg';
        $path  = $target.$file_name;
       $file_extension = pathinfo( $path ,PATHINFO_EXTENSION);
       if(file_exists($path )){
        echo "file all read exists";
       }else{
        if(  $file_extension !='pdf'){
            echo "palace uploding pdf file";
     
            }else{
               if(move_uploaded_file($file_temp , $path)){
                echo "file uplonding sucfully";
               }else{
                echo "file uplonding not sucfully";
               } 
            }
       }
      
        // echo "Name: $file_name size:$file_size temp: $file_temp";
    }
}


}
?>,