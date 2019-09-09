<?php
/**
 * Created by PhpStorm.
 * User: azhi
 * Date: 2016/11/28
 * Time: 18:54
 */

namespace Ligenhui\Package\yijipay\message\request\dto;


class DTO implements \JsonSerializable
{

    /**
     *  注意: 需要子类的属性为protected，不能为private，否则获取不到
     * @return array
     */
    public function jsonSerialize(){
        $params = get_object_vars($this);
        $para_filter = array();
        while (list ($key, $val) = each ($params)) {
            if($val == "") continue;
            else	$para_filter[$key] = $params[$key];
        }
        ksort($para_filter);
        reset($para_filter);
        return $para_filter;
    }
}