<?php namespace formulariosdinamicos;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Exclusivoalternativa extends Model{


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'alternativa_exclusiva';
	protected $primaryKey = 'idalternativa';
	public $timestamps = false;


	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [ 'nombre_alternativa', 'fk_idform_exclusivo'];

	 public function formulario()
    {
        return $this->belongsTo('formulariosdinamicos/Exclusivopregunta','idform_exclusivo','fk_idform_exclusivo');
    }
	

}