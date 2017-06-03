<?php namespace formulariosdinamicos;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Mensaje extends Model {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'formularios';
	protected $primaryKey = 'idformularios';
	public $timestamps = false;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [ 'titulo_formulario', 'tipo','cantidad_preguntas','visible','fecha_expiracion','cantidad_alternativas'];

	  public function exclusivopregunta(){
        // creamos una relaciÃ³n con el modelo de Producto
        return $this->hasOne('FormulariosD/Exclusivopregunta', 'idformularios','pf_idformularios');
    }

}
