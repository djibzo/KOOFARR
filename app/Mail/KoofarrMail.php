<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class KoofarrMail extends Mailable
{
    use Queueable, SerializesModels;

    public function build()
    {
        return $this->subject('Notification d\'inscription')
        ->html("<p>Bonjour, vous venez de vous inscrire sur KOOFARR.</p><p>Pour vous connecter, merci de renseigner les informations d'identification que vous aviez fournies.</p>");

    }
}
