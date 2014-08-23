<?php
class fake_specs{
  public static function all() {
    $a->productId = 1;
    $a->productTitle = '天堂伞';
    $a->title = '藏青色';
    $a->id = '1005';
    $a1->productId = 1;
    $a1->productTitle = '天堂伞';
    $a1->title = '红色';
    $a1->id = '1001';
    $a2->productId = 1;
    $a2->productTitle = '天堂伞';
    $a2->title = '苔绿色';
    $a2->id = '1004';
    $a3->productId = 1;
    $a3->productTitle = '天堂伞';
    $a3->title = '黑色';
    $a3->id = '1007';
    $a4->productId = 1;
    $a4->productTitle = '天堂伞';
    $a4->title = '紫色';
    $a4->id = '1003';

    $b->productId = 2;
    $b->productTitle = '游卡系列砸蛋';
    $b->title = '第1版黄色老版砸蛋';
    $b->id = '2001';
    $b1->productId = 2;
    $b1->productTitle = '游卡系列砸蛋';
    $b1->title = '第2版雪地砸蛋';
    $b1->id = '2002';

    $c->prodcutId = 3;
    $c->productTitle = '乐高 LEGO 42030';
    $c->title = '北京现货';
    $c->id = "3000";
    $ret[] = $a;  // 0
    $ret[] = $a1; // 1
    $ret[] = $a2; // 2
    $ret[] = $a3; // 3
    $ret[] = $a4; // 4
    $ret[] = $b;  // 5
    $ret[] = $b1; // 6
    $ret[] = $c;  // 7
    return $ret;
  }

  public static function index_productId() {
    $all = self::all();
    $indexed[1][] = $all[0];
    $indexed[1][] = $all[1];
    $indexed[1][] = $all[2];
    $indexed[1][] = $all[3];
    $indexed[1][] = $all[4];
    $indexed[2][] = $all[5];
    $indexed[2][] = $all[6];
    $indexed[3][] = $all[7];
    return $indexed;
  }
}
?>
