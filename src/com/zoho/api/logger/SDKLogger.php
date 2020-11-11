<?php

namespace com\zoho\api\logger;

use Exception;

use com\zoho\api\logger\Logger;

use com\zoho\crm\api\exception\SDKException;

/**
 * This class to initialize the SDK logger.
 */
class SDKLogger
{
    private static $logPrecedence = array("OFF", "FATAL", "ERROR", "WARNING", "INFO", "DEBUG", "TRACE", "ALL");
    
    private static $filePath = null;
    
    private static $level = null;
   
    public static function initialize(Logger $log)
    {
        self::$filePath = $log->getFilePath();
        
        self::$level =$log->getLevel();
    }
    
    private static function checkLevel($messageLevel, $loggerLevel)
    {
        $message_index = array_search($messageLevel , self::$logPrecedence);
        
        $logger_index = array_search($loggerLevel, self::$logPrecedence);
        
        return ($message_index <= $logger_index) ? TRUE : FALSE;
    }
    
    public static function writeToFile($messageLevel, $msg)
    {
        if(self::$level == "OFF")
        {
            return;
        }
        
        $filePointer = fopen(self::$filePath, "a");
        
        if (!$filePointer) 
        {
            return;
        }
        
        if(self::$level == "ALL" || self::checkLevel($messageLevel, self::$level) == TRUE)
        {
            fwrite($filePointer, sprintf("%s %s %s %s\n", date("Y-m-d H:i:s"), "com\zoho\api\logger\SDKLogger", $messageLevel, $msg));
            
            fclose($filePointer);
        }
    }
    
    public static function warn($msg)
    {
        self::writeToFile("WARNING", $msg);
    }
    
    public static function info($msg)
    {
        self::writeToFile("INFO",  $msg);
    }
    
    public static function severe(Exception $e)
    {
        $message = self::parseException($e);
        
        self::writeToFile("SEVERE", $message);
    }

    public static function severeError($message, Exception $e=null)
    {
        $parsedMessage = $message;
        
        if($e != null)
        {
            $parsedMessage = $parsedMessage . " " . self::parseException($e);
        }

        self::writeToFile("SEVERE", $parsedMessage);
    }
    
    private static function parseException(Exception $e)
    {
        $message = "";

        if($e instanceof SDKException)
        {
            $message = $message . $e->__toString() . "\n";
        }

        $message = $message . $e->getFile() . "- " . $e->getLine() . "- " . $e->getMessage() . "\n";
        
        $message = $message . $e->getTraceAsString();
        
        return $message;
    }

    public static function err(Exception $e)
    {
        $message = self::parseException($e);
        
        self::writeToFile("ERROR", $message);
    }

    public static function error($message)
    {
        self::writeToFile("ERROR", $message);
    }
    
    public static function debug($msg)
    {
        self::writeToFile("DEBUG", $msg);
    }
}
?>