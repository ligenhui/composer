<?php
/**
 * User: azhi
 * Date: 2016/10/02 10:20:15
 */
namespace Ligenhui\Package\yijipay\message\request;

use Ligenhui\Package\yijipay\message\IRequest;

class WalletRequest extends IRequest{
    
    /**
     * 易极付用户ID	字符串(20)	是	易极付用户ID	21345678901234567980
     * @var string
     */
    protected $userId;
    /**
     * 终端类型	字符串	否	默认取agent类型
     * @var string
     */
    protected $termnalType;

    
    function __construct(){
        //服务名
        $this->setService("wallet");
    }
    

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }
    
    /**
     * @return string
     */
    public function getTermnalType()
    {
        return $this->termnalType;
    }

    /**
     * @param string $termnalType
     */
    public function setTermnalType($termnalType)
    {
        $this->termnalType = $termnalType;
    }
    
}