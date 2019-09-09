<?php
/**
 * User: azhi
 * Date: 2016/10/02 10:20:15
 */
namespace Ligenhui\Package\yijipay\message\request;

use Ligenhui\Package\yijipay\message\IRequest;

class PpmNewRuleRegisterUserRequest extends IRequest{
    
    /**
     * 用户名	字符串	是	用户名	admin
     * @var string
     */
    protected $userName;
    /**
     * 注册用户类型	字符串	是	注册用户类型PERSONAL
     * @var string
     */
    protected $registerUserType;
    /**
     * 手机号	字符串(11)	是	手机号	admin
     * @var string
     */
    protected $mobile;
    /**
     * 邮箱	字符串	否	邮箱	admin@yiji.com
     * @var string
     */
    protected $email;
    /**
     * 行为	字符串	否	如有特殊需求请与易...    REGISTERP
     * @var string
     */
    protected $behavior;

    
    function __construct(){
        //服务名
        $this->setService("ppmNewRuleRegisterUser");

    }
    

    /**
     * @return string
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param string $userName
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
    
    /**
     * @return string
     */
    public function getBehavior()
    {
        return $this->behavior;
    }

    /**
     * @param string $behavior
     */
    public function setBehavior($behavior)
    {
        $this->behavior = $behavior;
    }
    
}