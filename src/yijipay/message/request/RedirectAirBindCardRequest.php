<?php
/**
 * User: azhi
 * Date: 2016/10/02 10:20:15
 */
namespace Ligenhui\Package\yijipay\message\request;

use Ligenhui\Package\yijipay\message\IRequest;

class RedirectAirBindCardRequest extends IRequest{
    
    /**
     * 外部用户id	字符串(0-64)	是	外部用户id	142534521655621515
     * @var string
     */
    protected $outUserId;
    /**
     * 对公对私类型	字符串	否	对公对私类型  CORPORATE
     * @var string
     */
    protected $personalCorporateType;
    /**
     * 真实姓名	字符串(0-64)	否	仅供对私签约使用	张三
     * @var string
     */
    protected $realName;
    /**
     * 身份证号码	字符串(0-64)	否	仅供对私签约使用	3851244685126216511567
     * @var string
     */
    protected $certNo;
    /**
     * 手机号码	字符串(0-11)	否	手机号码	10086100801
     * @var string
     */
    protected $mobile;
    /**
     * 银行卡号	字符串(0-32)	否	银行卡号	10086100801
     * @var string
     */
    protected $cardNo;
    /**
     * 用户终端类型	字符串	否	为空则取userAgent   PC
     * @var string
     */
    protected $userTerminalType;
    /**
     * 是否显示结果	字符串	否	true:当前页面...    true
     * @var string
     */
    protected $showResult;
    /**
     * 信息是否可修改	字符串	否	默认true	true
     * @var string
     */
    protected $canModifyElement;
    /**
     * 银行简称	字符串	否	银行简称	ABC
     * @var string
     */
    protected $bankCode;

    
    function __construct(){
        //服务名
        $this->setService("redirectAirBindCard");

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
    public function getPersonalCorporateType()
    {
        return $this->personalCorporateType;
    }

    /**
     * @param string $personalCorporateType
     */
    public function setPersonalCorporateType($personalCorporateType)
    {
        $this->personalCorporateType = $personalCorporateType;
    }
    
    /**
     * @return string
     */
    public function getRealName()
    {
        return $this->realName;
    }

    /**
     * @param string $realName
     */
    public function setRealName($realName)
    {
        $this->realName = $realName;
    }
    
    /**
     * @return string
     */
    public function getCertNo()
    {
        return $this->certNo;
    }

    /**
     * @param string $certNo
     */
    public function setCertNo($certNo)
    {
        $this->certNo = $certNo;
    }
    
    /**
     * @return string
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @param string $mobile
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    }
    
    /**
     * @return string
     */
    public function getCardNo()
    {
        return $this->cardNo;
    }

    /**
     * @param string $cardNo
     */
    public function setCardNo($cardNo)
    {
        $this->cardNo = $cardNo;
    }
    
    /**
     * @return string
     */
    public function getUserTerminalType()
    {
        return $this->userTerminalType;
    }

    /**
     * @param string $userTerminalType
     */
    public function setUserTerminalType($userTerminalType)
    {
        $this->userTerminalType = $userTerminalType;
    }
    
    /**
     * @return string
     */
    public function getShowResult()
    {
        return $this->showResult;
    }

    /**
     * @param string $showResult
     */
    public function setShowResult($showResult)
    {
        $this->showResult = $showResult;
    }
    
    /**
     * @return string
     */
    public function getCanModifyElement()
    {
        return $this->canModifyElement;
    }

    /**
     * @param string $canModifyElement
     */
    public function setCanModifyElement($canModifyElement)
    {
        $this->canModifyElement = $canModifyElement;
    }
    
    /**
     * @return string
     */
    public function getBankCode()
    {
        return $this->bankCode;
    }

    /**
     * @param string $bankCode
     */
    public function setBankCode($bankCode)
    {
        $this->bankCode = $bankCode;
    }
    
}