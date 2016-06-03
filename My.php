<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 15/12/10
 * Time: 上午1:21
 */

//返回API执行结果（执行die输出）
function MySuccess($data, $code)
{
    $result = array("data"=>$data,"code"=>(int)$code);
    //$result = json_encode($result);
    $result = MyJsonEncode($result);
    die($result);
}

function MyError($type, $code){
    $result = array("type"=>$type,"code"=>(int)$code);
    //$result = json_encode($result);
    $result = MyJsonEncode($result);
    die($result);
}

//数组转换保留为中文的JSON字符串
function MyJsonEncode($data){
    return urldecode(json_encode(MyUrlEncode($data)));
    //需要PHP版本5.4以上：
    //return json_encode($data,JSON_UNESCAPED_UNICODE);
}

//自定义的URL编码
function MyUrlEncode($data) {
    //可对关联数组进行URL编码，并处理换行符
    //内部递归调用
    //用于MyJsonEncode函数调用
    if(!is_array($data)){
        $data = str_replace("\r",'\r',$data);
        $data = str_replace("\n",'\n',$data);
        $data = urlencode($data);
    }
    else {
        foreach($data as $key=>$value) {
            $data[MyUrlEncode($key)] = MyUrlEncode($value);
            if((string)MyUrlEncode($key)!==(string)$key){
                unset($data[$key]);
            }
        }
    }
    return $data;
}

/**
 *  @desc 根据两点间的经纬度计算距离
 *  @param float $lat 纬度值
 *  @param float $lng 经度值
 */
function getDistance($lat1, $lng1, $lat2, $lng2)
{
    $earthRadius = 6367000; //approximate radius of earth in meters

    /*
      Convert these degrees to radians
      to work with the formula
    */

    $lat1 = ($lat1 * pi() ) / 180;
    $lng1 = ($lng1 * pi() ) / 180;

    $lat2 = ($lat2 * pi() ) / 180;
    $lng2 = ($lng2 * pi() ) / 180;

    /*
      Using the
      Haversine formula

      http://en.wikipedia.org/wiki/Haversine_formula

      calculate the distance
    */

    $calcLongitude = $lng2 - $lng1;
    $calcLatitude = $lat2 - $lat1;
    $stepOne = pow(sin($calcLatitude / 2), 2) + cos($lat1) * cos($lat2) * pow(sin($calcLongitude / 2), 2);
    $stepTwo = 2 * asin(min(1, sqrt($stepOne)));
    $calculatedDistance = $earthRadius * $stepTwo;

    return round($calculatedDistance);
}