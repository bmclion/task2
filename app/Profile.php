<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use Notifiable;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'profile';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id'
        , 'email'
        , 'mobile_number'
        , 'date_of_birth'
        , 'user_designation'
        , 'user_department'
        ,
    ];

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function designation()
    {
        return $this->hasOne('App\Designation');
    }

    public function department()
    {
        return $this->hasOne('App\Department');
    }
}
