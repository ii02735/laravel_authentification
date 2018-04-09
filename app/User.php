<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\MailVerification;
use App\Notifications\MailChangement;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom', 'prenom','token','phone_number','email', 'address','password','provider','provider_id','changeAddress'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    public function envoyerMailVerification()
    {
        $this->notify(new MailVerification($this));
    }

    public function envoyerMailChangement()
    {
	   $this->notify(new MailChangement($this));
    }
}
