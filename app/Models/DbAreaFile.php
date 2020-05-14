<?php

namespace App\Models;

use App\Http\Traits\ConsumerCheck;
use App\Http\Traits\DefaultSystemParams;
use Illuminate\Database\Eloquent\Model;

class DbAreaFile extends Model
{
    use ConsumerCheck, DefaultSystemParams;
    protected $table = "DbAreaFiles";

    protected $primaryKey = "id";

    protected $fillable = [
        'db_area_file_name',
        'stored_file_id',
        'bl_att_doc_kind_id',
        'table_n_owner',
        'row_id_owner',
        'table_n_doc',
        'row_id_doc',
        'db_area_id',
        'uid_1c_code',
        'deleted_l',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];
    protected $hidden = [
        'remember_token',
    ];

    public static function getNewObject()
    {
        return [
            'id'                 => null,
            'db_area_file_name'  => '',
            'file_type_id'       => null,
            'stored_file_id'     => null,
            'bl_att_doc_kind_id' => null,
            'table_n_owner'      => null,
            'row_id_owner'       => null,
            'table_n_doc'        => null,
            'row_id_doc'         => null,
            'db_area_id'         => 7,
            'uid_1c_code'        => null,
            'deleted_l'          => false,
            'created_by'         => null,
            'updated_by'         => null,
            'created_at'         => null,
            'updated_at'         => null,
        ];
    }

    public function getDbAreaFileNameAttribute($value)
    {
        if($this->isAdmin())
        {
            $actual = $this->getAttributeValue("actual_l") == false ? " (Не активен)" : "";
            $deleted = $this->getAttributeValue("deleted_l") == true ? " (Удалён)" : "";
            return $value.$actual.$deleted;
        }
        else
            return $value;
    }

    public function newQuery()
    {
        $db_area_id = self::getDefaultDBAreaId();
        if($this->isAdmin())
            return parent::newQuery();
        else
        {
            return parent::newQuery()
                ->whereIn("db_area_id", [$db_area_id, 0])
                ->where([
                    "actual_l"  => true,
                    "deleted_l" => false
                ]);
        }
    }

    public function blAttachDocumentKind()
    {
        return $this->hasOne('App\Models\BL\blAttachDocumentKind', 'id', 'bl_att_doc_kind_id');
    }

    public function dbarea()
    {
        return $this->hasOne('App\Models\DbArea', 'id', 'db_area_id');
    }

    public function storedFile()
    {
        return $this->hasOne('App\Models\StoredFile', 'id', 'stored_file_id');
    }
}
