<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of importClass
 *
 * @author orcons systems
 */
class Import  extends Engine{
    //put your code here
    function  __construct() {
        parent::__construct();
    }

    public function uploadImage($file,$destination){
        if(is_uploaded_file($file['tmp_name']) && $file['error'] == 0){
            $ext = array('image/pjpeg','image/jpeg','image/jpg','image/png','image/x-png','image/gif');
            $rand_numb = md5(uniqid(microtime()));
            $neu_name = $rand_numb.$file['name'];
            $_name_ = $file['name'];
            $_type_ = $file['type'];
            $_tmp_name_ = $file['tmp_name'];
            $_size_ = $file['size'] / 1024;
            if(in_array($_type_,$ext)){
                if(@move_uploaded_file($_tmp_name_,$destination.$neu_name)){
                    return $neu_name;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }else{
            return false;
        }
    }//end

    public function uploadExcel($file){
        if(is_uploaded_file($file['tmp_name']) && $file['error'] == 0){
            $ext = array('application/vnd.ms-excel','application/msexcel');
            $rand_numb = md5(uniqid(microtime()));
            $neu_name = $rand_numb.$file['name'];
            $_name_ = $file['name'];
            $_type_ = $file['type'];
            $_tmp_name_ = $file['tmp_name'];
            $_size_ = $file['size'] / 1024;

        if(in_array($_type_,$ext)){
            if(@move_uploaded_file($_tmp_name_,SPATH_UPLOADED.$neu_name)){
            return $neu_name;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }else{
            return false;
        }
    }//end

    public function uploadPdf($file,$destination){
        if(is_uploaded_file($file['tmp_name']) && $file['error'] == 0){
            $ext = array('application/pdf','application/download');
            $rand_numb = md5(uniqid(microtime()));
            $neu_name = $rand_numb.$file['name'];
            $_name_ = $file['name'];
            $_type_ = $file['type'];
            $_tmp_name_ = $file['tmp_name'];
            $_size_ = $file['size'] / 1024;
            if(in_array($_type_,$ext)){
                if(@move_uploaded_file($_tmp_name_,$destination.$neu_name)){
                    return $neu_name;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }else{
            return false;
        }
    }//end
}
?>
