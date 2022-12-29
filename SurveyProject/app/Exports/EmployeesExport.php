<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\Employee;

class EmployeesExport implements FromView
{
    public function view(): View
    {
        return view('backend.admin.reports.employees.export_employee_list', [
            'employees' => Employee::all()
        ]);
    }
}
