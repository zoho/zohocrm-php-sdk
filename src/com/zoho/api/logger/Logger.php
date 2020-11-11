<?php

namespace com\zoho\api\logger;

/**
 * This class representing the Logger level and log file path.
 */
class Logger
{
    private $filePath = null;
    
    private $level = null;
    
    private function __construct($level, $filePath)
    {
        $this->level = $level;
        
        $this->filePath = $filePath;
    }
    
    /**
     * Creates an Logger class instance with the specified log level and file path.
     * @param Levels $level A string containing the log level.
     * @param string $filePath A string containing the log file path.
     * @return \com\zoho\api\logger\Logger A Logger class instance.
     */
    public static function getInstance($level, $filePath)
    {
        return new Logger($level, $filePath);
    }
    
    /**
     * This is a getter method to get logger level.
     * @return string A string representing the logger level.
     */
    public function getLevel()
    {
        return $this->level;
    }
    
    /**
     * This is a getter method to get log file path.
     * @return string A string representing the log file path.
     */
    public function getFilePath()
    {
        return $this->filePath;
    }
}
?>