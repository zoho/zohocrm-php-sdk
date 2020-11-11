<?php

namespace com\zoho\api\authenticator;

use com\zoho\crm\api\util\APIHTTPConnector;

/**
 * This interface verifies and sets token to APIHTTPConnector instance.
 */
interface Token
{
    /**
     * This method to set authentication token to APIHTTPConnector instance.
     * @param APIHTTPConnector $connector A APIHTTPConnector class instance.
     */
    public function authenticate(APIHTTPConnector $urlConnection);
    
    /**
     * The method to remove the current token from the Store.
     */
    public function remove();
}
