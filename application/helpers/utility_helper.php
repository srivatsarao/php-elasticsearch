<?php
    function asset_url($type){
        switch($type){
            case 'css':
                $url= base_url().'assets/css/';
                break;
            case 'js':
                $url= base_url().'assets/js/';
                break;
            case 'imgs':
                $url= base_url().'assets/imgs/';
                break;
            case 'files':
                $url= base_url().'assets/files/';
                break;
        }
   return $url;
}   
?>