<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @Table(name="user")
 * @Entity
 */
class Entity_User
{
    /**
     * @var integer $userid
     *
     * @Column(name="userId", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $userid;

    /**
     * @var string $username
     *
     * @Column(name="userName", type="string", length=255, nullable=false)
     */
    private $username;

    /**
     * @var string $usermail
     *
     * @Column(name="userMail", type="string", length=255, nullable=false)
     */
    private $usermail;

    /**
     * @var string $password
     *
     * @Column(name="password", type="string", length=255, nullable=true)
     */
    private $password;

    /**
     * @var bigint $registerdate
     *
     * @Column(name="registerDate", type="bigint", nullable=false)
     */
    private $registerdate;

    /**
     * @var string $status
     *
     * @Column(name="status", type="string", length=255, nullable=false)
     */
    private $status;

    /**
     * @var string $useravatar
     *
     * @Column(name="userAvatar", type="string", length=255, nullable=false)
     */
    private $useravatar;

    /**
     * @var string $usertype
     *
     * @Column(name="userType", type="string", length=255, nullable=false)
     */
    private $usertype;


    /**
     * Get userid
     *
     * @return integer 
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * Set username
     *
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set usermail
     *
     * @param string $usermail
     */
    public function setUsermail($usermail)
    {
        $this->usermail = $usermail;
    }

    /**
     * Get usermail
     *
     * @return string 
     */
    public function getUsermail()
    {
        return $this->usermail;
    }

    /**
     * Set password
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set registerdate
     *
     * @param bigint $registerdate
     */
    public function setRegisterdate($registerdate)
    {
        $this->registerdate = $registerdate;
    }

    /**
     * Get registerdate
     *
     * @return bigint 
     */
    public function getRegisterdate()
    {
        return $this->registerdate;
    }

    /**
     * Set status
     *
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set useravatar
     *
     * @param string $useravatar
     */
    public function setUseravatar($useravatar)
    {
        $this->useravatar = $useravatar;
    }

    /**
     * Get useravatar
     *
     * @return string 
     */
    public function getUseravatar()
    {
        return $this->useravatar;
    }

    /**
     * Set usertype
     *
     * @param string $usertype
     */
    public function setUsertype($usertype)
    {
        $this->usertype = $usertype;
    }

    /**
     * Get usertype
     *
     * @return string 
     */
    public function getUsertype()
    {
        return $this->usertype;
    }
}