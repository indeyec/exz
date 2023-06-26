<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user
 *
 */
class RegisterForm extends Model
{
    public $login;
    public $password;
    public $password_repeat;
    public $first_name;
    public $last_name;
    public $middle_name;
   
   


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['login','first_name','last_name','middle_name', 'password'], 'required'],
           ['login','unique', 'targetClass'=>'\app\models\User','message'=>'Такой пользователь уже существует'],
           ['password', 'string', 'min'=>6],
           ['password_repeat', 'string', 'min'=>6],
           ['password_repeat', 'compare', 'compareAttribute'=> 'password'],
        ];
    }

   public function register()
   {
    if(!$this->validate()){
        return null;
    }
    $user = new User();
    $user->first_name = $this->first_name;
    $user ->last_name =$this->last_name;
    $user ->middle_name =$this->middle_name;
    $user ->login =$this->login;
    $user ->HashPassword($this->password);
    
    return $user ->save() ? $user : null;

   }

}
