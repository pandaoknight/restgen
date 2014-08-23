<?php
class fake_products{
  public static function all() {
    $a->id = 1;
    $a->title = '天堂伞';
    $a->subTitle = '天堂伞正品专卖创意晴雨伞';
    $b->id = 2;
    $b->title = '游卡系列砸蛋';
    $b->subTitle = '北京桌游 正版 游卡系列砸蛋+新版雪地砸蛋';
    $c->id = 3;
    $c->title = '乐高 LEGO 42030';
    $c->subTitle = '乐高 LEGO 42030 科技系列 沃尔沃L350F轮式装载车2014';
    $ret[] = $a;
    $ret[] = $b;
    $ret[] = $c;
    return $ret;
  }

  public static function index_id() {
    $all = self::all();
    $indexed[1] = $all[0];
    $indexed[2] = $all[1];
    $indexed[3] = $all[2];
    return $indexed;
  }
}
?>
