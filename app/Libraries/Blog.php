<?php namespace App\Libraries;

class Blog{
    
    public function postItem($params){
        return view('components/post_item', $params);
    }
}