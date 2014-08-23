<?php
class UrlRouter {
  protected $_re2dest = array();
  protected $_destination_path;

  public function SetMapping($mapping) {
    // 构造用来匹配uri的正则表达式列表。
    // 限制：
    // 1. 实体命名不得包含数字和特殊符号。
    // 2. 所有参数必须是 int，以避免形如：users/products和users/{param}都能匹配到字符串"users/products"的问题
    //    因为路由的匹配是不允许二义性的。
    foreach($mapping as $uri => $destination_name) {
      $uri_sections = explode("/", $uri);

      $params = array();
      foreach($uri_sections as &$section) {
        // TODO(2014-7-6 21:19:11): 对$section的字符组成的检查。
        $cbraces = '\\{(.*?)\\}';
        if($c=preg_match_all ("/".$cbraces."/is", $section, $matches)) {
          $section = "(\\d+)";
          $params[] = $matches[1][0];
        }
      }
      $re = implode("\\/", $uri_sections);
      $this->_re2dest[$re]['params'] = $params;
      $this->_re2dest[$re]['destination_name'] = $destination_name;
    }
  }

  public function SetDestinationPath($destination_path) {
    $this->_destination_path = $destination_path;
  }

  public function Route($uri) {
    $matched = $this->Match($uri);
    // TODO(2014-7-6 21:15:50): 404 NOT FOUND process.
    if(empty($matched)) {
      print "404 NOT FOUND";
      die();
    }
    $this->Load($matched['destination_name'], $matched['params']);  // TODO: method的获取暂时不做，它是一个面向切面的实现。
  }

  protected function Match($uri) {
    $ret = array();
    foreach($this->_re2dest as $re => $dest) {
      if($c=preg_match_all ("/^".$re."$/is", $uri, $matches)){
        $params = $dest['params'];
        for($i=0; $i<sizeof($params); $i++){
          $ret['params'][$params[$i]] = $matches[$i+1][0];
        }
        $ret['destination_name'] = $dest['destination_name'];
        return $ret;
      }
    }
    return $ret;
  }

  protected function Load($destination_name, $params, $method="Get") {
    require_once($this->_destination_path.'/'.$destination_name.'.php');
    $destination_name = basename($destination_name);  // destination支持多目录层级
    $destination = new $destination_name($params);  // DEPENDENCE：目标类必须实现RESTful接口的，它具有接受Identifier等参数的构造器。
    $destination->$method();
  }
}

?>
