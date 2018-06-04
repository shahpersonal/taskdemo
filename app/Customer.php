<?php
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class Customer extends Model
{
    //
    use Notifiable;
    use EntrustUserTrait;
    protected $fillable = [
        'name', 'email', 'password','first_name','last_name','phone'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
}
