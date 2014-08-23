<?php
define('WEB_ROOT', dirname(__FILE__) . '/');  // index目录
define('RESTGEN_ROOT', WEB_ROOT . "../");         // 工程部署目录
require_once(RESTGEN_ROOT . '/libs/UrlRouter.php');


$url_router = new UrlRouter();

// DISCUSS: Mapping存在的意义？
//   虽然可以按照RESTful的规则来直接路由，但我认为Mapping是一种注册信息，仍然有存在的必要。
$url_router->SetMapping(
  array(
    '/products' => 'Products',
    '/products/{identifier}' => 'Product',  // 必须使用{identifier}作为参数命名，参见实现：libs/UrlRouter.php libs/Entity.php

    '/products/{identifier}/specs' => 'ProductSpecs',  // 参见实现：libs/UrlRouter.php libs/Reference.php
  )
);
$url_router->SetDestinationPath(WEB_ROOT . 'api_implement');
@$url_router->Route($_SERVER['REQUEST_URI']);


?>
