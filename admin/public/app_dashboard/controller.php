

<?php

  $action= "app_dashboard\\".(($class_call)? $class_call :"lists"); 
  $result= new $action;
  
  $paging = $result->Init();


?>
          
      