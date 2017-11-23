<?php
namespace Home\Controller;
use Tools\HomeController;

class GoodsController extends HomeController {

    //商品列表展示
    public function showlistA(){
        /**** 根据分类展示对应商品信息 start ****/
        //根据 商品分类  获得对应的商品列表信息
        //战略：根据分类id  获得对应商品的goods_id
        //      再根据goods_id获得对应商品的基本信息
        $cat_id = I('get.cat_id');
        $now_catinfo = D('Category')->find($cat_id);
        //获得对应商品的goods_id
        //判断分类是第几个级别 cat_level=?
        if($now_catinfo['cat_level']==='0'){
            //A.点击第1级商品分类
            $goodsinfo = D('Goods')
                ->where(array('cat_id'=>$cat_id))
                ->field('group_concat(goods_id) gid')
                ->find();
            //dump($goodsinfo);//array(1) {  ["gid"] => string(11) "27,28,29,32"}
            $goods_ids = $goodsinfo['gid'];//string(11) "27,28,29,32"
        }else{
            //B.点击第2/3级别商品分类
            $goodsinfo = D('GoodsCat')
                ->where(array('cat_id'=>$cat_id))
                ->field('group_concat(goods_id) gid')
                ->find();
            //dump($goodsinfo);//array(1) {  ["gid"] => string(11) "28,29"}
            $goods_ids = $goodsinfo['gid'];//string(11) "28,29"
        }

        //判断有进行sphinx检索数据
        if(isset($_GET['search_name'])){
            //判断用户有进行模糊查找商品
            //有则获取，没有则设置为''空字符串
            $search_name = I('get.search_name','');

            $sp = new \Tools\SphinxClient();
            $sp->SetServer ( '127.0.0.1', 9312); //连接sphinx服务
            $sp->SetConnectTimeout ( 3 );
            $sp->SetArrayResult ( true );  //以数组形式返回获得的结果
            $sp->SetMatchMode ( SPH_MATCH_ANY);  //分词，收集分词任何部分检索的结果
            $index_name = "goods";

            $res = $sp->Query ( $search_name, $index_name );
            //dump($res);
            //获得返回的"主键id"信息，并拼装为array数组
            $sphinx_ids = array();
            if(!empty($res['matches'])){
                foreach($res['matches'] as $k => $v){
                    $sphinx_ids[] = $v['id'];
                }
            }

            //sphinx的结果 与 商品分类对应的商品结果求"交集"
            $goods_ids = array_intersect($sphinx_ids, explode(',',$goods_ids));
            //判断没有结果展示
            if(empty($goods_ids)){
                $goods_ids = 0;
            }else{
                $goods_ids = implode(',',$goods_ids);//array--->String
            }
        }

        /*****根据价格区间筛选商品 start*****/
        //有就获得，没有设置为空
        $shai_price = I('shai_price','');
        $condition_mark = array();//制作一个各种条件标签收集变量


        if(!empty($shai_price)){
            //dump($shai_price); //1400-2799  或 8400以上
            if(strpos($shai_price,'-')!==false){
                //1400-2700情况
                $p = explode('-',$shai_price);
                $start_p = $p[0];
                $end_p = $p[1];
                $cdt['goods_price'] = array('between',array($start_p,$end_p));
                //where goods_price between 1400 and 2700
            }else{
                //8400以上 情况
                $p = (int)$shai_price;
                $cdt['goods_price'] = array('egt',$p);
                //where goods_price >= 8400 
            }

            //制作价格提示标签
            $condition_mark[] = "<div style='margin:5px 0 5px 5px;border:1px solid green;width:130px;float:left;'><span>价格：".$shai_price."</span><span style='margin-left:5px;font-size:25px;color:red;font-weight:bold;'><a href='".\unsetUrlParam("shai_price")."' style='color:red;'>X</a></span></div>";

        }
        /*****根据价格区间筛选商品 end*****/


      /*****多选属性筛选条件设置 start*****/
        $getargs = I('get.'); //获得全部的get参数信息Array
        //判断是否存在"多选属性"条件
        $shai_attrids = array();


        //使得attr_id=>attr_name (id和名称)直接对应
        $attrinfo = D('Attribute')
            ->field('attr_id,attr_name')
            ->select();
        $attrid_name = array();
        foreach($attrinfo as $k => $v){
            $attrid_name[$v['attr_id']] = $v['attr_name'];
        }
        //dump($attrid_name);

        $goods_ids = explode(',',$goods_ids);//string-->array
        foreach($getargs as $k => $v){
            if(strpos($k,'attrid_')===0){
                //存在多选属性筛选条件
                $shaiattrid = substr($k,7);
                $shai_attrids[] = $shaiattrid;

                //15-直板、白色-19
                //根据多选属性信息找到对应的商品id信息
                $goods_attrinfo = D('GoodsAttr')
                    ->field('group_concat(distinct goods_id) gid')
                    ->where(array('attr_id'=>$shaiattrid,'attr_value'=>$getargs['attrid_'.$shaiattrid]))
                    ->find();
                //dump($goods_attrinfo);
                $attr_goodsids = explode(',',$goods_attrinfo['gid']);  
                //使得“商品分类”与“商品属性”做【交集】共同决定商品最终结果
                
                $goods_ids = array_intersect($attr_goodsids, $goods_ids);

                //给多选属性设置显示标签
                $condition_mark[] = "<div style='margin:5px 0 5px 5px;border:1px solid green;width:130px;float:left;'><span>".$attrid_name[$shaiattrid]."：".$getargs['attrid_'.$shaiattrid]."</span><span style='margin-left:5px;font-size:25px;color:red;font-weight:bold;'><a href='".\unsetUrlParam('attrid_'.$shaiattrid)."' style='color:red;'>X</a></span></div>";
            }
        }
        $goods_ids = implode(',',$goods_ids);//array-->string
        $shai_attrids_str = implode(',',$shai_attrids); //15,19
        $this -> assign('shai_attrids',$shai_attrids_str);

        /*****多选属性筛选条件设置 end*****/
        /*****根据$goods_ids获得对应的多选属性信息 start *****/
        $goods_ids = empty($goods_ids)?'0':$goods_ids;

        //数据表：sp_goods_attr/sp_attribute
        $duo_attrinfo = D('GoodsAttr')
            ->alias('ga')
            ->join('__ATTRIBUTE__ a on ga.attr_id=a.attr_id')
            ->where(array('ga.goods_id'=>array('in',$goods_ids),'a.attr_sel'=>'1'))
            ->field('a.attr_name,a.attr_id,group_concat(distinct ga.attr_value) val')
            ->group('a.attr_id')
            ->select();
        //dump($duo_attrinfo);
        //整合$duo_attrinfo数据
        foreach($duo_attrinfo as $k => $v){
            $duo_attrinfo[$k]['attrval'] = explode(',',$v['val']);
        }
        //dump($duo_attrinfo);
        $this -> assign('duo_attrinfo',$duo_attrinfo);
        /*****根据$goods_ids获得对应的多选属性信息 end *****/


        //给商品设置排序条件(销量、价格、评论数、上架时间)
        $xu = I('get.xu','desc');  //默认是降序
        $pai = I('get.pai','xl');     //获得排序条件,默认为“销量”排序
        $this ->assign('pai',$pai);
        $this ->assign('xu',$xu);

        //根据$final_goods_ids 获得对应的商品基本信息
        $cdt['is_del'] = '0';
        $cdt['goods_id'] = array('in',$goods_ids);
        $field = "g.goods_id,g.goods_name,g.goods_price,g.goods_small_logo,left(from_unixtime(g.add_time),10) add_time,(select sum(goods_number) from sp_order_goods og where og.goods_id=g.goods_id) xl,(select count(*) from sp_comment c where c.goods_id=g.goods_id) pl";
        $info = D('Goods')
            ->alias('g')
            ->where($cdt)
            ->field($field)
            ->order("$pai $xu")
            ->select();

        /*****计算商品的(平均)价格区间 start *****/
        $gprice = arrayToString($info,'goods_price');//获得全部的价格的字符串信息
        $gprice_arr = explode(',',$gprice); //当前商品全部的数组价格信息
        //dump($gprice_arr);
        $max_price = max($gprice_arr);//商品最高价格
        $min_price = min($gprice_arr);//商品最低价格
        $duan = 7;//价格分为7个段
        $avg_price = round(($max_price-$min_price)/$duan);//平均价格区间
        //dump($avg_price);//1306

        //制作全部的价格区间段：0-1399  1400-2799  2800-3199  3200-4599...
        $duan_price = array();

        $tmp = 0;
        $start = 0;
        for($i=0; $i<$duan-1;$i++){
            $tmp = $start+floor($avg_price/100)*100+99;
            $duan_price[] = $start."-".$tmp;
            $start = $tmp+1;
        }
        $duan_price[] = $start."以上";
        /*dump($duan_price);
        array(7) {
          [0] => string(6) "0-1399"
          [1] => string(9) "1400-2799"
          [2] => string(9) "2800-4199"
          ....
          [6] => string() "8400以上"*/
        $this -> assign('duan_price',$duan_price);

        /*****计算商品的(平均)价格区间 end *****/


        //给sphinx关键字设置语法高亮
        if(!empty($info) && isset($_GET['search_name'])){
            $ginfo = array();
            foreach($info as $k => $v){
                //$row = $sp -> buildExcerpts( array $docs , string $index , string $words [, array $opts ] );
                $row = $sp -> buildExcerpts( $v,$index_name, $search_name,array(
                    'before_match'=>'<span style="color:red;">',
                    'after_match'=>'</span>',
                ));
                //经过“高亮”设置的$row,是"索引数组"
                $ginfo[$k]['goods_id'] = $row[0];
                $ginfo[$k]['goods_name'] = $row[1];
                $ginfo[$k]['goods_price'] = $row[2];
                $ginfo[$k]['goods_small_logo'] = $row[3];
            }
            $info = $ginfo;
        }
        $this -> assign('info',$info);
        $this -> assign('condition_mark',$condition_mark);
        /**** 根据分类展示对应商品信息 end ****/

        $this -> display();
    }
    public function showlist(){
        /**** 根据分类展示对应商品信息 start ****/
        //根据 商品分类  获得对应的商品列表信息
        //战略：根据分类id  获得对应商品的goods_id
        //      再根据goods_id获得对应商品的基本信息
        $cat_id = I('get.cat_id');
        $now_catinfo = D('Category')->find($cat_id);
        //获得对应商品的goods_id
        //判断分类是第几个级别 cat_level=?
        if($now_catinfo['cat_level']==='0'){
            //A.点击第1级商品分类
            $goodsinfo = D('Goods')
                ->where(array('cat_id'=>$cat_id))
                ->field('group_concat(goods_id) gid')
                ->find();
            //dump($goodsinfo);//array(1) {  ["gid"] => string(11) "27,28,29,32"}
            $goods_ids = $goodsinfo['gid'];//string(11) "27,28,29,32"
        }else{
            //B.点击第2/3级别商品分类
            $goodsinfo = D('GoodsCat')
                ->where(array('cat_id'=>$cat_id))
                ->field('group_concat(goods_id) gid')
                ->find();
            //dump($goodsinfo);//array(1) {  ["gid"] => string(11) "28,29"}
            $goods_ids = $goodsinfo['gid'];//string(11) "28,29"
        }

        //判断有进行sphinx检索数据
        if(isset($_GET['search_name'])){
            //判断用户有进行模糊查找商品
            //有则获取，没有则设置为''空字符串
            $search_name = I('get.search_name','');

            $sp = new \Tools\SphinxClient();
            $sp->SetServer ( '127.0.0.1', 9312); //连接sphinx服务
            $sp->SetConnectTimeout ( 3 );
            $sp->SetArrayResult ( true );  //以数组形式返回获得的结果
            $sp->SetMatchMode ( SPH_MATCH_ANY);  //分词，收集分词任何部分检索的结果
            $index_name = "goods";

            $res = $sp->Query ( $search_name, $index_name );
            //dump($res);
            //获得返回的"主键id"信息，并拼装为array数组
            $sphinx_ids = array();
            if(!empty($res['matches'])){
                foreach($res['matches'] as $k => $v){
                    $sphinx_ids[] = $v['id'];
                }
            }

            //sphinx的结果 与 商品分类对应的商品结果求"交集"
            $goods_ids = array_intersect($sphinx_ids, explode(',',$goods_ids));
            //判断没有结果展示
            if(empty($goods_ids)){
                $goods_ids = 0;
            }else{
                $goods_ids = implode(',',$goods_ids);//array--->String
            }
        }

        /*****根据价格区间筛选商品 start*****/
        //有就获得，没有设置为空
        $shai_price = I('shai_price','');
        $condition_mark = array();//制作一个各种条件标签收集变量


        if(!empty($shai_price)){
            //dump($shai_price); //1400-2799  或 8400以上
            if(strpos($shai_price,'-')!==false){
                //1400-2700情况
                $p = explode('-',$shai_price);
                $start_p = $p[0];
                $end_p = $p[1];
                $cdt['goods_price'] = array('between',array($start_p,$end_p));
                //where goods_price between 1400 and 2700
            }else{
                //8400以上 情况
                $p = (int)$shai_price;
                $cdt['goods_price'] = array('egt',$p);
                //where goods_price >= 8400 
            }

            //制作价格提示标签
            $condition_mark[] = "<div style='margin:5px 0 5px 5px;border:1px solid green;width:130px;float:left;'><span>价格：".$shai_price."</span><span style='margin-left:5px;font-size:25px;color:red;font-weight:bold;'><a href='".\unsetUrlParam("shai_price")."' style='color:red;'>X</a></span></div>";

        }
        /*****根据价格区间筛选商品 end*****/


      /*****多选属性筛选条件设置 start*****/
        $getargs = I('get.'); //获得全部的get参数信息Array
        //判断是否存在"多选属性"条件
        $shai_attrids = array();


        //使得attr_id=>attr_name (id和名称)直接对应
        $attrinfo = D('Attribute')
            ->field('attr_id,attr_name')
            ->select();
        $attrid_name = array();
        foreach($attrinfo as $k => $v){
            $attrid_name[$v['attr_id']] = $v['attr_name'];
        }
        //dump($attrid_name);

        $goods_ids = explode(',',$goods_ids);//string-->array
        foreach($getargs as $k => $v){
            if(strpos($k,'attrid_')===0){
                //存在多选属性筛选条件
                $shaiattrid = substr($k,7);
                $shai_attrids[] = $shaiattrid;

                //15-直板、白色-19
                //根据多选属性信息找到对应的商品id信息
                $goods_attrinfo = D('GoodsAttr')
                    ->field('group_concat(distinct goods_id) gid')
                    ->where(array('attr_id'=>$shaiattrid,'attr_value'=>$getargs['attrid_'.$shaiattrid]))
                    ->find();
                //dump($goods_attrinfo);
                $attr_goodsids = explode(',',$goods_attrinfo['gid']);  
                //使得“商品分类”与“商品属性”做【交集】共同决定商品最终结果
                
                $goods_ids = array_intersect($attr_goodsids, $goods_ids);

                //给多选属性设置显示标签
                $condition_mark[] = "<div style='margin:5px 0 5px 5px;border:1px solid green;width:130px;float:left;'><span>".$attrid_name[$shaiattrid]."：".$getargs['attrid_'.$shaiattrid]."</span><span style='margin-left:5px;font-size:25px;color:red;font-weight:bold;'><a href='".\unsetUrlParam('attrid_'.$shaiattrid)."' style='color:red;'>X</a></span></div>";
            }
        }
        $goods_ids = implode(',',$goods_ids);//array-->string
        $shai_attrids_str = implode(',',$shai_attrids); //15,19
        $this -> assign('shai_attrids',$shai_attrids_str);

        /*****多选属性筛选条件设置 end*****/
        /*****根据$goods_ids获得对应的多选属性信息 start *****/
        $goods_ids = empty($goods_ids)?'0':$goods_ids;

        //数据表：sp_goods_attr/sp_attribute
        $duo_attrinfo = D('GoodsAttr')
            ->alias('ga')
            ->join('__ATTRIBUTE__ a on ga.attr_id=a.attr_id')
            ->where(array('ga.goods_id'=>array('in',$goods_ids),'a.attr_sel'=>'1'))
            ->field('a.attr_name,a.attr_id,group_concat(distinct ga.attr_value) val')
            ->group('a.attr_id')
            ->select();
        //dump($duo_attrinfo);
        //整合$duo_attrinfo数据
        foreach($duo_attrinfo as $k => $v){
            $duo_attrinfo[$k]['attrval'] = explode(',',$v['val']);
        }
        //dump($duo_attrinfo);
        $this -> assign('duo_attrinfo',$duo_attrinfo);
        /*****根据$goods_ids获得对应的多选属性信息 end *****/


        //给商品设置排序条件(销量、价格、评论数、上架时间)

        //根据$final_goods_ids 获得对应的商品基本信息
        $cdt['is_del'] = '0';
        $cdt['goods_id'] = array('in',$goods_ids);
        $field = "g.goods_id,g.goods_name,g.goods_price,g.goods_small_logo,left(from_unixtime(g.add_time),10) add_time";
        $info = D('Goods')
            ->alias('g')
            ->where($cdt)
            ->field($field)
            ->select();

        /*****计算商品的(平均)价格区间 start *****/
        $gprice = arrayToString($info,'goods_price');//获得全部的价格的字符串信息
        $gprice_arr = explode(',',$gprice); //当前商品全部的数组价格信息
        //dump($gprice_arr);
        $max_price = max($gprice_arr);//商品最高价格
        $min_price = min($gprice_arr);//商品最低价格
        $duan = 7;//价格分为7个段
        $avg_price = round(($max_price-$min_price)/$duan);//平均价格区间
        //dump($avg_price);//1306

        //制作全部的价格区间段：0-1399  1400-2799  2800-3199  3200-4599...
        $duan_price = array();

        $tmp = 0;
        $start = 0;
        for($i=0; $i<$duan-1;$i++){
            $tmp = $start+floor($avg_price/100)*100+99;
            $duan_price[] = $start."-".$tmp;
            $start = $tmp+1;
        }
        $duan_price[] = $start."以上";
        /*dump($duan_price);
        array(7) {
          [0] => string(6) "0-1399"
          [1] => string(9) "1400-2799"
          [2] => string(9) "2800-4199"
          ....
          [6] => string() "8400以上"*/
        $this -> assign('duan_price',$duan_price);

        /*****计算商品的(平均)价格区间 end *****/


        //给sphinx关键字设置语法高亮
        if(!empty($info) && isset($_GET['search_name'])){
            $ginfo = array();
            foreach($info as $k => $v){
                //$row = $sp -> buildExcerpts( array $docs , string $index , string $words [, array $opts ] );
                $row = $sp -> buildExcerpts( $v,$index_name, $search_name,array(
                    'before_match'=>'<span style="color:red;">',
                    'after_match'=>'</span>',
                ));
                //经过“高亮”设置的$row,是"索引数组"
                $ginfo[$k]['goods_id'] = $row[0];
                $ginfo[$k]['goods_name'] = $row[1];
                $ginfo[$k]['goods_price'] = $row[2];
                $ginfo[$k]['goods_small_logo'] = $row[3];
            }
            $info = $ginfo;
        }
        $this -> assign('info',$info);
        $this -> assign('condition_mark',$condition_mark);
        /**** 根据分类展示对应商品信息 end ****/

        $this -> display();
    }
    //商品列表展示
    public function detail(){
        $goods_id = I('get.goods_id');//被查看商品的goods_id

        //用户如果没有登录系统就定义回跳地址
        $user_name = session('user_name');
        if(empty($user_name)){
            session('back_url','Home/Goods/detail/goods_id/'.$goods_id);
        }

        //获得商品基本信息
        $goods = D('Goods');
        $info = $goods -> find($goods_id);
        $this -> assign('info',$info);

        //获得商品单选属性信息
        //数据表：sp_goods_attr  sp_attribute(单选,名称)
        $cdt['ga.goods_id'] = $goods_id;
        $cdt['a.attr_sel'] = '0';  //单选
        $singleinfo = D('GoodsAttr')
            ->alias('ga')
            ->join('__ATTRIBUTE__ a on ga.attr_id=a.attr_id')
            ->where($cdt)
            ->field('ga.attr_id,ga.attr_value,a.attr_name')
            ->select();
        $this -> assign('singleinfo',$singleinfo);


        //获得商品多选属性信息
        //数据表：sp_goods_attr  sp_attribute(单选,名称)
        $cdt['ga.goods_id'] = $goods_id;
        $cdt['a.attr_sel'] = '1'; //多选
        $manyinfo = D('GoodsAttr')
            ->alias('ga')
            ->join('__ATTRIBUTE__ a on ga.attr_id=a.attr_id')
            ->where($cdt)
            ->field('ga.attr_id,a.attr_name,group_concat(ga.attr_value) as vals')
            ->group('ga.attr_id')
            ->select();
        //dump($manyinfo);
        foreach($manyinfo as $k => $v){
            $manyinfo[$k]['attrvals'] = explode(',',$v['vals']);
        }
        //dump($manyinfo);
        $this -> assign('manyinfo',$manyinfo);


        //获得商品的相册图片信息
        $picsinfo = D('GoodsPics')
            ->where(array('goods_id'=>$goods_id))
            ->select();
        $this -> assign('picsinfo',$picsinfo);


        /***** 最近浏览过的商品设置 start *****/
        //先获得cookie中已经存储的最近浏览商品
        $recentlylook = unserialize($_COOKIE['recentlyinfo']);
        $recentlylook = empty($recentlylook)?array():$recentlylook;

        //判断当前浏览的商品在$recentlylook是是否存在，存在就删除
        if(in_array($goods_id,$recentlylook)){
            $huan = array_flip($recentlylook);//key-value位置调换
            //删除存在的商品
            unset($huan[$goods_id]);
            $recentlylook = array_flip($huan);//key-value位置再颠倒回来
        }

        //给recentlylook添加goods_id
        array_unshift($recentlylook,$goods_id); //给数组"开始"添加新元素

        //只保留5个元素
        $recentlylook = array_slice($recentlylook,0,5);

        //序列化$recentlylook并存储给cookie
        $recentlylook_s = serialize($recentlylook);
        setcookie('recentlyinfo',$recentlylook_s,time()+3600,'/');

        //获取最近浏览的商品信息并做展示
        $recentlylook_str = implode(',',$recentlylook);//array->string 变为"27,26,29,32,28"
        $recentlygoods = $goods 
            -> field('goods_id,goods_name,goods_small_logo')
            -> select($recentlylook_str);
        $this -> assign('recentlygoods',$recentlygoods);

        /***** 最近浏览过的商品设置 end   *****/


        //获得评论列表信息
        //$cmt = new CommentController();
        //$cmtinfo = $cmt -> getCmtList();
        //R([分组/]控制器/操作方法,array(传递的get参数))函数允许一个控制器实例化 另一个控制器并调用其方法
        //$cmtinfo = R('Comment/getCmtList',array('goods_id',$goods_id));
        //$this -> assign('cmtinfo',$cmtinfo);


        //获得评论的总数目
        $cmtcount = D('Comment')->where(array('is_show'=>'0'))->count();
        $this -> assign('cmtcount',$cmtcount);

        $this -> display();
    }
}
