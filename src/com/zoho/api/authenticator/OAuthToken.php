<?php
namespace com\zoho\api\authenticator;

use com\zoho\crm\api\util\APIHTTPConnector;

use com\zoho\crm\api\Initializer;

use com\zoho\crm\api\util\Constants;

use com\zoho\crm\api\exception\SDKException;

use com\zoho\api\authenticator\Token;

use Exception;

use com\zoho\api\logger\SDKLogger;

/**
 * This class contains different types of token.
 */
class TokenType
{
    const REFRESH = Constants::REFRESH;

    const GRANT = Constants::GRANT;
};

/**
 * This class gets the tokens and checks the expiry time.
 */
class OAuthToken implements Token
{
    private $clientID = null;
    
    private $clientSecret = null;
    
    private $redirectURL = null;
    
    private $grantToken = null;
    
    private $refreshToken = null;
    
    private $accessToken = null;
    
    private $expiresIn = null;
    
    private $userMail = null;

    private $id = null;
    
    /**
     * Creates an OAuthToken class instance with the specified parameters.
     * @param string $clientID A string containing the OAuth client id.
     * @param string $clientSecret A string containing the OAuth client secret.
     * @param string $token A string containing the REFRESH/GRANT token.
     * @param string $type A class containing the given token type.
     * @param string $redirectURL A string containing the OAuth redirect URL.
     */
    public function __construct($clientID, $clientSecret, $token, $token_type, $redirectURL=null)
    {
        $error = array();

        if ($clientID != null && strtolower(gettype($clientID)) !== strtolower(Constants::STRING_NAMESPACE)) 
        {
            $error[Constants::FIELD] = Constants::CLIENT_ID;
    
            $error[Constants::EXPECTED_TYPE] = Constants::STRING_NAMESPACE;
    
            $error[Constants::CLASS_KEY] = get_class();
    
            throw new SDKException(Constants::TOKEN_ERROR, null, $error, null);
        }

        if ($clientSecret != null && strtolower(gettype($clientSecret)) !== strtolower(Constants::STRING_NAMESPACE)) 
        {
            $error[Constants::FIELD] = Constants::CLIENT_SECRET;
    
            $error[Constants::EXPECTED_TYPE] = Constants::STRING_NAMESPACE;
    
            $error[Constants::CLASS_KEY] = get_class();
    
            throw new SDKException(Constants::TOKEN_ERROR, null, $error, null);
        }
    
        if ($redirectURL != null && strtolower(gettype($redirectURL)) !== strtolower(Constants::STRING_NAMESPACE)) 
        {
            $error[Constants::FIELD] = Constants::REDIRECT_URL;
    
            $error[Constants::EXPECTED_TYPE] = Constants::STRING_NAMESPACE;
    
            $error[Constants::CLASS_KEY] = get_class();
    
            throw new SDKException(Constants::TOKEN_ERROR, null, $error, null);
        }

        if (strtolower(gettype($token)) !== strtolower(Constants::STRING_NAMESPACE)) 
        {
            $error[Constants::FIELD] = Constants::TOKEN;
    
            $error[Constants::EXPECTED_TYPE] = Constants::STRING_NAMESPACE;
    
            $error[Constants::CLASS_KEY] = get_class();
    
            throw new SDKException(Constants::TOKEN_ERROR, null, $error, null);
        }

        if ($token_type instanceof TokenType) 
        {
            $error[Constants::FIELD] = Constants::TOKEN_TYPE;
            
            $error[Constants::EXPECTED_TYPE] = Constants::STRING_NAMESPACE;
            
            $error[Constants::CLASS_KEY] = get_class();
            
            throw new SDKException(Constants::TOKEN_ERROR, null, $error, null);
        }

        $this->clientID = $clientID;
        
        $this->clientSecret = $clientSecret;
        
        $this->redirectURL = $redirectURL;
        
        $this->grantToken = $token_type == Constants::GRANT ? $token : null;
        
        $this->refreshToken = $token_type == Constants::REFRESH ? $token : null;
    }
    
    /**
     * This is a getter method to get OAuth client id.
     * @return string A string representing the OAuth client id.
     */
    public function getClientId()
    {
        return $this->clientID;
    }
    
    /**
     * This is a getter method to get OAuth client secret.
     * @return string A string representing the OAuth client secret.
     */
    public function getClientSecret()
    {
        return $this->clientSecret;
    }
    
    /**
     * This is a getter method to get OAuth redirect URL.
     * @return string A string representing the OAuth redirect URL.
     */
    public function getRedirectURL()
    {
        return $this->redirectURL;
    }
    
    /**
     * This is a getter method to get grant token.
     * @return NULL|string A string representing the grant token.
     */
    public function getGrantToken()
    {
        return $this->grantToken;
    }
    
    /**
     * This is a getter method to get refresh token.
     * @return NULL|string|mixed A string representing the refresh token.
     */
    public function getRefreshToken()
    {
        return $this->refreshToken;
    }
    
    /**
     * This is a setter method to set refresh token.
     * @param string $refreshToken A string containing the refresh token.
     */
    public function setRefreshToken($refreshToken)
    {
        return $this->refreshToken = $refreshToken;
    }
    
    /**
     * This is a getter method to get ID.
     * @return NULL|string|mixed A string representing the refresh token.
     */
    public function getId()
    {
        return $this->id;
    }
    
     /**
     * This is a setter method to set ID.
     * @param string $id A string containing the ID.
     */
    public function setId($id)
    {
        return $this->id = $id;
    }
    
    /**
     * This is a getter method to get user Mail.
     * @return NULL|string|mixed A string representing the refresh token.
     */
    public function getUserMail()
    {
        return $this->userMail;
    }
    
    /**
     * This is a setter method to set user Mail.
     * @param string $id A string containing the user Mail.
     */
    public function setUserMail($userMail)
    {
        return $this->userMail = $userMail;
    }
    
    /**
     * This is a getter method to get access token.
     * @return string A string representing the access token.
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }
    
    /**
     * This is a setter method to set access token.
     * @param string $accessToken A string containing the access token.
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
    }
    
    /**
     * This is a getter method to get token expire time.
     * @return string A string representing the token expire time.
     */
    public function getExpiresIn()
    {
        return $this->expiresIn;
    }
    
    /**
     * This is a setter method to set token expire time.
     * @param string $expiresIn A string containing the token expire time.
     */
    public function setExpiresIn($expiresIn)
    {
        $this->expiresIn = $expiresIn;
    }
    
    public function authenticate(APIHTTPConnector $urlConnection)
    {
        try
        {
            $initializer = Initializer::getInitializer();
        
            $store = $initializer->getStore();
            
            $user = $initializer->getUser();
            
            $oauthToken = $store->getToken($user, $this);
            
            $token = null;
            
            if ($oauthToken == null)//first time
            {
                $token = $this->refreshToken != null ? $this->refreshAccessToken($user, $store)->getAccessToken() : $this->generateAccessToken($user, $store)->getAccessToken();
            }
            else if ($this->isAccessTokenExpired($oauthToken->getExpiresIn())) //access token will expire in next 5 seconds or less
            {
                SDKLogger::info(Constants::REFRESH_TOKEN_MESSAGE);
    
                $token = $oauthToken->refreshAccessToken($user, $store)->getAccessToken();
            }
            else
            {
                $token = $oauthToken->getAccessToken();
            }
            
            $urlConnection->addHeader(Constants::AUTHORIZATION, Constants::OAUTH_HEADER_PREFIX . $token); 
        }
        catch(SDKException $ex)
        {
            throw $ex;
        }
        catch(\Exception $ex)
        {
            throw new SDKException(null, null, null, $ex);
        }
    }
    
    public function getResponseFromServer($request_params)
    {
        $curl_pointer = curl_init();

        curl_setopt($curl_pointer, CURLOPT_URL, Initializer::getInitializer()->getEnvironment()->getAccountsUrl());
        
        curl_setopt($curl_pointer, CURLOPT_HEADER, 1);
        
        curl_setopt($curl_pointer, CURLOPT_POSTFIELDS, $this->getUrlParamsAsString($request_params));
        
        curl_setopt($curl_pointer, CURLOPT_RETURNTRANSFER, true);
        
        curl_setopt($curl_pointer, CURLOPT_USERAGENT, Constants::USER_AGENT);
        
        curl_setopt($curl_pointer, CURLOPT_POST, count($request_params));
        
        curl_setopt($curl_pointer, CURLOPT_CUSTOMREQUEST, Constants::REQUEST_METHOD_POST);
        
        $result = curl_exec($curl_pointer);

        curl_close($curl_pointer);
        
        return $result;
    }
    
    private function refreshAccessToken($user, $store)
    {
        $request_params = array();
        
        $request_params[Constants::CLIENT_ID] =  $this->clientID;
        
        $request_params[Constants::CLIENT_SECRET] =  $this->clientSecret;
        
        $request_params[Constants::REDIRECT_URL] =  $this->redirectURL;
        
        $request_params[Constants::GRANT_TYPE] = Constants::REFRESH_TOKEN;
        
        $request_params[Constants::REFRESH_TOKEN] =  $this->refreshToken;

        $response = $this->getResponseFromServer($request_params);
        
        try
        {
            $store->saveToken($user, $this->processResponse($response));
        }
        catch(SDKException $ex)
        {
            throw $ex;
        }
        catch (\Exception $ex)
        {
            
            throw new SDKException(null, Constants::SAVE_TOKEN_ERROR, null, $ex);
        }
        
        return $this;
    }
    
    public function generateAccessToken($user, $store)
    {
        $request_params = array();
        
        $request_params[Constants::CLIENT_ID] =  $this->clientID;
        
        $request_params[Constants::CLIENT_SECRET] =  $this->clientSecret;
        
        $request_params[Constants::REDIRECT_URL] =  $this->redirectURL;
        
        $request_params[Constants::GRANT_TYPE] = Constants::GRANT_TYPE_AUTH_CODE;
        
        $request_params[Constants::CODE] = $this->grantToken;
        
        $response = $this->getResponseFromServer($request_params);
        
        try
        {
            $store->saveToken($user, $this->processResponse($response));
            
        }
        catch(SDKException $ex)
        {
            throw $ex;
        }
        catch (\Exception $ex)
        {
            
            throw new SDKException(null, Constants::SAVE_TOKEN_ERROR, null, $ex);
        }
        
        return $this;
    }
    
    
    public function processResponse($response)
    {
        $headerRows = explode("\n",$response);
        
        $responseBody = end($headerRows);
        
        $jsonResponse = json_decode($responseBody, true);
        
        if (!array_key_exists(Constants::ACCESS_TOKEN, $jsonResponse))
        {            
            throw new SDKException(Constants::INVALID_CLIENT_ERROR, $jsonResponse[Constants::ERROR]);
        }
        
        $this->accessToken = $jsonResponse[Constants::ACCESS_TOKEN];
        
        $this->expiresIn = $this->getTokenExpiresIn($jsonResponse);
        
        if (array_key_exists(Constants::REFRESH_TOKEN, $jsonResponse))
        {
            $this->refreshToken = $jsonResponse[Constants::REFRESH_TOKEN];
        }
        
        return $this;
    }
    
    private function getTokenExpiresIn($response)
    {
        $expiresIn = $response[Constants::EXPIRES_IN];
        
        if(!array_key_exists(Constants::EXPIRES_IN_SEC, $response))
        {
            $expiresIn= $expiresIn * 1000;
        }
        
        return $this->getCurrentTimeInMillis() + $expiresIn;
    }
    
    public function getCurrentTimeInMillis()
    {
        return round(microtime(true) * 1000);
    }
    
    public function isAccessTokenExpired($expiry_time)
    {
        return ((((int)$expiry_time) - $this->getCurrentTimeInMillis()) < 5000);
    }
    
    public function getUrlParamsAsString($urlParams)
    {
        $params_as_string = "";
        
        foreach ($urlParams as $key => $value)
        {
            $params_as_string = $params_as_string . $key . "=" . $value . "&";
        }
        
        $params_as_string = rtrim($params_as_string, "&");
        
        $params_as_string = str_replace(PHP_EOL, '', $params_as_string);
        
        return $params_as_string;
    }
    
    public function remove()
    {
        try
        {
            Initializer::getInitializer()->getStore()->deleteToken($this);

            return true;
        }
        catch(SDKException $ex)
        {
            throw $ex;
        }
        catch (\Exception $ex)
        {
            throw new SDKException(null, null, null, $ex);
        }
    }
}