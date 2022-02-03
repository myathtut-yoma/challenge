<?php

namespace App\Services\EmployeeManagement;

class EmployeeService implements Employee
{

    public function applyJob(): bool
    {
        return true;
    }

    public function salary(): int
    {
        return 200;
    }
}