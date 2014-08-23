<?php
require_once(RESTGEN_ROOT . "libs/Entity.php");
require_once(WEB_ROOT . "api_implement/fakedata/products.php");


class Product extends Entity {
  public function __construct($params) {
    parent::__construct($params);
  }

  public function Get() {
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: X-Requested-With");
    //header("Access-Control-Allow-Methods: *");
    $indexed = fake_products::index_id();
    if(array_key_exists($this->_identifier, $indexed)) {
      print json_encode($indexed[$this->_identifier]);
    } else {
      header('HTTP/1.1 400 Bad Request');
      print '{"status":"400",'.
        '"message":"product not exits.",'.
        '"code": 20001,'.
        '"more info": "http://www.xxx.com/docs/errors/20001"}';
    }
  }
}
?>
