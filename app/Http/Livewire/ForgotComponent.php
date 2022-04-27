<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPassword;

class ForgotComponent extends Component
{
    public $email;

    protected $rules = [
        'email' => 'required|email',
        
    ];

    protected $messages = [
        'email.required' => 'El correo electrónico es obligatorio',
        'email.email' => 'Formato de correo electrónico no valido'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function verifyEmailPassword()
    {

        $this->validate();
        $emailVerify = User::where('email', '=', $this->email)->select('id','email')->first();

        
        if ($emailVerify != null) {
            $url = URL::temporarySignedRoute(
                'restablecimiento', now()->addMinutes(5), ['user' => $emailVerify->id]
            );
            Mail::to('diegouriel.martinez15@gmail.com')->send(new ForgotPassword($url));
        }else {
            $this->addError('email', 'El correo electronico no coincide con ninguno de nuestros registros.');

        }
        
    }












    public function render()
    {
        return view('livewire.forgot-component');
    }
}
