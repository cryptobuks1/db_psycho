<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileType extends Model
{
    protected $table = "_FileTypes";

    protected $primaryKey = "id";

    protected $fillable = [
        'file_type_code',
        'file_type_name',
        'file_type_mime',
        'image_id',
        'used_for_1c_reports_l',
        'created_by',
        'updated_by',
    ];

    public static function getNewObject()
    {
        return [
            'id'                    => null,
            'file_type_code'        => null,
            'file_type_name'        => null,
            'file_type_mime'        => null,
            'image_id'              => null,
            'used_for_1c_reports_l' => null,
            'created_at'            => '',
            'created_by'            => '',
            'updated_at'            => '',
            'updated_by'            => '',
        ];
    }

    public function attachFile()
    {
        return $this->BelongsTo('App\Models\AttachDocumentFile', 'file_type_id', 'id');
    }

    public function image()
    {
        return $this->HasOne('App\Models\Image', 'id', 'image_id');
    }
}
