<?php
/**
 * Created by PhpStorm.
 * User: alterwalker
 * Date: 27.02.2018
 * Time: 21:06
 */

namespace controllers;
use core\Controller;
use models\Product;

class ProductController extends Controller
{

    public function viewProduct($id) {
        $ProductModel = new Product();
        self::render ('views/product.php',
            $ProductModel->getItemById($id));
    }

}