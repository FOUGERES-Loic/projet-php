<?php

namespace Service;


class MenuService
{
    /**
     * @param string $currect_page
     */
    public function isActive($currect_page){
        $url_array =  explode('/', urldecode($_SERVER['REQUEST_URI'])) ;
        $url = end($url_array);
        if($currect_page == $url){
            return 'active'; //class name in css
        }
        return '';
    }
}