<?php

namespace App\Http\Controllers;

use App\Http\Helpers\ResponseTrait;
use App\Services\EmployeeManagement\Employee;

class JobController extends Controller
{
    use ResponseTrait;
    protected $employee;

    public function __construct(Employee $employee)
    {
        $this->employee = $employee;
    }

    public function apply()
    {
        return $this->dataResponse($this->employee->applyJob());
    }
}
