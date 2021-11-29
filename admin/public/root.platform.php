<?php include SYS_THEME.DS.'header.php';?> 
        
<?php include SYS_THEME.DS.'sidebar.php';  ?>
<?php include SYS_THEME.DS.'topnav.php'; $token = generateFormToken();?>


    <form name="myform" id="myform" method="post" action="#" data-toggle="validator" role="form" enctype="multipart/form-data" autocomplete="off">
        <input id="view" name="view" value="" type="hidden" />
        <input id="viewpage" name="viewpage" value="" type="hidden" />
        <input id="class_call" name="class_call" value="" type="hidden" />
        <input id="keys" name="keys" value="<?php echo (!empty($keys)?$keys:'') ;?>" type="hidden" />
        <input id="ekeys" name="ekeys" value="<?php echo (!empty($ekeys)?$ekeys:'') ;?>" type="hidden" />
        <input id="newkeys" name="newkeys" value="<?php echo $keys;?>" type="hidden" />
        <input id="data" name="data" value="" type="hidden" />
        <input id="action_search" name="action_search" value="" type="hidden" />
        <input id="microtime" name="microtime" value="<?php echo md5(microtime()); ?>" type="hidden" /> 
        <input id="token" name="token" value="<?php echo $token ; ?>" type="hidden" />  
        <?php
            include ($nav->nav_switch($pg));
            $session->set($pg.'_token', $token);  
        ?>
    </form>
    

<?php include SYS_THEME.DS.'footer_view.php';?>  
<?php include SYS_THEME.DS.'footer.php';?>  
        