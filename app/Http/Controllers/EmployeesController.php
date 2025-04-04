<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees; // Correct model name

class EmployeesController extends Controller
{
    // Show all employees
    public function index()
    {
        $employees = Employees::paginate(1);
        return view('auth.info.employees', compact('employees'));
    }

    // Show a form to create a new employee
    public function create()
    {
        //
    }

    // Store a newly created employee in the database
    public function store(Request $request)
    {
        //
    }

    // Show details of a specific employee
    public function show(Employees $employee) // Correct model name
    {
        //
    }

    // Show a form to edit an existing employee
    public function edit(Employees $employee)
    {
        //
    }

    // Update an employee in the database
    public function update(Request $request, Employees $employee)
    {
        //
    }

    // Delete an employee from the database
    public function destroy(Employees $employee)
    {
        $employee->delete();
    return redirect()->route('employees')->with('status', 'Employee deleted successfully!');
    }
}
