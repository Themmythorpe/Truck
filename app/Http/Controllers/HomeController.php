<?php

namespace App\Http\Controllers;

use App\truck;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function sq(Request $request)
    {
        $query = $request->get('query');
        $data = truck::where('type_of_vec', 'like', '%'.$query.'%')
            ->orWhere('classic_no', 'like', '%'.$query.'%')
            ->orWhere('destination', 'like', '%'.$query.'%')
            ->orWhere('information', 'like', '%'.$query.'%')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('fsearch', compact('data'));
    }
    public function reg()
    {
        return view('register');
    }
    public function preg()
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required',
            'conf_pass' => 'required|same:password',
        ]);

        $email = request('email');
        $pass = request('password');
        $data['password'] = Hash::make(request('password'));
        if (request('check') == "off") {
            return back()->with('err', 'You have to agree with the Term and Condition given!');
        }else{
            User::create($data);
            if (Auth::attempt(['email' => $email, 'password' =>  $pass])) {
                return redirect('/dashboard');
            }
        }
    }
    public function login()
    {
        return view('login');
    }
    public function plogin()
    {
        $data = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $email = request('email');
        $pass = request('password');

        if (Auth::attempt(['email' => $email, 'password' =>  $pass])) {
            return redirect('/dashboard');
        }else{
            return redirect('/pages_login')->with('err','Email or Password is not Correct!');
        }

    }
    public function dashboard()
    {
        $trucks = truck::get();

        return view('/index2', compact('trucks'));
    }
    public function add_truckPage()
    {
        return view('add-truck');
    }
    public function add_truck()
    {
        $data = request()->validate([
            'type_of_vec' => 'required',
            'classic_no' => 'required',
            'destination' => 'required',
            'information' => 'required',
        ]);
        truck::create($data);
        return redirect('/dashboard')->with('success','Created Successfully!');
    }
    public function bsq(Request $request)
    {
        $query = $request->get('query');
        $data = truck::where('type_of_vec', 'like', '%'.$query.'%')
            ->orWhere('classic_no', 'like', '%'.$query.'%')
            ->orWhere('destination', 'like', '%'.$query.'%')
            ->orWhere('information', 'like', '%'.$query.'%')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('bsearch', compact('data'));
    }
}
