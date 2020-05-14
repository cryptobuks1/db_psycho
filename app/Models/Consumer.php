<?php

namespace App\Models;

use App\Http\Classes\StoredFileManager;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Consumer extends Authenticatable implements JWTSubject
{
    use Notifiable;


    protected $table = "Consumers";
    protected $primaryKey = "id";

    protected $fillable = [

        'IsAdmin',
        'consumer_code',
        'consumer_login',
        'password',
        'consumer_name',
        'consumer_status_n',
        'consumer_type_code',
        'consumer_is_system_n',
        'email',
        'email2',
        'phone_number',
        'url_name',
        'first_name',
        'last_name',
        'middle_name',
        'male_l',
        'birth_date',
        'photo',
        'column_change_password_l',
        'deleted_l'
    ];

    protected $hidden = [
        /*'consumer_pass',*/
        'remember_token',
    ];

    public static function getNewObject()
    {
        return [
            "id"                       => null,
            "IsAdmin"                  => (int)2,
            "consumer_code"            => "",
            "consumer_login"           => "",
            "password"                 => "",
            "consumer_name"            => "",
            "consumer_status_n"        => (int)0,
            "consumer_type_code"       => (int)0,
            "consumer_is_system_n"     => (int)0,
            "email"                    => "",
            "email2"                   => "",
            "phone_number"             => "",
            "url_name"                 => "",
            "first_name"               => "",
            "last_name"                => "",
            "middle_name"              => "",
            "male_l"                   => "",
            "birth_date"               => "",
            "photo"                    => "",
            "remember_token"           => "",
            "created_at"               => "",
            "updated_at"               => "",
            "created_by"               => "",
            "updated_by"               => "",
            "column_change_password_l" => true,
            "deleted_l"                => ""
        ];
    }

    protected $casts = [

        'IsAdmin'              => 'integer',
        'consumer_id'          => 'integer',
        'consumer_login'       => 'string',
        // 'consumer_pass' => 'string',
        'remember_token'       => 'string',
        'consumer_name'        => 'string',
        //        'consumer_status_n' => 'string',
        'consumer_is_system_n' => 'integer',
        'email'                => 'string',
        'email2'               => 'string',
        'phone_number'         => 'string',
        'url_name'             => 'string',
        'first_name'           => 'string',
        'last_name'            => 'string',
        'middle_name'          => 'string',
        'male_l'               => 'integer',
        'consumer_type_code'   => 'integer',
        'birth_date'           => 'date_format:d/m/y',
        'birth_place'          => 'string',
        'created_at'           => 'datetime',
        'updated_at'           => 'datetime',
        'photo'                => 'text',

    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }


    public function getJWTCustomClaims()
    {
        return [];
    }


    public function consumerAccess()
    {
        return $this->hasOne('App\Models\ConsumerAccessRow', 'id', 'consumer_id');
    }

    public function readAccess()
    {

        //        return $this->hasMany('App\Models\ConsumerAccessRow', 'consumer_id', 'consumer_code'); // update Albert Topalu 13.09.18 10:57
        return $this->hasMany('App\Models\ConsumerAccessRow', 'consumer_id', 'id'); //

    }

    //create Alex Yaroshchuk

    public function activityToken()
    {
        return $this->hasMany('App\Models\ConsumerActivityToken', 'consumer_id', 'id');
    }

    public function consumerAccessRoles()
    {
        return $this->hasMany('App\Models\ConsumerAccessRole', 'consumer_id', 'id'); //
    }

    /**
     * @return array|null
     */
    public function getUserPhoto()
    {
        $stored_file_id = $this->getAttributeValue("stored_file_id");

        if(is_null($stored_file_id))
            return null;

        return StoredFileManager::downloadFile($stored_file_id);
    }

    /**
     * Возвращает имя для показа в header
     *
     * @return string
     */
    public function getDisplayName()
    {
        if($this->getAttributeValue("consumer_is_system_n") == 0)
            return $this->getAttributeValue("first_name") . " " . $this->getAttributeValue("last_name");
        else
            return $this->getAttributeValue("consumer_name");
    }

    /**
     * @return array|null
     */
    public function getUserInterfaces()
    {
        $consumer_id = $this->getAttributeValue("id");

        if(is_null($consumer_id))
            return null;

        if(config("database.default") == "mysql")
        {
            $data = DB::table('__UserInterfaces as ui')->whereRaw('ui.id IN (select ar.user_interface_id 
                                                from _AccessRoles as ar
                                                where ar.id in (select car.access_role_id 
                                                    from _ConsumerAccessRoles as car 
                                                    where consumer_id = ' . $consumer_id . '))')
                ->select('id', 'user_interface_name as name', 'home_url')->orderBy('id', 'asc')->get()->toArray();
        }

        elseif(config("database.default") == "pgsql")
        {
            $data = DB::table('__UserInterfaces as ui')->whereRaw('ui.id IN (select ar.user_interface_id 
                                                from "_AccessRoles" as ar
                                                where ar.id in (select car.access_role_id 
                                                    from "_ConsumerAccessRoles" as car 
                                                    where consumer_id = ' . $consumer_id . '))')
                ->select('id', 'user_interface_name as name', 'home_url')->orderBy('id', 'asc')->get()->toArray();
        }

        $data = json_decode(json_encode($data), true);
        return $data;
    }

    public function getFIO()
    {
        return $this->last_name . " " . $this->first_name . " " . $this->middle_name;
    }

    /**
     * @return bool
     */
    public function hasRoles()
    {
        return $this->consumerAccessRoles()->count() > 0;
    }
}


