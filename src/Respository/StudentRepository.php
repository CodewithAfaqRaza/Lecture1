<?php

namespace App\Respository;

use Psr\Log\LoggerInterface;

class StudentRepository{
    public function __construct(private LoggerInterface $logger)
    {
        
    }
    private array $student = [
        4=>'Uzair',
        1=>'Bilal',
        5=>'umer'

    ];
    public function StudentsData(){
        $this->logger->info("We are currently connected to the Repo Class");
        return $this->student;
    }
}