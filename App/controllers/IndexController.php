<?php
/**
 * Created by PhpStorm.
 * User: alterwalker
 * Date: 27.02.2018
 * Time: 21:06
 */

namespace Controllers;


use Core\Controller;
use Models\Product;

class IndexController extends Controller
{
    public function actionIndex() {
        $ProductModel = new Product();
        self::render ('../App/views/index.php',
            $ProductModel->getItems());
    }

}