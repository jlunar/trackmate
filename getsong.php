<?php

include('config.php');


$results = array();
$fdirectory = (isset($_REQUEST['songurl']))?$_REQUEST['songurl']:'upload/';
$handler = opendir($fdirectory);
while ($file = readdir($handler)) {
        if($file != '.' && $file != '..')
        $results[] = $file;
}

if(!empty($results)){
    foreach($results as $k=>$song){
        $filesJson[] = array(
            'title' => preg_replace('/\\.[^.\\s]{3,4}$/', '', $song),
            'mp3' => $fdirectory.$song
        );
    }
}
closedir($handler);
$songList = json_encode($filesJson);
    if(isset($_REQUEST['songurl'])){
        echo $songList;
    }


?>
