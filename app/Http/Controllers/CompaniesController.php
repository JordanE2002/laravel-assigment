<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companies; // Using plural model name

class CompaniesController extends Controller
{
    // Show all companies
    public function index()
    {
        $companies = Companies::all(); // Fetch all companies
        return view('auth.info.companies', compact('companies'));
    }

    // Show a form to create a new company
    public function create()
    {
        //
    }

    // Store a newly created company in the database
    public function store(Request $request)
    {
        //
    }

    // Show details of a specific company
    public function show(Companies $companies)
    {
        //
    }

    // Show a form to edit an existing company
    public function edit(Companies $companies)
    {
        //
    }

    // Update a company in the database
    public function update(Request $request, Companies $companies)
    {
        //
    }

    // Delete a company from the database
    public function destroy(Companies $companies)
    {
        
    }
}