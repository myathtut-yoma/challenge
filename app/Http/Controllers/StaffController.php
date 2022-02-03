<?php

namespace App\Http\Controllers;

use App\Http\Helpers\ResponseTrait;
use App\Services\EmployeeManagement\Employee;

class StaffController extends Controller
{
    use ResponseTrait;
    protected $staff;

    public function __construct(Employee $employee)
    {
        $this->staff = $employee;
    }

    public function payroll()
    {
        return $this->dataResponse($this->staff->salary());
    }
}
