<?php

namespace com\zoho\crm\api\record;

use com\zoho\crm\api\Header;

class GetRecordsHeader
{

    public static final function IfModifiedSince()
    {
        return new Header('If-Modified-Since', 'com.zoho.crm.api.Record.GetRecordsHeader');
    }

}