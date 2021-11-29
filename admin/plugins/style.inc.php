<?php
if(is_dir('public/')){
require "scssphp/scss.inc.php";
$scss = new scssc();
$scss->setImportPaths("media/scss/");
$scss->setFormatter("scss_formatter_compressed");

// will search for `scss/style.scss'
$output = $scss->compile('@import "style.scss"');
file_put_contents('media/css/style.css',$output);
}
?>