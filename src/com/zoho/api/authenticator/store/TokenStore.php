<?php

namespace com\zoho\api\authenticator\store;

use com\zoho\api\authenticator\Token;

use com\zoho\crm\api\UserSignature;

/**
 * This interface stores the user token details.
 */
interface TokenStore
{
    /**
     * This method is used to get user token details.
     * @param UserSignature $user A UserSignature class instance.
     * @param Token $token A Token class instance.
     * @return Token A Token class instance representing the user token details.
     */
    public function getToken($user, $token);
    
    /**
     * This method is used to store user token details.
     * @param UserSignature $user A UserSignature class instance.
     * @param Token $token A Token class instance.
     */
    public function saveToken($user, $token);
    
    /**
     * This method is used to delete user token details.
     * @param Token $token A Token class instance.
     */
    public function deleteToken($token);
    
    /**
     * The method to retrieve all the stored tokens.
     */
    public function getTokens();
    
    /**
     * The method to delete all the stored tokens.
     */
    public function deleteTokens();
}