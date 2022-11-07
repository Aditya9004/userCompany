<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Company;
use App\Models\UserCompany;

class CompanyController extends Controller
{
    public function list() {
        $companies = Company::all();
        $title = 'Company List';
        return view('companieslist',compact('companies','title'));
    }

    public function add() {
        $title = 'Add Company';
        return view('companycreate',compact('title'));
    }

    public function create() {
        Company::create([
            'name' => request()->get('name')
        ]);
        return redirect('/companies/list')->with('status','Company Added Successfully');
    }

    public function edit($id) {
        $company = Company::find($id);
        $title = 'Edit Company';
        return view('companyedit',compact('company','title'));
    }

    public function update($id) {
        $company = Company::find($id);
        if(!$company) {
            return redirect('/companies/list')->with('error','Company Not Found');
        }
        $company->update(['name'=>request()->get('name')]);
        return redirect('/companies/list')->with('status','Company Updated Successfully');

    }

    public function delete() {
        $companyID = request()->get('id');
        $company = Company::find($companyID);
        if(!$company) {
            return response()->json(['success'=>false,'message'=>"Company Not Found"]);
        }
        $company->delete();
        UserCompany::where('company_id',$companyID)->delete();
        return response()->json(['success'=>true, 'message'=>"Company Deleted Successfully"]);
    }
}
