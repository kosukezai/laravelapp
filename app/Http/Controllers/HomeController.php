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
        
        $folder1=DB::table('folder1')->where('user_id',$user['id'])->where('status',1)->get();
        $folder2=DB::table('folder2')->where('user_id',$user['id'])->where('status',1)->get();
        
        return view('home',compact('user','folder1','folder2'));
    }

    public function store(Request $request)
    {
    $data=$request->all();

    $exist_folder1 = DB::table('folder1')->where('name', $data['name'])->where('user_id', $data['user_id'])->where('status',1)->first();
    $exist_folder2 = DB::table('folder2')->where('name', $data['twoname'])->where('user_id', $data['user_id'])->where('status',1)->first();
    
    if( empty($exist_folder1->id) ){
    
      if( empty($exist_folder2->id) ){
            
      DB::table('folder1')->insert([
        'name'=>$data['name'],
        'user_id'=>$data['user_id'],
        'status'=>1,
        'two_name'=>$data['twoname']
      ]);

      DB::table('folder2')->insert([
        'name'=>$data['twoname'],
        'user_id'=>$data['user_id'],
        'status'=>1
      ]);

      DB::table('memos')->insert([
        'content'=>$data['content'],
        'user_id'=>$data['user_id'],
        'status'=>1
        ]);
      
        }else{
        $two_name=$exist_folder2->name;
        DB::table('folder1')->insert([
        'name'=>$data['name'],
        'user_id'=>$data['user_id'],
        'status'=>1,
        'two_name'=>$two_name
      ]);
       DB::table('memos')->insert([
        'content'=>$data['content'],
        'user_id'=>$data['user_id'],
        'status'=>1
        ]);

       }
       }
       else{
           exit(1);
       }


      return redirect()->route('home');

    }

    public function edit($data)
   {
    $user = \Auth::user();
    $folder1=DB::table('folder1')->where('id',$data)->where('user_id', $user['id'])->where('status',1)->get();
    if($folder1->count()===0){
    $folder2=DB::table('folder2')->where('user_id', $user['id'])->where('status',1)->get();
    $folder1=DB::table('folder1')->where('user_id', $user['id'])->where('status',1)->where('two_name',$data)->get();
    $memos=DB::table('memos')->where('id',$folder1[0]->id)->where('user_id',$user['id'])->where('status',1)->first();
    }else{
    
    $folder2=DB::table('folder2')->where('user_id', $user['id'])->where('status',1)->get();
    $memos=DB::table('memos')->where('id',$data)->where('user_id',$user['id'])->where('status',1)->first();
    }
    
   





   return view('edit',compact('user','memos','folder2','folder1'));
   }

    public function update(Request $request, $id)
    {
        $user = \Auth::user();
        $inputs = $request->all();
        $folder1id = DB::table('folder1')->where('id',$id)->where('user_id',$user['id'])->where('status',1)->first();
        $exist_folder2 = DB::table('folder2')->where('name',$inputs['twoname'])->where('user_id',$user['id'])->where('status',1)->get();
        $exist_folder1 = DB::table('folder1')->where('name',$inputs['name'])->where('user_id',$user['id'])->where('status',1)->get();
        if($folder1id->name==$inputs['name']){
          if($exist_folder2->count()===1){
          DB::table('folder2')->where('name',$inputs['twoname'])->update(['name'=>$inputs['twoname']]);
          DB::table('folder1')->where('id',$id)->update(['name'=>$inputs['name']],['two_name'=>$inputs['twoname']]);
          DB::table('memos')->where('id', $id)->update(['content' => $inputs['content'] ]);
          }
        
          else{
          DB::table('folder2')->insert([
        'name'=>$inputs['twoname'],
        'user_id'=>$user['id'],
        'status'=>1
         ]);
          DB::table('folder1')->where('id',$id)->update(['name'=>$inputs['name']],['two_name'=>$inputs['twoname']]);
          DB::table('memos')->where('id', $id)->update(['content' => $inputs['content'] ]);
          }
          }
        elseif($exist_folder1->count()===0){
          if($exist_folder2->count()===1){
          DB::table('folder2')->where('name',$inputs['twoname'])->update(['name'=>$inputs['twoname']]);
          DB::table('folder1')->where('id',$id)->update(['name'=>$inputs['name']],['two_name'=>$inputs['twoname']]);
          DB::table('memos')->where('id', $id)->update(['content' => $inputs['content'] ]);
          }
          else{
          DB::table('folder2')->insert([
        'name'=>$inputs['twoname'],
        'user_id'=>$user['id'],
        'status'=>1
         ]);
          DB::table('folder1')->where('id',$id)->update(['name'=>$inputs['name']],['two_name'=>$inputs['twoname']]);
          DB::table('memos')->where('id', $id)->update(['content' => $inputs['content'] ]);

          }
       }else{
          exit (redirect()->route('home'));
      }
      /*tablememosとtablefolder1はくくりだしてよいのでは*/
        return redirect()->route('home');
    }

    public function delete(Request $request, $id){
    $folder1id = DB::table('folder1')->where('id',$id)->where('user_id',$user['id'])->where('status',1)->first();
    $exist_folder2 = DB::table('folder2')->where('name',$folder1id->two_name);
    if($exist_folder2->count()===1){
          DB::table('folder2')->where('name',$folder1id->two_name)->update([ 'status' => 2 ]);
          DB::table('folder1')->where('id',$id)->update([ 'status' => 2 ]);
          DB::table('memos')->where('id',$id)->update([ 'status' => 2 ]);
          }else{
          DB::table('folder1')->where('id',$id)->update([ 'status' => 2 ]);
          DB::table('memos')->where('id',$id)->update([ 'status' => 2 ]);
          }
    }

    
   }

                                                                                                                                                                                    


    

