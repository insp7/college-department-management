<?php
/**
 * Created by PhpStorm.
 * User: Dhananjay
 * Date: 6/28/2019
 * Time: 11:35 AM
 */

namespace App\Exceptions;


use Exception;

class BaseException extends Exception
{
    protected $message;
    /**
     * BaseException constructor.
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    public function errorMessage()
    {
        return $this->message;
    }
}