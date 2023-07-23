<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $title      = 'Contact';
        $companies  = Company::get();

        return view('dashboard.contact', compact('title', 'companies'));
    }
}
