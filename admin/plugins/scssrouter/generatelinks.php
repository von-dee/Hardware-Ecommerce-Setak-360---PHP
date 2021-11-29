<?php
/**
 * LINK GENERATOR FOR ROOT.STYLE.SCSS
 * CODED BY REGGIE & SOLO @ ORCONS STSYEMS
 * DATE CREATED: 09-01-2019
 */

// Path to the public folder
$dir = "public/";  

// Init all fuctions and variables

$writes=[];
$data = rootscss($dir);
deleteElement("@import 'root.style.scss';", $data);
$filelink = writing($data);

// Function to get all .scss files from all folders in public directory
function rootscss($path){
    $g=0; $writes = array();
    foreach(scandir($path) as $file){
        $g++;
        if($g>2){
            if (is_dir($path.$file) ){
                $folder = $path.$file.'/'; 
                $writes[] = rootscss($folder); 
            }else{   
                if(strstr($file,'.scss')){
                    $newpath = substr($path,'7');
                    $scsspath =  $newpath.$file;
                    $writes[]=  "@import '$scsspath';";
                }
            }
        }
    }
    return $writes;
}

function deleteElement($element, &$array){
    $index = array_search($element, $array);
    if($index !== false){
        unset($array[$index]);
    }
}

// Function to prepare data for writting to file
function writing($data){
    $str ='';
    foreach ($data as $link) {
        if(is_array($link)){
            $str .=  writing($link); 
        }else{
            $str .= $link. PHP_EOL;
        }
    }
    return $str;
}

// Write to root.style.scss links to .scss files
file_put_contents('public/root.style.scss', $filelink );

?>