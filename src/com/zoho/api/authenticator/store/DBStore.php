<?php

namespace com\zoho\api\authenticator\store;

use com\zoho\api\authenticator\OAuthToken;

use com\zoho\api\authenticator\TokenType;

use com\zoho\crm\api\exception\SDKException;

use com\zoho\crm\api\util\Constants;

use Exception;

/**
 * 
 * This class stores the user token details to the MySQL DataBase.
 *
 */
class DBStore implements TokenStore
{
    private $userName = null;
    
    private $portNumber = null;
    
    private $password = null;
    
    private $host = null;
    
    private $databaseName = null;
    
    /**
     * Create an DBStore class instance with the specified parameters.
     * @param string $host A string containing the DataBase host name.
     * @param string $databaseName A String containing the DataBase name.
     * @param string $userName A String containing the DataBase user name.
     * @param string $password A String containing the DataBase password.
     * @param string $portNumber A String containing the DataBase port number.
     */
    public function __construct($host = null, $databaseName = null, $userName = null, $password = null, $portNumber = null)
    {
        $this->host = $host != null ? $host : Constants::MYSQL_HOST;
        
        $this->databaseName = $databaseName != null ? $databaseName : Constants::MYSQL_DATABASE_NAME;
        
        $this->userName = $userName != null ? $userName : Constants::MYSQL_USER_NAME;
        
        $this->password = $password != null ? $password : "";
        
        $this->portNumber = $portNumber != null ? $portNumber : Constants::MYSQL_PORT_NUMBER;
    }
    
    public function getToken($user, $token)
    {
        $connection = null;
        
        try
        {
            $connection = $this->getMysqlConnection();
            
            if($token instanceof OAuthToken)
            {
                $query = $this->constructDBQuery($user->getEmail(), $token, false);
                
                $result = mysqli_query($connection, $query);
                
                if ($result)
                {
                    while ($row = mysqli_fetch_row($result))
                    {
                        $token->setAccessToken($row[4]);
                        
                        $token->setExpiresIn($row[6]);
                        
                        $token->setRefreshToken($row[3]);
                        
                        return $token;
                    }
                }
            }
        }
        catch (\Exception $ex)
        {   
            throw new SDKException(Constants::TOKEN_STORE, Constants::GET_TOKEN_DB_ERROR, null, $ex);
        }
        finally
        {
            if ($connection != null)
            {
                $connection->close();
            }
        }
        
        return null;
    }
    
    public function saveToken($user, $token)
    {   
        $connection = null;
        
        try
        {   
            if($token instanceof OAuthToken)
            {
                $token->setUserMail($user->getEmail());

                $this->deleteToken($token);
            
                $connection = $this->getMysqlConnection();
            
                $query = "INSERT INTO oauthtoken(user_mail,client_id,refresh_token,access_token,grant_token,expiry_time) VALUES(?,?,?,?,?,?)";
            
                $stmt = mysqli_prepare($connection, $query);

                $email = $user->getEmail();
                
                $clientId = $token->getClientId();
                
                $refreshToken = $token->getRefreshToken();
                
                $accessToken = $token->getAccessToken();
                
                $grantToken =$token->getGrantToken();
                
                $expiresIn = $token->getExpiresIn();

                $stmt->bind_param('ssssss', $email, $clientId, $refreshToken, $accessToken, $grantToken, $expiresIn);
            }
            
            $result = $stmt->execute();
            
            if (!$result)
            {
                $message = $connection != null ? $connection->error : null;

                throw new Exception(null, null, $message);
            }
        }
        catch (\Exception $ex)
        {            
            throw new SDKException(Constants::TOKEN_STORE, Constants::SAVE_TOKEN_DB_ERROR, null, $ex);
        }
        finally
        {
            if ($connection != null)
            {
                $connection->close();
            }
        }
    }
    
    public function deleteToken($token)
    {
        $connection = null;
        
        try
        {
            $connection = $this->getMysqlConnection();
            
            if($token instanceof OAuthToken)
            {
                $query = $this->constructDBQuery($token->getUserMail(), $token);
                
                $result = mysqli_query($connection, $query);
                
                if (! $result)
                {
                    throw new Exception($connection->error);
                }
            } 
        }
        catch (SDKException $ex)
        {
            throw $ex;
        }
        catch (\Exception $ex)
        {            
            throw new SDKException(Constants::TOKEN_STORE, Constants::DELETE_TOKEN_DB_ERROR, null, $ex);
        }
        finally
        {
            if ($connection != null)
            {
                $connection->close();
            }
        }
    }
    
    private function getMysqlConnection()
    {
        $mysqli_con = new \mysqli($this->host . ":". $this->portNumber, $this->userName, $this->password, $this->databaseName);
        
        if ($mysqli_con->connect_errno)
        {
            throw new Exception($mysqli_con->connect_error);
        }
        
        return $mysqli_con;
    }

    public function getTokens()
    {
        $connection = null;
        
        $tokens = array();
        
        try
        {
            $connection = $this->getMysqlConnection();
            
            {
                $query = "select * from oauthtoken;";
                
                $result = mysqli_query($connection, $query);
                
                if ($result)
                {
                    while ($row = mysqli_fetch_row($result))
                    {   
                        $tokenType = ($row[5] !== null && $row[5] !== Constants::NULL_VALUE && sizeof($row[5]) !== 0) ? TokenType::GRANT : TokenType::REFRESH;
                       
                        $tokenValue = $tokenType === TokenType::REFRESH ? $row[3] : $row[5];
                        
                        $token = new OAuthToken($row[2], null, $tokenValue, $tokenType);
                        
                        $token->setId($row[0]);
                        
                        $token->setUserMail($row[1]);
                        
                        $token->setAccessToken($row[4]);
                        
                        $token->setExpiresIn($row[6]);
                        
                        $token->setRefreshToken($row[3]);
                        
                        $tokens[] = $token;
                    }
                }
            }
        }
        catch (\Exception $ex)
        {
            throw new SDKException(Constants::TOKEN_STORE, Constants::GET_TOKENS_DB_ERROR, null, $ex);
        }
        finally
        {
            if ($connection != null)
            {
                $connection->close();
            }
        }
        
        return $tokens;
    }

    public function deleteTokens()
    {
        $connection = null;
        
        try
        {
            $connection = $this->getMysqlConnection();
            
            $query = "delete from oauthtoken";
            
            mysqli_query($connection, $query);
            
        }
        catch (\Exception $ex)
        {
            throw new SDKException(Constants::TOKEN_STORE, Constants::DELETE_TOKENS_DB_ERROR, null, $ex);
        }
        finally
        {
            if ($connection != null)
            {
                $connection->close();
            }
        }
    }

    private function constructDBQuery($email, $token, $is_delete=true)
    {
        if ($email === null)
        {
            throw new SDKException(Constants::USER_MAIL_NULL_ERROR, Constants::USER_MAIL_NULL_ERROR_MESSAGE);
            
        }
        $query = $is_delete ? "delete from " : "select * from ";
        
        $query .= "oauthtoken where user_mail='" . $email. "' and client_id='" . $token->getClientId() . "' and ";

        if ($token->getGrantToken() != null)
        {
            $query .= "grant_token='" . $token->getGrantToken() . "'";
        }
        else
        {
            $query .= "refresh_token='" . $token->getRefreshToken() . "'";
        }
        
        return $query;
    }
}