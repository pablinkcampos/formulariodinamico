<?php

namespace formulariosdinamicos;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'usuario';
    protected $primaryKey = 'idusuario';
    public $timestamps = false;

    protected $fillable = [
        'rut', 'nombre','pass', 'email', 'bandera', 'password','fk_idtipousuario'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    
}
