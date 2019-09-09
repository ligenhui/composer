<?php
/**
 * User: azhi
 * Date: 2016/10/02 10:20:15
 */
namespace Ligenhui\Package\yijipay\message\request;

use Ligenhui\Package\yijipay\message\IRequest;

class CommandPayTradeCreateRequest extends IRequest{
    
    /**
     * 外部会员id	字符串(1-64)	否	外部会员id	651654153
     * @var string
     */
    protected $outUserId;
    /**
     * 买家(易极付)用户id	字符串(20)	否	买家(易极付)用户id	20165489625847153698
     * @var string
     */
    protected $buyerUserId;
    /**
     * 买家真实姓名	字符串(1-64)	否	买家真实姓名	张三
     * @var string
     */
    protected $buyerRealName;
    /**
     * 用户终端ip	字符串(0-128)	否	用户终端ip	192.168.49.57
     * @var string
     */
    protected $userEndIp;
    /**
     * 交易信息	数组对象类型	是	交易信息	[{"merchOrderNo":"234...
     * @var array CommandPayOrder
     */
    protected $commandPayOrders;
    /**
     * 买家机构名	字符串	否	买家机构名	猪八戒科技有限公司
     * @var string
     */
    protected $buyerOrgName;

    
    function __construct(){
        //服务名
        $this->setService("commandPayTradeCreate");
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
    public function getUserEndIp()
    {
        return $this->userEndIp;
    }

    /**
     * @param string $userEndIp
     */
    public function setUserEndIp($userEndIp)
    {
        $this->userEndIp = $userEndIp;
    }
    
    /**
     * @return array
     */
    public function getCommandPayOrders()
    {
        return $this->commandPayOrders;
    }

    /**
     * @param array $commandPayOrders
     */
    public function setCommandPayOrders($commandPayOrders)
    {
        $this->commandPayOrders = $commandPayOrders;
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
    
}