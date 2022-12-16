<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Account;
use App\Models\Employee;
use App\Models\History;
use App\Models\News;
use App\Models\LoanType;
use App\Models\BankUser;
use Laravel\Socialite\Facades\Socialite;


class HomeController extends Controller
{
    public function welcome()
    {
        $loan=LoanType::all();
        return view('welcome')->with('loantypes', $loan);
    }

    public function contactus()
    {
        return view('home.contact');
    }

    public function aboutus()
    {
        return view('home.about');
    }

    public function news()
    {
        $news=News::orderby('created_at','desc')->get();
        return view('home.news')->with('news', $news);
    }

    public function login()
    {
        return view('home.login');
    }

    public function loginSubmit(Request $rqst)
    {
        $validation = $rqst->validate(
            [
                'username'=>'required|string',
                'password'=>'required|string',
            ],
            [
                'username.required'=>'*Please give valid username!',
                'password.required'=>'*Please give correct password',
            ]
        );
        $admin = Admin::where('adminname', $rqst->username)
                           ->where('password', md5($rqst->password))
                           ->first();
        $employee = Employee::where('empname', $rqst->username)
                           ->where('password', md5($rqst->password))
                           ->first();
        $customer = Account::where('accountname', $rqst->username)
                           ->where('password', md5($rqst->password))
                           ->first();
        if($admin)
        {
            $rqst->session()->put('adminid', $admin->id);
            $rqst->session()->put('adminName', $admin->adminname);
            return redirect()->route('AdminDashboard');
        }
        elseif($employee)
        {
            $rqst->session()->put('empid', $employee->id);
            return redirect()->route('home.news');
        }
        elseif($customer)
        {
            if($customer->accountstate=="ACTIVE")
            {
                $rqst->session()->put('accountid', $customer->id);
                return redirect()->route('account.dashboard');
            }
            elseif($customer->accountstate=="INACTIVE")
            {
                return back()->with('loginerror', 'Your Request is processing. Please check back again after a while!');
            }
            elseif($customer->accountstate=="DISABLE")
            {
                return back()->with('loginerror', 'Your account has been disabled by admin. Please contact to Account Relationship Manager!');
            }
        }
        else {
            return back()->with('loginerror', '*Please Enter Valid Credentials!');
        }
        
    }

    public function redirectToGoogle() {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback() {
        $user = Socialite::driver('google')->user();
        
        $bank_user = BankUser::Where('email', $user->email)->first();
        if(!$bank_user) {
            $obj = new BankUser();
            $obj->firstname = $user->name;
            $obj->email = $user->email;
            $obj->save();

            $id = $obj->id;

            $obj_acc = new Account();
            $obj_acc->accountname = $user->name;
            $obj_acc->accounttype = 'Savings Account';
            $obj_acc->password = md5(12345678);
            $obj_acc->accountbalance = '0';
            $obj_acc->accountinterestrate = '7.50';
            $obj_acc->accountstate = 'ACTIVE'; 
            $obj_acc->bank_user_id = $id; 
            $obj_acc->save();

            $varhistory = new History();
            $varhistory->historydate=date("Y-m-d");
            $varhistory->remarks="Opening Balance";
            $varhistory->debit=0.00;
            $varhistory->credit=00.00;
            $varhistory->account_id=$obj_acc->id;
            $varhistory->save();

            session()->put('accountid', $obj_acc->id);
            return redirect()->route('account.dashboard');

        }
    }

    public function logout()
    {
        session()->forget('adminid');
        session()->forget('adminName');
        session()->forget('empid');
        session()->forget('accountid');
        return redirect()->route('home.home');
    }
}
