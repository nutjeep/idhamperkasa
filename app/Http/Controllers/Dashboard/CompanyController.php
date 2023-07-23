<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Company;
use App\Http\Controllers\Controller;
use App\Models\CompanyDetail;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $title      = 'Company';
        $companies    = Company::get();

        return view('dashboard.company', compact('title', 'companies'));
    }

    public function update(Request $request, $slug)
    {
        $company = Company::where('slug', $slug)->first();
        $detail = CompanyDetail::where('company_id', $company->id)->first();

        $detail->about  = $request->about;
        $detail->visi   = $request->visi;
        $detail->misi   = $request->misi;

        // dd($request);
        $detail->save();

        notify()->success('Profil Berhasil Diubah!', 'Success!');
        
        return redirect()->route('dashboard.company');
    }
}
