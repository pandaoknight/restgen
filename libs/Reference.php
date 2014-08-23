<?php
require_once(RESTGEN_ROOT . "libs/RESTful.php");


class Reference extends RESTful{
  public function __construct($params){
    parent::__construct($params);
    $this->_identifier = $params['identifier'];
  }
}

?>
