<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companies;

class CompaniesController extends Controller
{
    // Show all companies
    public function index()
    {
        $companies = Companies::paginate(10);
        return view('auth.info.companies', compact('companies'));

   
    }

    // Show form to create a new company
    public function create()
    {
        return view('auth.info.create-company');
    }

    // Store a newly created company in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'website' => 'nullable|url',
            'logo' => 'nullable|image|dimensions:min_width=100,min_height=100',
        ]);

        // Handle logo (upload or fallback to API)
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('logos', 'public');
            $logo = $path;
        } else {
            $logo = 'http://picsum.photos/seed/' . rand(0, 10000) . '/100';
        }

        Companies::create([
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
            'logo' => $logo,
        ]);

        return redirect()->route('companies')->with('status', 'Company created successfully!');
    }

    // Show a specific company (not implemented yet)
    public function show(Companies $company)
    {
        //
    }

    // Show form to edit an existing company (not implemented yet)
    public function edit(Companies $company)
    {
        //
    }

    // Update a company in the database (not implemented yet)
    public function update(Request $request, Companies $company)
    {
        //
    }

    // Delete a company
    public function destroy(Companies $company)
    {
        $company->delete();
        return redirect()->route('companies')->with('status', 'Company deleted successfully!');
    }
}
