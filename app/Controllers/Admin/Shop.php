<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Shop extends BaseController
{
    public function index()
    {
        echo "This is a admin shop area";
    }

    public function product($type="none",$product_id=0)
    {
        echo "<h2>This is an ADMIN product: ".$type." with an id: ".$product_id."</h2>";
        // return view('product');
    }

}
