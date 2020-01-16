<?php
/**
 * Created by PhpStorm.
 * User: HyperX
 * Date: 27.06.2019
 * Time: 14:46
 */
return array(

    'lab/([1-2])' => 'lab/index/$1',

    'product/([0-9]+)' => 'product/view/$1',

    'catalog/page-([0-9]+)' => 'catalog/index/$1',
    'catalog' => 'catalog/index', // CatalogController & actionIndex

    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2', // actionCategory в CatalogController
    'category/([0-9]+)' => 'catalog/category/$1', // CatalogController & actionCategory & $1 = number_category

    'cart/checkout' => 'cart/checkout', // actionAdd в CartController
    'cart/delete/([0-9]+)' => 'cart/delete/$1',
    'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1',
    'cart/add/([0-9]+)' => 'cart/add/$1',
    'cart' => 'cart/index',

    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',

    // Управление товарами:
    'admin/product/create' => 'adminProduct/create',
    'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',
    'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',
    'admin/product' => 'adminProduct/index',
    // Управление категориями:
    'admin/category/create' => 'adminCategory/create',
    'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
    'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
    'admin/category' => 'adminCategory/index',
    // Управление заказами:
    'admin/order/update/([0-9]+)' => 'adminOrder/update/$1',
    'admin/order/delete/([0-9]+)' => 'adminOrder/delete/$1',
    'admin/order/view/([0-9]+)' => 'adminOrder/view/$1',
    'admin/order' => 'adminOrder/index',
    // Админпанель:
    'admin' => 'admin/index',

    'contacts' => 'site/contact',
    'about' => 'site/about',

    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',

    'index.php' => 'site/index',
    '' => 'site/index', // actionIndex & SiteController

);