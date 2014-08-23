<?php
require_once(RESTGEN_ROOT . "libs/RESTful.php");


class Entity extends RESTful{
  protected $_identifier;

  public function __construct($params){
    parent::__construct($params);
    $this->_identifier = $params['identifier'];
  }
}

?>
