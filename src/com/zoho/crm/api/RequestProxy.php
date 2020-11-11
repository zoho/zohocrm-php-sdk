<?php
namespace com\zoho\crm\api;

use com\zoho\crm\api\exception\SDKException;

class RequestProxy
{
    private $host = null;
    
    private $port =null;
    
    private $user =null;
    
    private $password = null;
    
    public function __construct(string $host , int $port, string $user = null, string $password = null)
    {
        if($host == null)
        {
            throw new SDKException(Constants::REQUEST_PROXY_ERROR, Constants::HOST_ERROR_MESSAGE);
        }
        if($port == null)
        {
            throw new SDKException(Constants::REQUEST_PROXY_ERROR, Constants::PORT_ERROR_MESSAGE);
        }
        
        $this->host = $host;
        
        $this->port = $port;
        
        $this->user = $user;
        
        $this->password = $password != null?$password : "";
    }
    
    /**
     * This is a getter method to get Proxy host.
     * @return string host
     */
    public function getHost()
    {
        return $this->host;
    }
    
    /**
     * This is a getter method to get Proxy port.
     * @return string port
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * This is a getter method to get Proxy user name.
     * @return string user
     */
    public function getUser()
    {
        return $this->user;
    }
    
    /**
     * This is a getter method to get Proxy password.
     * @return string password
     */
    public function getPassword()
    {
        return $this->password;
    }
}
?>