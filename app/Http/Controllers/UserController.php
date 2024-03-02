<?php

namespace App\Http\Controllers;

use App\Models\AccountC;
use App\Models\AccountE;
use App\Models\Pack;
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
        $pack=Pack::all();
        return view('register',compact('pack'));
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
            'pack'=>'required',
            'email'=>'email|required|unique:users',
            'password'=>'required|min:8',
            'nin' => 'required|file|mimes:pdf|max:2048'
        ]);
        try{
        $user=new User();
        $user->lastnameUser=$request->input('lastnameUser');
        $user->firstnameUser=$request->input('firstnameUser');
        $user->email=$request->input('email');
        $user->password=bcrypt($request->input('password'));
        $user->profile=3;
        $tmp = $_FILES['nin']['tmp_name'];
        $new=time().'_'.$request->input('lastnameUser').$request->input('firstnameUser').uniqid("_NIN").".pdf";
        move_uploaded_file($tmp,public_path('nins/').$new);
        $user->nin=public_path('nins/').$new;
        $user->save();
        //Creation des comptes pour le user
        $ac=new AccountC();
        $ac->idUser=$user->id;
        $ac->idPack=$request->pack;
        $ac->status=1;
        $ac->ammount=200000;
        $ac->ribNumber=$user->id. date('Y') . date('dm') . date('H') . date('i').uniqid();
        $ac->save();
        ///
        $ae=new AccountE();
        $ae->idUser=$user->id;
        $ae->status=1;
        $ae->ammount=0;
        $ae->ribNumber=$user->id. date('Y') . date('dm') . date('H') . date('i').uniqid("e");
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
    public function selftransfert(){
        return view('layout.transfert.selftransfert');
    }
    public function selftransfert_traitment(Request $request){
        $request->validate(['ammount'=>'required|numeric|min:500',]);
        $amnt=(float)$request->input('ammount');
        $acUser=AccountC::where('idUser','=',session('user')->id)->get();
        $aeUser=AccountE::where('idUser','=',session('user')->id)->get();
        if($acUser[0]['ammount']>=$amnt){
            AccountC::where('idUser',session('user')->id)->update(['ammount'=>$acUser[0]['ammount']-=$amnt]);
            AccountE::where('idUser',session('user')->id)->update(['ammount'=>$aeUser[0]['ammount']+=$amnt]);
            return redirect('/selftransfert')->with('status','Transfert effectué avec success !');
        }else{
            return redirect('/selftransfert')->with('status','Erreur lors du transfert !');
        }
    }

}
