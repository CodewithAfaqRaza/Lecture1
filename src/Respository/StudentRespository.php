<?php

namespace App\Respository;

class StudentRespository{
    private array $student = [
        4=>'Uzair',
        1=>'Bilal',
        5=>'umer'

    ];
    public function StudentsData(){
        return $this->student;
    }
}