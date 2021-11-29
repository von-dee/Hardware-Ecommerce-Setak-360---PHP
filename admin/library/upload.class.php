<?php
/*
 * This class is designed to upload documents from the consumer reference system
 * Author: Ake 
 */

// extends Engine
class uploadClass{
	   
    function __construct(){
        // parent::__construct();
    }		   


    public function uploadAttachement($file,$type=""){

        if(is_uploaded_file($file['tmp_name']) && $file['error'] == 0){
            
            $ext = array('image/pjpeg','image/jpeg','image/jpg','image/png','image/x-png','image/gif');
            $rand_numb = md5(uniqid(microtime()));
            $neu_name = $rand_numb.$file['name'];
            $_name_ = $file['name'];
            $_type_ = $file['type'];
            $_tmp_name_ = $file['tmp_name'];
            $_size_ = $file['size'] / 1024;
            
            if(in_array($_type_,$ext)){
            
                // if($type == 'logo'){$neu_name2 = 'cmplogo/'.$neu_name ; }

                // var_dump($file); die();

                if(@move_uploaded_file($_tmp_name_,SYS_UPLOAD.$neu_name))
                {
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
    

    public function excelupload($file,$type=""){

        if(is_uploaded_file($file['tmp_name']) && $file['error'] == 0){
        $ext = [
            'application/vnd.ms-excel',
            'text/xls',
            'text/xlsx',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        ];
        // array('image/pjpeg','image/jpeg','image/jpg','image/png','image/x-png','image/gif');
            $rand_numb = md5(uniqid(microtime()));
            $neu_name = $rand_numb.$file['name'];
            $_name_ = $file['name'];
            $_type_ = $file['type'];
            $_tmp_name_ = $file['tmp_name'];
            $_size_ = $file['size'] / 1024;
            if(in_array($_type_,$ext)){
            
        $neu_name2 = 'bankupload/'.$neu_name ; 
        if(@move_uploaded_file($_tmp_name_,SYS_UPLOAD.$neu_name2))
        {
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