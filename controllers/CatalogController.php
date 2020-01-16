<?php

include_once ROOT . '/models/Category.php';
include_once ROOT . '/models/Product.php';
include_once ROOT . '/components/Pagination.php';

class CatalogController
{
	public function actionIndex($page = 1)
    {

        $categories = array();
        $categories = Category::getCategoriesList();

        $latestProduct = array();
        $latestProduct = Product::getLatestProducts(6, $page);

        $total = Product::getTotalProductsInCategory(0);

        $pagination = new Pagination($total, $page, 6, 'page-');

        require_once(ROOT . '/views/catalog.php');

        return true;
    }
    public function actionCategory($categoryId, $page = 1)
    {
    	$categories = array();
    	$categories = Category::getCategoriesList();

    	$categoryProducts = array();
    	$categoryProducts = Product::getProductsListByCategory($categoryId, $page );

        $total = Product::getTotalProductsInCategory($categoryId);

        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

    	require_once(ROOT . '/views/category.php');

    	return true;
    }
}