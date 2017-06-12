<?php namespace formulariosdinamicos;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Exclusivorespuesta extends Model{


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'respuesta_exclusiva';
	protected $primaryKey = 'usuario_idusuario,pf_idform_exclusivo,pf_idformularios';
	public $timestamps = false;


	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [ 'usuario_idusuario', 'pf_idform_exclusivo','pf_idformularios','respuesta_marcada'];

	 public function formulario()
    {
        return $this->belongsTo('formulariosdinamicos/Formulario','idformularios','pf_idformularios');
         return $this->belongsTo('formulariosdinamicos/Exclusivopregunta','idform_exclusivo','pf_idform_exclusivo');
         return $this->belongsTo('formulariosdinamicos/Usuario','idusuario','usuario_idusuario');
    }
    }
	
	

