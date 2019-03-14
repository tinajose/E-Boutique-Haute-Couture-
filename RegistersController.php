<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Registers;
class RegistersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $unm=$request->input('email');
        $check=DB::table('logs')->where(['login_email'=>$unm])->get();
        if(count($check)==0)
        {
            $users=new Registers(['register_name'=>$request->get('name')]);
            $users->save();
            //$insertedId = $users->reg_id;
            $unm=$request->input('email');
            $pwd=$request->input('password');
            $cpwd=$request->input('cpassword'); 
            $insertedId=registers::max('reg_id');
            //dd($insertedId);
            if($pwd==$cpwd)
            {
            $result=DB::insert("insert into logs(login_email,login_password,login_online,login_status,login_type,reg_id) values(?,?,?,?,?,?)",[$unm,$pwd,0,0,1,$insertedId]);
            return view('logins.login');
            }
            else
            {
                echo"failed";
            }
        }
    }


    public function designerstore(Request $request)
    {
        $unm=$request->input('email');
       // $phone=$request->input('phone');
        $check=DB::table('logs')->where(['login_email'=>$unm])->get();
        if(count($check)==0)
        {
            $users=new Registers(['register_name'=>$request->get('name'),'register_phone'=>$request->get('phone')]);
            $users->save();
            //$insertedId = $users->reg_id;
            $unm=$request->input('email');
            $pwd=$request->input('password');
            $cpwd=$request->input('cpassword'); 
            //$cpwd=$request->input('phone');
            $insertedId=registers::max('reg_id');
            //dd($insertedId);
            if($pwd==$cpwd)
            {
            $result=DB::insert("insert into logs(login_email,login_password,login_online,login_status,login_type,reg_id) values(?,?,?,?,?,?)",[$unm,$pwd,0,0,2,$insertedId]);
            return view('logins.login');
            }
            else
            {
                echo"failed";
            }
        }
    }

    
    public function distributorstore(Request $request)
    {
        $unm=$request->input('email');
       // $phone=$request->input('phone');
        $check=DB::table('logs')->where(['login_email'=>$unm])->get();
        if(count($check)==0)
        {
            $users=new Registers(['register_name'=>$request->get('name'),'register_phone'=>$request->get('phone'),'register_company_name'=>$request->get('companyname')]);
            $users->save();
            //$insertedId = $users->reg_id;
            $unm=$request->input('email');
            $pwd=$request->input('password');
            $cpwd=$request->input('cpassword'); 
            //$cpwd=$request->input('phone');
            $insertedId=registers::max('reg_id');
            //dd($insertedId);
            if($pwd==$cpwd)
            {
            $result=DB::insert("insert into logs(login_email,login_password,login_online,login_status,login_type,reg_id) values(?,?,?,?,?,?)",[$unm,$pwd,0,0,3,$insertedId]);
            return view('logins.login');
            }
            else
            {
                echo"failed";
            }
        }
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
}
