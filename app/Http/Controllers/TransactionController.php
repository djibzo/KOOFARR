<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\AccountC;
use App\Models\Pack;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function foreigntransfert()
    {
        return view('layout.transfert.foreigntransfert');
    }
    public function foreigntransfert_traitment(Request $request)
    {
        $request->validate([
            'ribNumber' => 'required',
            'ammount' => 'required|numeric|min:500'
        ]);
        $ribNumber = $request->input('ribNumber'); //RIB du acUserF
        $totalAmountBySender =Transaction::where('idSender',session('user')->id)
        ->sum('ammount');
        $idPack=AccountC::where('idUser', session('user')->id)->get()[0]['idPack'];
        $pack=Pack::where('id',$idPack)->get()[0];
        if (!(AccountC::where('ribNumber', $ribNumber)->get()->isEmpty()) && AccountC::where('idUser', session('user')->id)->get()[0]['ribNumber'] != $ribNumber  && $totalAmountBySender<=$pack->ceiling) {
            $amnt = (float)$request->input('ammount');
            $acUserF = AccountC::where('ribNumber', $ribNumber)->get(); //Le compte vers lequel on souhaite transferer
            $acUser = AccountC::where('idUser', session('user')->id)->get(); //Le compte sur lequel on preleve
            if ($acUser[0]['ammount'] >= $amnt) {
                AccountC::where('idUser', session('user')->id)->update(['ammount' => $acUser[0]['ammount'] -= $amnt]);
                AccountC::where('ribNumber', $ribNumber)->update(['ammount' => $acUserF[0]['ammount'] += $amnt]);
                $trans = new Transaction();
                $trans->idSender = session('user')->id; //on affecte l'id du sender
                $trans->idCompteC = $acUserF[0]['id']; //id du compte courant du receveur
                $trans->ribNumber = $ribNumber; //rib du receveur
                $trans->ammount = $request->input('ammount');
                $trans->motif = $request->input('motif');
                $trans->save();
                return redirect('/foreigntransfert')->with('status', 'Transfert effectué avec success !');
            } else {
                return redirect('/foreigntransfert')->with('status', 'Reverifiez votre solde');
            }
        } else {
            return redirect('/foreigntransfert')->with('status', 'Erreur lors du transfert(RIB invalide ou plafond atteint');
        }
    }
}
