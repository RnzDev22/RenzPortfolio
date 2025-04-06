<?php
class FileCls {
    
    private $_supportedFormats = ['image/png', 'image/jpeg', 'image/jpg', 'image/gif', 'application/pdf'];
 
    public function uploadImgFile($file,$newfilename,$uploadtype){
        
        switch($uploadtype){
            case "tagorder":
                $uppath = '../pages/uploads/';
                break;
            case "appform":
                $uppath = '../pages/uploads/';
                break;
            case "nursery-image":
                $uppath = '../pages/uploads/banner-image/';
                break;
        }
        
        if(is_array($file)){
            if(in_array($file['type'], $this->_supportedFormats)){
                move_uploaded_file($file['tmp_name'],$uppath.$newfilename);
                echo 'File has been uploaded.';
                //echo "<script>alert('".$uppath.$newfilename."')</script>";
            } else {
                die('File format is not supported');
            }
        } else {
            die('File not uploaded!');
        }
    }
    
}

?>
