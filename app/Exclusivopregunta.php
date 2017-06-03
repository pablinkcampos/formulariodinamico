<?php namespace formulariosdinamicos;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Exclusivopregunta extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'form_exclusivo_pregunta';
	protected $primaryKey = 'idform_exclusivo'


	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [ 'titulo_pregunta', 'pf_idformularios','respuesta_correcta'];

	 public function formulario()
    {
        return $this->belongsTo('FormulariosD/Formulario','idformularios','pf_idformularios');
    }
	

}