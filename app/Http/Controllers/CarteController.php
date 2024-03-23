<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccountC;
use App\Models\Carte;
use App\Models\User;
class CarteController extends Controller
{
 
    public function newcard()
    {
        return view('layout.carte.newcard');
    }
    public function newcard_traitment(Request $request)
    {
        $request->validate([
            'ammount' => 'required|numeric|min:500',
            'date' => ['required', 'date', function ($attribute, $value, $fail) {
                if ($value <= date('Y-m-d')) {
                    $fail('Date d\'expiration invalide');
                }
            }]
        ]);
        $acUser = AccountC::where('idUser', session('user')->id)->get();
        $amnt = (float)$request->input('ammount');
        if ($acUser[0]['ammount'] >= $amnt) {
            $card = new Carte();
            $card->ammount = $amnt;
            $card->cvv = mt_rand(100, 900) + (int)session('user')->id;
            // longueur totale du CVV est de 10 caractères maximum
            if (strlen($card->cvv) > 10) {
                $card->cvv = substr($card->cvv, 0, 10);
            }

            $card->expirationDate = $request->input('date');
            $card->idUser = session('user')->id;
            $card->path = "A REMPLACER PAR LE CHEMIN DE LA CARTE";
            AccountC::where('idUser', session('user')->id)->update(['ammount' => $acUser[0]['ammount'] -= $amnt]);
            $card->save();
            return redirect('/newcard')->with('status', 'Carte créée avec success !');
        } else {
            return redirect('/newcard')->with('status', 'Erreur lors de la creation de la carte veuillez rééssayer !');
        }
    }
    public function mycards(){
        $userInfos = User::where('id',session('user')->id)->get();
        $cartes=Carte::where('idUser',$userInfos[0]['id'])->get();
        return view('layout.carte.mycards',compact('userInfos'), compact('cartes'));
    }
   
}
