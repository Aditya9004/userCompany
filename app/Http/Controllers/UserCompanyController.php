<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UserCompany;
use App\Models\Company;
use App\Models\User;

class UserCompanyController extends Controller
{
    public function add($id) {
        $title = 'Add Users To Company';
        $company = Company::find($id);
        $users = User::with('userCompany')->get();
        return view('usercompanycreate',compact('company','users','title'));
    }

    public function create($id) {
        $userArr = [];
        $userCompany = UserCompany::where('company_id',$id)->get();
        foreach(request('user') as $key => $value) {
            if($userCompany->where('user_id',$key)->isEmpty()) {
                UserCompany::create([
                    'user_id' => $key,
                    'company_id' => $id
                ]);
            } else {
                $userArr[] = $key; 
            }
        }
        if(!empty($userArr))
            UserCompany::whereNotIn('user_id',$userArr)->where('company_id',$id)->delete();
        return redirect('/companies/list')->with('status','Company Added Successfully');
    }
}
