<?php
/****************************************************************快速排序********************************************************************* */
/**
 * 例子快速排序
 * 度娘案例
 */
//快速排序
//待排序数组
$arr=array(6,3,8,6,4,2,9,5,1);
//函数实现快速排序
function quick_sort($arr)
{
    //判断参数是否是一个数组
    if(!is_array($arr)) return false;
    //递归出口:数组长度为1，直接返回数组
    $length=count($arr);
    if($length<=1) return $arr;
    //数组元素有多个,则定义两个空数组
    $left=$right=array();
    //使用for循环进行遍历，把第一个元素当做比较的对象
    for($i=1;$i<$length;$i++)
    {
        //判断当前元素的大小
        if($arr[$i]<$arr[0]){
            $left[]=$arr[$i]; 
        }else{
            $right[]=$arr[$i];
        }
    }
    //递归调用
    $left=quick_sort($left);
    $right=quick_sort($right);
    //将所有的结果合并
    return array_merge($left,array($arr[0]),$right);
}
    //调用
    echo "<pre>";
    print_r(quick_sort($arr));

    /**
     * 复盘函数---快速排序
     */
    function fastSort($arr){
        /**
         * 非数组类型返回false
         */
        if(!is_array($arr)){
            return false;
        }
        /**递归出口等于1直接跳槽循环返回值 */
        $len=count($arr);
        if($len<=1){
            return $arr;
        }
        /**
         * 建立容器
         * 并进行循环排序
         */
        $lf=$rt=array();
        for($i=1;$i<$len;$i++){
            if($arr[$i]>$arr[0]){
                $rt[]=$arr[$i];
            }else{
                $lf[]=$arr[$i];
            }
        }
        /**
         * 递归点调用自身
         */
        $lf=fastSort($lf);
        $rt=fastSort($rt);
        /**
         * 合并新数组并反馈
         */
        return array_merge($lf,array($arr[0]),$rt);

    }
      /**
       * 验证
       * 标准格式输出
       */
      echo "<pre>";
      print_r(fastSort($arr));
      var_dump(fastSort($arr));

/**
 * 二次复盘
 * 复盘算法二-选择排序
 */

$arr = [33, 24, 8, 21, 2, 23, 3, 32, 16];

function selectSort($arr)
{
    $count = count($arr);

    if ($count < 2) {
        return $arr;
    }

    for ($i = 0; $i < $count - 1; $i++) {
        // 当前值的位置
        $key = $i;
        for ($k = $i + 1; $k < $count; $k++) {z
            // 相邻值进行比较，条件成立替换当前值
            // 倒序 $arr[$key] < $arr[$k]
            if ($arr[$key] > $arr[$k]) {
                $key = $k;
            }
        }

        if ($key != $i) {
            // 交换位置
            $temp = $arr[$key];
            $arr[$key] = $arr[$i];
            $arr[$i] = $temp;
        }
    }

    return $arr;
}

print_r(selectSort($arr));



/****************************************************************二分查找******************************************************************* */

/**
 * 二分查找
 * 度娘案例
 */
//循环实现
function getValue($num,$arr)
{
    //查找数组的中间位置
    $length=count($arr);
    $start=0;
    $end=$length;
    $middle=floor(($start+$end)/2);
    //循环判断
    while($start>$end-1)
    {
        if($arr[$middle]==$num)
        {
            return $middle+1;
        }
        elseif($arr[$middle]<$num)
        {

            //如果当前要查找的值比当前数组的中间值还要打，那么意味着该值在数组的后半段

            //所以起始位置变成当前的middle的值，end位置不变。
            $start=$middle;
            $middle=floor(($start+$end)/2);

        }else{

            //反之
            $end=$middle;
            $middle=floor(($start+$end)/2);
        }
    }

    return false;

}

 

//递归实现

/*
     * 从数组中获取元素值
     * @param1 int $num，要查找的目标值
     * @param2 array $arr，要查找的数组
     * @param3 int $start，查找的起始位置
     * @param4 int $end，查找的结束位置
     * @return mixed，找到了返回位置，没找到返回false
     */
     function getValue4($num,$arr,$start = 0,$end = 100){
        //采用二分法查找
        $middle = floor(($end + $start) / 2);

        //判断
        if($arr[$middle] == $num){
            //已经找到了，递归的出口
            return $middle + 1;
        }elseif($arr[$middle] < $num){
            //要查找的元素在数组的后半段
            $start = $middle + 1;
            //边界值
            if($start >= $end){
                //没有找到，但是已经超出边界值，递归出口
                return false;
            }
            //调用自己去查找：递归点
            return getValue4($num,$arr,$start,$end);    //getValue4($num,$arr,51,100)
        }else{
            //要查找的元素在数组的前半段
            $end = $middle - 1;
            //判断边界值
            if($end < 0)return false;

            //调用自己：递归点
            return getValue4($num,$arr,$start,$end);    //getValue4($num,$arr,0,49)
        }

        //都没有找到
        return false;
     }

/**
 * 二次复盘
 * 二次复盘-二分查询
 */
//。1循环实现
$arr=array();
//。2递归实现

