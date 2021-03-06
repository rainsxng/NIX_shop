<?php
return [
    '/' => 'Controllers\IndexController/actionIndex',
    '/product/:any' => 'Controllers\ProductController/viewProduct/$1',
    '/login'=>'Controllers\ShowController/showLoginPage',
    '/register'=>'Controllers\ShowController/showRegisterPage',
    '/cart'=>'Controllers\CartController/getCartProducts',
    '/category/:any'=>'Controllers\ProductController/getProductsByCategoryId/$1',
    '/cart/add'=>'Controllers\CartController/addToCart',
    '/cart/deleteOne'=>'Controllers\CartController/deleteOne',
    '/cart/deleteAll'=>'Controllers\CartController/deleteAll',
    '/cart/increase'=>'Controllers\CartController/increaseByOne',
    '/cart/decrease'=>'Controllers\CartController/decreaseByOne',
    '/auth/register'=>'Controllers\AuthController/registration',
    '/auth/login'=>'Controllers\AuthController/authorize',
    '/auth/logout'=>'Controllers\AuthController/logOut',
    '/comment/add'=>'Controllers\ProductController/addComment',
    '/?brands=:any'=>'Controllers\IndexController/showBrandsProducts',
    '/user'=>'Controllers\UserController/getUser',
    '/user/changePassword'=>'Controllers\UserController/changePassword',
    '/user/changeEmail'=>'Controllers\UserController/changeEmail',
    '/cart/order'=>'Controllers\CartController/makeOrder',
    '/user/delete'=>'Controllers\UserController/logoutAndDelete',
    '/search'=>'Controllers\IndexController/searchProductsByTitle',
    '/fullSearch'=>'Controllers\IndexController/fullSearch'
];
