<?php

namespace App\Http\Controllers;
use Session;
use Redirect;
use Auth;
use Illuminate\Http\Request;
use DB;
use App\Registers;
//use Illuminate\Contracts\Auth\Guard as GuardContract;
class LogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $unm=$request->input('email');
        $pwd=$request->input('password');
        //$cpwd=$request->input('cpassword');

        $checkLogin1=DB::table('logs')->where(['login_email'=>$unm,'login_password'=>$pwd,'login_type'=>1])->get();//Customer
        $checkLogin2=DB::table('logs')->where(['login_email'=>$unm,'login_password'=>$pwd,'login_type'=>2])->get();//Designer
        $checkLogin3=DB::table('logs')->where(['login_email'=>$unm,'login_password'=>$pwd,'login_type'=>3])->get();//Distributor
        $checkLogin4=DB::table('logs')->where(['login_email'=>$unm,'login_password'=>$pwd,'login_type'=>0])->get();//admin

            //dd($unm);
            //dd($pwd);
            foreach($checkLogin4 as $object)
            {
                $log_id=$object->log_id;
                $login_email=$object->login_email;
                $reg_id=$object->reg_id;
            }
          // dd($reg_id);
/*
            $this->validate($request,[     
                'email' => 'required|email',
                'password' => 'required|password',                
             ]);
            $email = $request->get('email');
            session(['email' => $email]);
            $value = session('email');
            $password = $request->get('password');
            $a = Registers::where('login_email', $email)->get();//where login is the model
            return $a;
                

            foreach ($a as $object)
            {
                if($object->login_password == $password)
                {
                    if($object->login_type =='1')//User
                    {  
                        //return $value;
                        return view('customer.customer')->with('sess',$value);
                    }
                    elseif($object->membertype =='2')//Designer
                    {
                        return view('designer.designer')->with('sess',$value);
                    }
                    elseif($object->membertype =='3')//Distributor
                    {
                        return view('distributor.distributor')->with('sess',$value);
                    }
                    else
                    {
                        return view('admin.admin');
                    }
                }
                else{
                    return redirect('/log')->with('success','Invalid User name / Password !');
                }
            }*/




       if(count($checkLogin1)>0)
        {
            session_start();
            $request->session()->put('login_email',$unm);
            return view('customer.customer');
            
        }
        if(count($checkLogin2)>0)
        {
            session_start();

            $request->session()->put('login_email', $unm);
            return view('designer.designer');
        }
        if(count($checkLogin3)>0)
        {
            session_start();

            $request->session()->put('login_email', '$unm');
            return view('distributor.distributor');
        }
        if(count($checkLogin4)>0)
        {
            //$request->session()->put('login_email', '$unm');
           // $query =  DB::table('logs');
           // $s=$query->select('log_id')->where('login_email', $unm);
           // dd($s);
           session_start();

           $request->session()->put('login_email', $unm);
            return view('admin.admin');
        } 
        

    }

    public function profile(Request $request,$reg_id){ 
        $request->session()->put('reg_id',$reg_id); 
        return view('admin.profile');
     }

     public function profile_edit(Request $request,$reg_id){ 
        $request->session()->put('reg_id',$reg_id); 
        //$edit=registers::find($reg_id);
        $edit = DB::table('registers')->where('reg_id', $reg_id);
        return view('admin.profile_edit',compact($edit));
     }

     public function admin_profile_update(Request $request,$reg_id){ 
        //$request->session()->put('reg_id',$reg_id); 
        $edit=registers::find($reg_id);
        $edit->reg_id=$request->get('id');
        $edit->register_name=$request->get('name');
        $edit->register_phone=$request->get('phone');
        $edit->register_company_name=$request->get('company_name');
       // $edit->register_photo=$request->get('id');
        $edit->register_address=$request->get('address');
        $edit->created_at=$request->get('created');
        $edit->updated_at=$request->get('updated');
        $edit->save();
        echo"updated";
        //return view('admin.profile_edit',compact('edit'));
     }
    //public function profile(Request $request)
    //{

            //session_start();
            //$unm=$request->input('email');
            //$sess=session()->get('login_email');
           // $request->session()->put('login_email', $sess);
           // return view('admin.profile');
   // }
    // public function logout(Request $request) 
    // {
        
    //     //Auth::logout(); // logout user
    //     Session::flush();
    //     Redirect::back();
    //     return Redirect::to('/login1'); //redirect back to login
    //   /* $this->guard()->logout();

        // $request->session()->flush();

        // $request->session()->regenerate();

        // return redirect('logins.login');*/
       /* Auth::logout(); // logout user
        Session::flush();
        return redirect()->route('/log');
        
        //return Redirect::to('/login1'); //redirect back to login*/


      //}




  /*  public function designerlogin(Request $request)
    {
        $unm=$request->input('email');
        $pwd=$request->input('password');
        $checkLogin2=DB::table('logs')->where(['login_email'=>$unm,'login_password'=>$pwd,'login_type'=>2])->get();//Designer
        if(count($checkLogin2)>0)
        {
            return view('designer.designer');
        }
        else
        {
            echo"failed";
        }
    }*/

    public function index()
    {
        //
    }
    public function designerProducts()
    {
        return view('customer.designerProducts');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function logout(Request $request) {
        session_start();
        session_destroy();
        session()->flush();
        return redirect('/login1');
    }
}
