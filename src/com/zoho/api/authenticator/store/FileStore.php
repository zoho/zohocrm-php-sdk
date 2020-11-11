<?php
namespace com\zoho\api\authenticator\store;

use com\zoho\api\authenticator\OAuthToken;

use com\zoho\crm\api\exception\SDKException;

use com\zoho\crm\api\util\Constants;

use com\zoho\api\authenticator\TokenType;

/**
 * This class stores the user token details to the file.
 */
class FileStore implements TokenStore
{
    private $filePath = null;

    private $headers = array(Constants::USER_MAIL, Constants::CLIENT_ID, Constants::REFRESH_TOKEN, Constants::ACCESS_TOKEN, Constants::GRANT_TOKEN, Constants::EXPIRY_TIME);

    /**
     * Creates an FileStore class instance with the specified parameters.
     * @param string $filePath A string containing the absolute file path to store tokens.
     */
    public function __construct($filePath)
    {
        $this->filePath = trim($filePath);
        
        $csvWriter = fopen($this->filePath, 'a');//opens file in append mode  
        
        if (trim(file_get_contents($this->filePath)) == false)
        {
            fwrite($csvWriter, implode(",", $this->headers));
        }
        
        fclose($csvWriter);  
    }
    
    public function getToken($user, $token)
    {
        $csvReader = null;
        
        try
        {
            $csvReader = file($this->filePath, FILE_IGNORE_NEW_LINES);
            
            if ($token instanceof OAuthToken)
            {
                for ($index = 1; $index < sizeof($csvReader); $index++)
                {
                    $allContents = $csvReader[$index];
            
                    $nextRecord = str_getcsv($allContents);
                    
                    if ($this->checkTokenExists($user->getEmail(), $token, $nextRecord))
                    {
                        $token->setAccessToken($nextRecord[3]);
                        
                        $token->setExpiresIn($nextRecord[5]);
                        
                        $token->setRefreshToken($nextRecord[2]);
                        
                        return $token;
                    }
                }
            }
        }
        catch (\Exception $ex)
        {            
            throw new SDKException(Constants::TOKEN_STORE, Constants::GET_TOKEN_FILE_ERROR, null, $ex);
        }

        return null;
    }
    
    
    public function saveToken($user, $token)
    {   
        $csvWriter = null;
        
        try 
        {
            
            if($token instanceof OAuthToken)
            {
                $token->setUserMail($user->getEmail());
                    
                $this->deleteToken($token);           
                
                $data = array();
                
                array_push($data, $user->getEmail());
                
                array_push($data, $token->getClientId());
                
                array_push($data, $token->getRefreshToken());
                
                array_push($data, $token->getAccessToken());
                
                array_push($data, $token->getGrantToken());
                
                array_push($data, $token->getExpiresIn());
                
                
            }
            $csvWriter = file($this->filePath);
            
            array_push($csvWriter, "\n");
            
            array_push($csvWriter, implode(",", $data));
            
            file_put_contents($this->filePath, $csvWriter);
        } 
        catch (\Exception $ex) 
        {            
            throw new SDKException(Constants::TOKEN_STORE, Constants::SAVE_TOKEN_FILE_ERROR, null, $ex);
        }
    }
    
    public function deleteToken($token)
    {
        $csvReader = null;
        
        try
        {
            $csvReader = file($this->filePath, FILE_IGNORE_NEW_LINES);
            
            $deleted = false;
            
            if( $token instanceof OAuthToken)
            {
                for ($index = 1; $index < sizeof($csvReader); $index++)
                {
                    $allContents = $csvReader[$index];
                    
                    $nextRecord = str_getcsv($allContents);
                    
                    if ($this->checkTokenExists($token->getUserMail(), $token, $nextRecord))
                    {
                        unset($csvReader[$index]);
                        
                        $deleted = true;
                        
                        break; // Stop searching after we found the email
                    }
                }
                
                // Rewrite the file if we deleted the user account details.
                if ($deleted)
                {
                    file_put_contents($this->filePath, implode("\n", $csvReader));
                }
            }
        } 
        catch(SDKException $ex)
        {
            throw $ex;
        }
        catch (\Exception $ex) 
        {            
            throw new SDKException(Constants::TOKEN_STORE, Constants::DELETE_TOKEN_FILE_ERROR, null, $ex);
        }
    }
    
    public function getTokens()
    {
        $csvReader = null;
        
        $tokens = array();
        
        try
        {
            $csvReader = file($this->filePath, FILE_IGNORE_NEW_LINES); 
            
            for ($index = 1; $index < sizeof($csvReader); $index++)
            {
                $allContents = $csvReader[$index];
                
                $nextRecord = str_getcsv($allContents);
                
                $tokenType = ($nextRecord[4]!=null && sizeof($nextRecord[4])!=0) ? TokenType::GRANT :TokenType::REFRESH;
                
                $tokenValue = $tokenType == TokenType::REFRESH ? $nextRecord[2]:$nextRecord[4];
                
                $token = new OAuthToken($nextRecord[1], null, $tokenValue, $tokenType);
                
                $token->setUserMail(strval($nextRecord[0]));

                $token->setRefreshToken($nextRecord[2]);

                $token->setAccessToken($nextRecord[3]);
                
                $token->setExpiresIn($nextRecord[5]);
                   
                $tokens[] = $token;
            }
        }
        catch (\Exception $ex)
        {
            throw new SDKException(Constants::TOKEN_STORE, Constants::GET_TOKENS_FILE_ERROR, null, $ex);
        }
        
        return $tokens;
    }

    public function deleteTokens()
    {    
        try
        {
            file_put_contents($this->filePath, implode(",", $this->headers));
        }
        catch(\Exception $ex)
        {
            throw new SDKException(Constants::TOKEN_STORE, Constants::DELETE_TOKENS_FILE_ERROR, null, $ex);
        }
    }

    private function checkTokenExists($email, $oauthToken, $row)
    {
        if ($email === null)
        {
            throw new SDKException(Constants::USER_MAIL_NULL_ERROR, Constants::USER_MAIL_NULL_ERROR_MESSAGE);  
        }
        
        $client_id = (string)$oauthToken->getClientId();
                
        $grantToken = (string)$oauthToken->getGrantToken();
        
        $refreshToken = (string)$oauthToken->getRefreshToken();
        
        $tokenCheck = $grantToken != null ? $grantToken === (string)$row[4] : $refreshToken === (string)$row[2];
       
        if($email === $row[0] && $client_id === $row[1] && $tokenCheck )
        {
            return true;
        }
        
        return false;
    }
}