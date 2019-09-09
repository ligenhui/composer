<?php

/**
 * fastPayMergeCreateTrade
 * User: azhi
 * Date: 16/11/27
 * Time: 下午3:31
 */
namespace Ligenhui\Package\yijipay\message\request;

use Ligenhui\Package\yijipay\message\IRequest;

class FastPayMergeCreateTradeRequest extends IRequest{

    /**
     * 外部会员号
     * 示例： "u651654153"
     */
    protected $outUserId;

    /**
     * 买家会员号
     * 示例："20165489625847153698"
     */
    protected $buyerUserId;

    /**
     * 买家真实姓名
     * 示例："张三"
     */
    protected $buyerRealName;

    /**
     * 买家机构名
     * 示例："猪八戒科技有限公司"
     */
    protected $buyerOrgName;

    /**
     * 交易信息
     */
    protected $tradeInfo;

    function __construct(){
        $this->setService("fastPayMergeCreateTrade");
    }


    /**
     * @return string
     */
    public function getOutUserId()
    {
        return $this->outUserId;
    }

    /**
     * @param string $outUserId
     */
    public function setOutUserId($outUserId)
    {
        $this->outUserId = $outUserId;
    }

    /**
     * @return string
     */
    public function getBuyerUserId()
    {
        return $this->buyerUserId;
    }

    /**
     * @param string $buyerUserId
     */
    public function setBuyerUserId($buyerUserId)
    {
        $this->buyerUserId = $buyerUserId;
    }

    /**
     * @return string
     */
    public function getBuyerRealName()
    {
        return $this->buyerRealName;
    }

    /**
     * @param string $buyerRealName
     */
    public function setBuyerRealName($buyerRealName)
    {
        $this->buyerRealName = $buyerRealName;
    }

    /**
     * @return string
     */
    public function getBuyerOrgName()
    {
        return $this->buyerOrgName;
    }

    /**
     * @param string $buyerOrgName
     */
    public function setBuyerOrgName($buyerOrgName)
    {
        $this->buyerOrgName = $buyerOrgName;
    }


    /**
     * @return list
     */
    public function getTradeInfo()
    {
        return $this->tradeInfo;
    }

    /**
     * @param array(TradeInfo) $tradeInfo
     */
    public function setTradeInfo($tradeInfo)
    {
        $this->tradeInfo = $tradeInfo;
    }

    
}
