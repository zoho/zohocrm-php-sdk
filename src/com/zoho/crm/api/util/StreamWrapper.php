<?php
namespace com\zoho\crm\api\util;

use com\zoho\crm\api\exception\SDKException;

/**
 * This class handles the file stream and name.
 */
class StreamWrapper
{
    private $name;

    private $stream;

    /**
     * Creates a StreamWrapper class instance with the specified parameters.
     * @param string $name A string containing the file name.
     * @param object $stream A object containing the file stream.
     * @param string $filepath A string containing the absolute file path.
     */
    public function __construct($name, $stream, $filepath)
    {
        $this->name = $name;
        
        $this->stream = $stream;
        
        if ($filepath != null)
        {
            if(file_exists($filepath))
            {
                $file = fopen($filepath, "rb");
             
                $this->name = basename($filepath);
                
                $this->stream = fread($file, filesize($filepath));
                
                fclose($file);
            }
            else
            {
                throw new SDKException(Constants::FILE_ERROR, Constants::FILE_DOES_NOT_EXISTS." ".$filepath);
            }
        }
    }

    /**
     * This is a getter method to get the file name.
     * @return string A string representing the file name.
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * This is a getter method to get the file input stream.
     * @return object A object representing the file input stream.
     */
    public function getStream()
    {
        return $this->stream;
    }
}