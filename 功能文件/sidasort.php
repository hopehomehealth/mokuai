<?php

$arr=array(1,43,54,62,21,66,32,78,36,76,39); 

var_dump($arr);

//从前到后  相邻两个数进行比较
// function bubblesort($arr){
// 	$len = count($arr);

// 	//从前到后 相邻比较  $j的最大值是多少
// 	//第一层控制轮数    总共有$len-1轮
// 	for($i=0;$i<$len-1;$i++){
// 		//第二层控制每轮比较次数   $j+1最大是当i=0de shihou max(j+1) = $len-1  j= $len-2 
// 		for($j=0;$j<$len-1-$i;$j++){
//             if($arr[$j]>$arr[$j+1]){//前面的大于后面的
//             	$tmp = $arr[$j+1];
//             	$arr[$j+1] = $arr[$j];
//             	$arr[$j] = $tmp;
//             }
// 		}
// 	}
// 	return $arr;
// }


function bubbleSort($arr)
{  
  $len=count($arr);
  //该层循环控制 需要冒泡的轮数
  for($i=1;$i<$len;$i++)
  { //该层循环用来控制每轮 冒出一个数 需要比较的次数
    for($k=0;$k<$len-$i;$k++)
    {
       if($arr[$k]>$arr[$k+1])
        {
            $tmp=$arr[$k+1];
            $arr[$k+1]=$arr[$k];
            $arr[$k]=$tmp;
        }
    }
  }
  return $arr;
}

$arr=array(1,43,54,62,21,66,32,78,36,76,39); 
//选择排序  选出最小的数  《=》  第一个数  交换
  //剩下的数找出第二小的数   和   第二个位置交换
  //倒数第二个数和	最后一个数比较  位置

function selectSort($arr){
	//第一岑控制轮数  总共n-1轮  
	//第二层控制  比较次数   最大值   $j = $len-1
    $len = count($arr);
	for($i=0;$i<$len-1;$i++){
		//假设最小数的位置  总共  $len-1轮  也代表每轮假设的最小数
		$p = $i;
		//$j  足大指  $len-1(整个数组中的最大索引)
		for($j=$i+1;$j<$len;$j++){
			//$arr[$p]是当前已知的最小值
			if($arr[$p]>$arr[$j]){
				//比较  发现有跟小的    记录 以便下次比较时用到
				$p = $j;
			}
		}
		//一轮过后 确定了最小位置  保存到$p中   如果发现最小的位置和当前假设的位置$i不同  则位置交换即可
		if($p != $i){
			$tmp = $arr[$p];
			$arr[$p] = $arr[$i];
			$arr[$i] = $tmp;
		}
	}
	return $arr;
}

// var_dump(selectSort($arr));

//1bubblesort沉底      2selectsort假设第一个值为最小，开始比较，剩下来的     
//3insertsort从第二个值开始往里插入，前面的是排好序的
//插入排序
//假设前面的数是拍好的的	，将弟n个数插入到前面的有序列表中使得  行业是拍好的、、、这n个数也是排好顺序的的

//前面是拍好的
function insertsort($arr){
	$len = count($arr);
	//第一轮也是能控制插入的次数
	//n-1次    前面有一个是排好的  是$arr[0],插入的时$arr[1]到$arr[$len-1];
	for($i=1;$i<$len;$i++){
		$tmp = $arr[$i];
		//内层 循环控制  比较并且插入
		for($j=$i-1;$j>=0;$j--){
			if($tmp < $arr[$j]){//发现插入的要小，交换位置
			  // $tmp = $arr[$j+1];
			  $arr[$j+1] = $arr[$j];
			  $arr[$j] = $tmp;		
			}else{
				break;
			}
		
		}
	}
	return $arr;
}

// 0 1  2  3  4      5
// 6,17,33,44,67     4
// 6,17,33,44,4      67

var_dump(insertsort($arr));

//快速排序
//选择一个基准元素  第一个 n-1轮   大于等于的  小于的 

function quickSort(){
	$length = count($arr);
	//先判断是否需要继续进行
	if($length<=1){
		return $arr;
	}
	//选择数组中的第一个元素为基准 
	 //基准数
	$base_num = $arr[0];
	$left_array = array();
	$right_array = array();
	for($i=1;$i<$length;$i++){
		if($base_num>$arr[$i]){
			$left_array[] = $arr[$i];
		}else{
			$right_array[] = $arr[$i];
		}
	} 
	//再对左边和右边的数组进行相同的排序处理方式   地柜调用两个函数
	$left_array = qickSort($left_array);
	$right_array = qickSort($right_array);
	//合并
	return array_merge($left_array,array($base_num),$right_array);
} 




































































































?>