<?php
/**
 * Created by PhpStorm.
 * User: azhi
 * Date: 2016/11/28
 * Time: 18:54
 */

namespace Ligenhui\Package\yijipay\message\request\dto;


class CommandPayOrder extends DTO
{
    /**
     * 单笔交易外部订单号	字符串(1-64)	是	单笔交易外部订单号	234531545
     * @var string
     */
    protected $merchOrderNo;
    /**
     * 交易名称	字符串(0-64)	否	交易名称	购买电视机
     * @var string
     */
    protected $tradeName;
    /**
     * 卖家的易极付会员id	字符串(0-20)	否   pactNo与se...    20165148968752486415
     * @var string
     */
    protected $sellerUserId;
    /**
     * 绑卡编号	字符串(0-32)	否   会员在易极付绑定银...    6891654
     * @var string
     */
    protected $pactNo;
    /**
     * 交易金额	money类型	是	交易金额	84.51
     * @var string
     */
    protected $tradeAmount;
    /**
     * 商品类型码,该字段用户自定义	字符串(0-64)	否   商品类型码,该字段...    5146854
     * @var string
     */
    protected $goodsTypeCode;
    /**
     * 商品类型名称	字符串(0-64)	否	商品类型名称	计算机
     * @var string
     */
    protected $goodsTypeName;
    /**
     * 商品名称	字符串(0-64)	是	商品名称	笔记本电脑
     * @var string
     */
    protected $goodsName;
    /**
     * 备注	字符串(0-128)	否	备注	备注
     * @var string
     */
    protected $memo;
    /**
     * 卖家机构名	字符串	否	卖家机构名	猪八戒科技有限公司
     * @var string
     */
    protected $sellerOrgName;
    /**
     * 未付款自动关闭时间	整型	否   单位为分钟，默认1...    14400
     * @var string
     */
    protected $autoCloseDuration;

    /**
     * @return string
     */
    public function getMerchOrderNo()
    {
        return $this->merchOrderNo;
    }

    /**
     * @param string $merchOrderNo
     */
    public function setMerchOrderNo($merchOrderNo)
    {
        $this->merchOrderNo = $merchOrderNo;
    }

    /**
     * @return string
     */
    public function getTradeName()
    {
        return $this->tradeName;
    }

    /**
     * @param string $tradeName
     */
    public function setTradeName($tradeName)
    {
        $this->tradeName = $tradeName;
    }

    /**
     * @return string
     */
    public function getSellerUserId()
    {
        return $this->sellerUserId;
    }

    /**
     * @param string $sellerUserId
     */
    public function setSellerUserId($sellerUserId)
    {
        $this->sellerUserId = $sellerUserId;
    }

    /**
     * @return string
     */
    public function getPactNo()
    {
        return $this->pactNo;
    }

    /**
     * @param string $pactNo
     */
    public function setPactNo($pactNo)
    {
        $this->pactNo = $pactNo;
    }

    /**
     * @return string
     */
    public function getTradeAmount()
    {
        return $this->tradeAmount;
    }

    /**
     * @param string $tradeAmount
     */
    public function setTradeAmount($tradeAmount)
    {
        $this->tradeAmount = $tradeAmount;
    }

    /**
     * @return string
     */
    public function getGoodsTypeCode()
    {
        return $this->goodsTypeCode;
    }

    /**
     * @param string $goodsTypeCode
     */
    public function setGoodsTypeCode($goodsTypeCode)
    {
        $this->goodsTypeCode = $goodsTypeCode;
    }

    /**
     * @return string
     */
    public function getGoodsTypeName()
    {
        return $this->goodsTypeName;
    }

    /**
     * @param string $goodsTypeName
     */
    public function setGoodsTypeName($goodsTypeName)
    {
        $this->goodsTypeName = $goodsTypeName;
    }

    /**
     * @return string
     */
    public function getGoodsName()
    {
        return $this->goodsName;
    }

    /**
     * @param string $goodsName
     */
    public function setGoodsName($goodsName)
    {
        $this->goodsName = $goodsName;
    }

    /**
     * @return string
     */
    public function getMemo()
    {
        return $this->memo;
    }

    /**
     * @param string $memo
     */
    public function setMemo($memo)
    {
        $this->memo = $memo;
    }

    /**
     * @return string
     */
    public function getSellerOrgName()
    {
        return $this->sellerOrgName;
    }

    /**
     * @param string $sellerOrgName
     */
    public function setSellerOrgName($sellerOrgName)
    {
        $this->sellerOrgName = $sellerOrgName;
    }

    /**
     * @return string
     */
    public function getAutoCloseDuration()
    {
        return $this->autoCloseDuration;
    }

    /**
     * @param string $autoCloseDuration
     */
    public function setAutoCloseDuration($autoCloseDuration)
    {
        $this->autoCloseDuration = $autoCloseDuration;
    }

    
}