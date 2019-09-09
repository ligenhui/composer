<?php
/**
 * User: azhi
 * Date: 2016/10/02 10:20:15
 */
namespace Ligenhui\Package\yijipay\message\request;

use Ligenhui\Package\yijipay\message\IRequest;

class OpenPaymentAccountRequest extends IRequest{
    
    /**
     * 终端类型	字符串	否	默认取user agent   PC
     * @var string
     */
    protected $userTerminalType;
    /**
     * 用户注册类型	字符串	否	用户注册类型  PERSONAL
     * @var string
     */
    protected $registerUserType;
    /**
     * 外部用户id	字符串(0-100)	是	外部用户id	216521651821
     * @var string
     */
    protected $outUserId;
    /**
     * 易极付用户id	字符串(20)	否	易极付用户id	216521651821
     * @var string
     */
    protected $userId;
    /**
     * 是否需要展示标题	字符串(1)	否	企业/个体户可传入该参数    1
     * @var string
     */
    protected $title;
    /**
     * 营业执照类型	字符串(1)	否	企业/个体户可传入该参数    G
     * @var string
     */
    protected $enterpriseLicenseType;
    /**
     * 企业名称	字符串(0-100)	否   企业/个体户可传入...    重庆易极付科技有限公司
     * @var string
     */
    protected $enterpriseName;
    /**
     * 营业执照号	字符串(0-32)	否	企业/个体户可传入...    safasdfdasasfds
     * @var string
     */
    protected $licenceNo;
    /**
     * 单位所在省	字符串(0-20)	否	企业/个体户可传入...    重庆
     * @var string
     */
    protected $province;
    /**
     * 单位所在市	字符串(0-20)	否   企业/个体户可传入...    重庆
     * @var string
     */
    protected $city;
    /**
     * 单位所在地址	字符串(0-255)	否	企业/个体户可传入...    重庆市渝北区黄山大道中段
     * @var string
     */
    protected $address;
    /**
     * 营业期限	字符串	否	企业/个体户可传入...    2016-12-05
     * @var string
     */
    protected $businessTerm;
    /**
     * 经营范围	字符串(0-500)	否   企业/个体户可传入...    计算机经营
     * @var string
     */
    protected $businessScope;
    /**
     * 组织结构代码	字符串(0-64)	否   企业/个体户可传入...    35541065sdf
     * @var string
     */
    protected $organizationCode;
    /**
     * 控股人类型	字符串	否	企业/个体户可传入该参数    HOLDING_COM
     * @var string
     */
    protected $holdingType;
    /**
     * 手机号码	字符串	否	个人用户可以传入该参数	10086100101
     * @var string
     */
    protected $mobile;
    /**
     * 职业	字符串	否	个人用户可以传入该参数 COMPUTER
     * @var string
     */
    protected $profession;
    /**
     * 营业执照照片路径	字符串	否	企业/个体户可传入...    http://www.yiji.com/1...
     * @var string
     */
    protected $licensePhotoPath;
    /**
     * 法人身份证正面照片路径	字符串	否   企业/个体户可传入...    http://www.yiji.com/1...
     * @var string
     */
    protected $legalCertFrontPath;
    /**
     * 法人身份证反面照片路径	字符串	否   企业/个体户可传入...    http://www.yiji.com/1...
     * @var string
     */
    protected $legalCertBackPath;
    /**
     * 组织机构代码证照片	字符串	否   企业/个体户可传入...    http://www.yiji.com/1...
     * @var string
     */
    protected $organizationCodePath;
    /**
     * 开户许可证照片路径	字符串	否	企业/个体户可传入...    http://www.yiji.com/1...
     * @var string
     */
    protected $openLicensePath;
    /**
     * 税务登记证照片路径	字符串	否   企业/个体户可传入...    http://www.yiji.com/1...
     * @var string
     */
    protected $taxCertPath;
    /**
     * 特许经营许可证一	字符串	否   企业/个体户可传入...    http://www.yiji.com/1...
     * @var string
     */
    protected $specialBusinessFirst;
    /**
     * 委托授权书照片	字符串	否   企业/个体户可传入...    http://www.yiji.com/1...
     * @var string
     */
    protected $attorneyPath;
    /**
     * 代理人身份证正面照片	字符串	否   企业/个体户可传入...    http://www.yiji.com/1...
     * @var string
     */
    protected $agentCertFrontPath;
    /**
     * 代理人身份证反面照片	字符串	否	企业/个体户可传入...    http://www.yiji.com/1...
     * @var string
     */
    protected $agentCertBackPath;
    /**
     * 个人身份证件正面照片	字符串	否	个人用户可以传入该参数 http://www.yiji.com/1...
     * @var string
     */
    protected $personCertFrontPath;
    /**
     * 个人身份证反面照片	字符串	否	个人用户可以传入该参数	http://www.yiji.com/1...
     * @var string
     */
    protected $personCertBackPath;
    /**
     * 是否设置支付密码	字符串	否	false：不设置...
     * @var string
     */
    protected $setPayPwd;

    
    function __construct(){
        //服务名
        $this->setService("openPaymentAccount");

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
    public function getRegisterUserType()
    {
        return $this->registerUserType;
    }

    /**
     * @param string $registerUserType
     */
    public function setRegisterUserType($registerUserType)
    {
        $this->registerUserType = $registerUserType;
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
    
    /**
     * @return string
     */
    public function getEnterpriseLicenseType()
    {
        return $this->enterpriseLicenseType;
    }

    /**
     * @param string $enterpriseLicenseType
     */
    public function setEnterpriseLicenseType($enterpriseLicenseType)
    {
        $this->enterpriseLicenseType = $enterpriseLicenseType;
    }
    
    /**
     * @return string
     */
    public function getEnterpriseName()
    {
        return $this->enterpriseName;
    }

    /**
     * @param string $enterpriseName
     */
    public function setEnterpriseName($enterpriseName)
    {
        $this->enterpriseName = $enterpriseName;
    }
    
    /**
     * @return string
     */
    public function getLicenceNo()
    {
        return $this->licenceNo;
    }

    /**
     * @param string $licenceNo
     */
    public function setLicenceNo($licenceNo)
    {
        $this->licenceNo = $licenceNo;
    }
    
    /**
     * @return string
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * @param string $province
     */
    public function setProvince($province)
    {
        $this->province = $province;
    }
    
    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }
    
    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }
    
    /**
     * @return string
     */
    public function getBusinessTerm()
    {
        return $this->businessTerm;
    }

    /**
     * @param string $businessTerm
     */
    public function setBusinessTerm($businessTerm)
    {
        $this->businessTerm = $businessTerm;
    }
    
    /**
     * @return string
     */
    public function getBusinessScope()
    {
        return $this->businessScope;
    }

    /**
     * @param string $businessScope
     */
    public function setBusinessScope($businessScope)
    {
        $this->businessScope = $businessScope;
    }
    
    /**
     * @return string
     */
    public function getOrganizationCode()
    {
        return $this->organizationCode;
    }

    /**
     * @param string $organizationCode
     */
    public function setOrganizationCode($organizationCode)
    {
        $this->organizationCode = $organizationCode;
    }
    
    /**
     * @return string
     */
    public function getHoldingType()
    {
        return $this->holdingType;
    }

    /**
     * @param string $holdingType
     */
    public function setHoldingType($holdingType)
    {
        $this->holdingType = $holdingType;
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
    public function getProfession()
    {
        return $this->profession;
    }

    /**
     * @param string $profession
     */
    public function setProfession($profession)
    {
        $this->profession = $profession;
    }
    
    /**
     * @return string
     */
    public function getLicensePhotoPath()
    {
        return $this->licensePhotoPath;
    }

    /**
     * @param string $licensePhotoPath
     */
    public function setLicensePhotoPath($licensePhotoPath)
    {
        $this->licensePhotoPath = $licensePhotoPath;
    }
    
    /**
     * @return string
     */
    public function getLegalCertFrontPath()
    {
        return $this->legalCertFrontPath;
    }

    /**
     * @param string $legalCertFrontPath
     */
    public function setLegalCertFrontPath($legalCertFrontPath)
    {
        $this->legalCertFrontPath = $legalCertFrontPath;
    }
    
    /**
     * @return string
     */
    public function getLegalCertBackPath()
    {
        return $this->legalCertBackPath;
    }

    /**
     * @param string $legalCertBackPath
     */
    public function setLegalCertBackPath($legalCertBackPath)
    {
        $this->legalCertBackPath = $legalCertBackPath;
    }
    
    /**
     * @return string
     */
    public function getOrganizationCodePath()
    {
        return $this->organizationCodePath;
    }

    /**
     * @param string $organizationCodePath
     */
    public function setOrganizationCodePath($organizationCodePath)
    {
        $this->organizationCodePath = $organizationCodePath;
    }
    
    /**
     * @return string
     */
    public function getOpenLicensePath()
    {
        return $this->openLicensePath;
    }

    /**
     * @param string $openLicensePath
     */
    public function setOpenLicensePath($openLicensePath)
    {
        $this->openLicensePath = $openLicensePath;
    }
    
    /**
     * @return string
     */
    public function getTaxCertPath()
    {
        return $this->taxCertPath;
    }

    /**
     * @param string $taxCertPath
     */
    public function setTaxCertPath($taxCertPath)
    {
        $this->taxCertPath = $taxCertPath;
    }
    
    /**
     * @return string
     */
    public function getSpecialBusinessFirst()
    {
        return $this->specialBusinessFirst;
    }

    /**
     * @param string $specialBusinessFirst
     */
    public function setSpecialBusinessFirst($specialBusinessFirst)
    {
        $this->specialBusinessFirst = $specialBusinessFirst;
    }
    
    /**
     * @return string
     */
    public function getAttorneyPath()
    {
        return $this->attorneyPath;
    }

    /**
     * @param string $attorneyPath
     */
    public function setAttorneyPath($attorneyPath)
    {
        $this->attorneyPath = $attorneyPath;
    }
    
    /**
     * @return string
     */
    public function getAgentCertFrontPath()
    {
        return $this->agentCertFrontPath;
    }

    /**
     * @param string $agentCertFrontPath
     */
    public function setAgentCertFrontPath($agentCertFrontPath)
    {
        $this->agentCertFrontPath = $agentCertFrontPath;
    }
    
    /**
     * @return string
     */
    public function getAgentCertBackPath()
    {
        return $this->agentCertBackPath;
    }

    /**
     * @param string $agentCertBackPath
     */
    public function setAgentCertBackPath($agentCertBackPath)
    {
        $this->agentCertBackPath = $agentCertBackPath;
    }
    
    /**
     * @return string
     */
    public function getPersonCertFrontPath()
    {
        return $this->personCertFrontPath;
    }

    /**
     * @param string $personCertFrontPath
     */
    public function setPersonCertFrontPath($personCertFrontPath)
    {
        $this->personCertFrontPath = $personCertFrontPath;
    }
    
    /**
     * @return string
     */
    public function getPersonCertBackPath()
    {
        return $this->personCertBackPath;
    }

    /**
     * @param string $personCertBackPath
     */
    public function setPersonCertBackPath($personCertBackPath)
    {
        $this->personCertBackPath = $personCertBackPath;
    }
    
    /**
     * @return string
     */
    public function getSetPayPwd()
    {
        return $this->setPayPwd;
    }

    /**
     * @param string $setPayPwd
     */
    public function setSetPayPwd($setPayPwd)
    {
        $this->setPayPwd = $setPayPwd;
    }
    
}