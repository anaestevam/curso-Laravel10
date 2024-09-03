<?php

namespace App\DTO;

class CreateSupportDTO
{
    public function __construct(public string $subject, public string $body,  public string $status)
    {
       
    }
}