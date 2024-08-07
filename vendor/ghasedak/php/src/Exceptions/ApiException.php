<?php
namespace Ghasedak\Exceptions;

class ApiException extends \RuntimeException
{
    public function __construct($message, $code=0) {
        parent::__construct($message, $code);
    }
	
    public function errorMessage(){
        return  "[{$this->code}] : {$this->message}\r\n";
    }
}
