<?php
require_once(RESTGEN_ROOT . "libs/Entities.php");
require_once(WEB_ROOT . "api_implement/fakedata/products.php");


class Products extends Entities {
  public function __construct($params) {
    parent::__construct($params);
  }

  public function Get() {
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: X-Requested-With");
    //header("Access-Control-Allow-Methods: *");
    $ret = fake_products::all();
    print json_encode($ret);
  }
}
?>
