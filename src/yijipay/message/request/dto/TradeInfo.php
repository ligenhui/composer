<?php
/**
 * Created by PhpStorm.
 * User: azhi
 * Date: 2016/11/28
 * Time: 18:54
 */

namespace Ligenhui\Package\yijipay\message\request\dto;


class TradeInfo extends DTO
{
    protected $merchOrderNo;  //	单笔交易外部订单号	字符串(1-64)	是	单笔交易外部订单号	234531545
    protected $tradeName;     //	交易名称	字符串(0-64)	否	交易名称	及时到账
    protected $sellerUserId;  //	卖家的易极付会员id	字符串(0-20)	否 pactNo与sellerUserId不能同时传入，也不能同时为空 20165148968752486415
    protected $pactNo;        //	绑卡编号	字符串(0-32)	会员在易极付绑定银行卡完成后易极付返回的绑卡编号，pactNo与sellerUserId不能同时传入，也不能同时为空 6891654
    protected $tradeAmount;   //	交易金额	money类型	是	交易金额	84.51
    protected $currency="CNY";//	交易币种	字符串	是	交易币种 CNY
    protected $goodsTypeCode; // 商品类型码	字符串(0-64)	否	商品类型码	5146854
    protected $goodsTypeName; //	商品类型名称	字符串(0-64)	否	商品类型名称	计算机
    protected $goodsName;     //	商品名称	字符串(0-64)	是	商品名称	笔记本电脑
    protected $memo;          //	备注	字符串(0-128)	否	备注	备注
    protected $shareProfits;  //	分润信息	字符串	否   分润最多支持10笔...    201265894795225817521...
    protected $sellerOrgName;  //	卖家机构名	字符串	否	卖家机构名	猪八戒科技有限公司
    protected $autoCloseDuration;//	未付款订单自动关闭时间	整型	否   默认10天，单位分...    14400

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
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
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
    public function getShareProfits()
    {
        return $this->shareProfits;
    }

    /**
     * @param string $shareProfits
     */
    public function setShareProfits($shareProfits)
    {
        $this->shareProfits = $shareProfits;
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

    public function jsonSerialize(){
//        return  paramsFilter(get_object_vars($this));
        return  get_object_vars($this);
    }
}