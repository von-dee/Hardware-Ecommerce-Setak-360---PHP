<?php
    
    include '../../../config.php';

    $actorcode = $session->get('actorid');
    $actorname = $session->get('loginuserfulname');
    $actorcompcode = $session->get('companycode');
    $output = "";

    if(isset($_POST["query"]) && $_POST["query"] != ""){



        $stmt = $sql->Execute($sql->Prepare("SELECT * FROM app_riders WHERE RDR_FIRSTNAME LIKE ".$sql->Param('a')." AND RDR_STATUS = '1' AND RDR_COMP_CODE = ".$sql->Param('a')." ORDER BY RDR_FIRSTNAME DESC LIMIT 10"),array("%".$_POST["query"]."%",$actorcompcode));

        // echo $_POST["query"];
        // echo $stmt;
        // print $sql->ErrorMsg();
        // echo $stmt->RecordCount();

        if($stmt->RecordCount() > 0){

            $stmt = $stmt->getAll();

            // var_dump($stmt); die();

            foreach ($stmt as $val){
                $output .= '
                    <a href="javascript:void(0);" onclick="add_riderdetails(\''.$val["RDR_CODE"].'\',\''.$val["RDR_FIRSTNAME"].'\',\''.$val["RDR_LASTNAME"].'\',\''.$val["RDR_PHONE"].'\')" style="color: #000;text-decoration: none;">
                        <p style="margin-bottom: 0;font-size: 1.2em;border-bottom: 1px solid #d6d6d6;">
                            <i class="fas fa-box" style="color: #18aa75;"></i>
                            '.$val["RDR_FIRSTNAME"].'
                        </p>
                    </a>
                ';

                echo $output;
            }


        }else{
            echo 'Data Not Found';
        }

    }
?>