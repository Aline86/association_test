<?php

    function traitementImage($str, $fichierLieu, $fichierType){
        $stri = strip_tags($str); 
        $stri = preg_replace('/[\r\n\t ]+/', ' ', $str);
        $stri = preg_replace('/[\"\*\/\:\<\>\?\'\|]+/', ' ', $str);
        $stri = strtolower($str);
        $stri = html_entity_decode( $str, ENT_QUOTES, "utf-8" );
        $stri = htmlentities($str, ENT_QUOTES, "utf-8");
        $stri = preg_replace("/(&)([a-z])([a-z]+;)/i", '$2', $str);
        $stri = str_replace(' ', '-', $str);
        $stri = rawurlencode($str);
        $stri = str_replace('%', '-', $str);
        if( !strstr($fichierType, 'jpg') && !strstr($fichierType, 'jpeg') && !strstr($fichierType, 'png')){
            echo "";
            }
        $tmp_file = $fichierLieu;
        $name_file = $stri;
        if(move_uploaded_file($tmp_file,'./images/'.$name_file)) {
            echo "Le fichier a bien été téléchargé";
        }
        $tmp_file='./images/';
        $link=$tmp_file.$name_file;
            return $link;
    }