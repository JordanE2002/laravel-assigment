<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;

    // ✅ Define mass-assignable fields
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'company',
    ];
}