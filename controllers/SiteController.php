<?php
/**
 * Created by PhpStorm.
 * User: HyperX
 * Date: 29.07.2019
 * Time: 18:36
 */


class SiteController
{
    public function actionIndex()
    {

        $categories = array();
        $categories = Category::getCategoriesList();

        $latestProduct = array();
        $latestProduct = Product::getLatestProducts(6);


        require_once(ROOT . '/views/site.php');

        return true;
    }

}