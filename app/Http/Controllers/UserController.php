<?php

namespace App\Http\Controllers;

use App\Models\AccountC;
use App\Models\AccountE;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{
    public function welcome(Request $request){
        if ($request->session()->has('user')) {
            $userInfos=User::find(session('user')->id);
            return view('layout.dashboard',compact('userInfos'));
        }
    }
    public function index(){
        return view('register');
    }
    public function login(Request $request){
        // if($request->session()->get('user')){

        // }
        return view('login');
    }
    public function traitment_register(Request $request){
        DB::beginTransaction();
        $request->validate([
            'lastnameUser'=>'required',
            'firstnameUser'=>'required',
            'email'=>'email|required|unique:users',
            'nin'=>'required',
            'password'=>'required|min:8',
        ]);
        try{
        $user=new User();
        $user->lastnameUser=$request->input('lastnameUser');
        $user->firstnameUser=$request->input('firstnameUser');
        $user->email=$request->input('email');
        $user->nin=$request->input('nin');
        $user->password=bcrypt($request->input('password'));
        $user->profile=3;
        $user->save();
        //Creation des comptes pour le user
        $ac=new AccountC();
        $ac->idUser=$user->id;
        $ac->idPack=1;//A remplacer par le pack choisi par le user
        $ac->status=1;
        $ac->ammount=200000;
        $ac->ribNumber="2024ACRIBCLE345";
        $ac->save();
        ///
        $ae=new AccountE();
        $ae->idUser=$user->id;
        $ae->status=1;
        $ae->ammount=0;
        $ae->ribNumber="2024ACRIBCLE543";
        $ae->save();
        DB::commit();
        return redirect('/register')->with('status','Compte créé avec success !');
        }catch(Exception $e){
            DB::rollback();
            return response()->json(['success' => false, 'message' => 'Une erreur est survenue : ' . $e->getMessage()]);
        }
    }
    public function traitment_login(Request $request){
        $request->validate([
            'email'=>'email|required',
            'password'=>'required',
        ]);
        $user=User::where('email',$request->input('email'))->first();
        if($user){
            if(Hash::check($request->input('password'),$user->password)){
                $request->session()->put('user',$user);
                return redirect('/welcome');
            }else{
            return back()->with('status','Identifiant ou mot de passe incorrect !');
            }
        }else{
            return back()->with('status','Compte inexistant !');
        }
    }
    public function logout(Request $request){
        $request->session()->forget('user');
        return redirect('/');
    }
}
