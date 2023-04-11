<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = \Auth::user();
        
       
        return view('home',compact('user'));
    }

    public function store(Request $request)
    {
    $data=$request->all();
      DB::table('memos')->insert([
        'content'=>$data['content'],
        'user_id'=>$data['user_id'],
        'status'=>1
    ]);
       
        return redirect()->route('home');


    }
    
}
