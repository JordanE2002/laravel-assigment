<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    /** @use HasFactory<\Database\Factories\CompaniesFactory> */
    use HasFactory;

    protected $fillable = ['name', 'email', 'logo', 'website'];

    public function employees()
    {
        return $this->hasMany(Employees::class, 'company_id');  // One company has many employees
    }
}