<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 6/27/19
 * Time: 5:24 PM
 */

namespace App\Http\Classes;


use App\Http\Traits\DefaultSystemParams;
use App\Models\ActionLog;
use App\Models\ActionType;
use App\Models\FileType;
use App\Models\StoredFile;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

class StoredFileManager
{
    use DefaultSystemParams;

    public static function uploadFile($request, $setPermissions = false)
    {
        $id = $request["id"];
        $model = $request["storedFile"];
        $controller_alias = $request["controller_alias"];

        $db_area_file_name = $model["name"];
        $file_data = $model['mime'];
        $file_mime = $model["mime_type"];
        $file_size = $model['size'];
        $file_ext = $model['extension'];
        $table_n = $model['table_n'] ?? null;
        $row_id = $model['row_id'] ?? null;

        $storageType = self::getStorageTypeSystem();

        $file_type = FileType::query()->where('file_type_code', $file_ext)->get()->first();

        if(is_null($file_mime))
        {
            $file_mime = "data:".$file_type->file_type_mime.";base64";
        }

        $storedFile = new StoredFile();
        $storedFile['stored_file_name'] = $db_area_file_name;
        $storedFile['stored_file_size'] = $file_size;
        $storedFile["stored_file_mime"] = $file_mime;
        $storedFile["stored_file_extension"] = $file_ext;
        $storedFile['file_type_id'] = $file_type->id;
        $storedFile['stored_file_storage_type'] = $storageType;
        $storedFile['table_n'] = $table_n;
        $storedFile['row_id'] = $row_id;

        if($id)
        {
            $file = StoredFile::find($id);
            if($file)
            {
                $file = $file->toArray();
                if($file['stored_file_storage_type'] == 0)
                {
                    $fileData = Storage::disk('public')->get($file['stored_file_path']) ?? null;
                    $file64Base = base64_encode($fileData);
                }
                else
                {
                    $file64Base = $file["stored_file_bd"];
                }

                if($file64Base == $file_data)
                    return $id;
            }

        }

        $file_name = Carbon::now('UTC')->format('YmdHisv'); //generating unique file name;

        $storedFile['stored_file_code'] = $file_name.".".$file_ext;

        if($storageType == 0)//in folders
        {
            if($file_data != "")
            { // storing image in storage/app/public/files/m_Y Folder

                $controller_path = $controller_alias . "/";

                $date = date('Y_m');
                $file_path = '/files/'. $controller_path . $date . '/' . $file_name;

                    if(Storage::disk('public')->exists($file_path))
                {
                    $file_path = $file_path . '_1';

                }
                $file_path = $file_path . "." . $file_ext;
                Storage::disk('public')->put($file_path, base64_decode($file_data));

                if($setPermissions)
                {
                    chmod(storage_path() . "/app/public/files", 0777);
                    chmod(storage_path() . "/app/public/files/$controller_alias", 0777);
                    chmod(storage_path() . "/app/public/files/$controller_alias/$date", 0777);
                    chmod(storage_path() . "/app/public$file_path", 0777);
                }
//
                $storedFile['stored_file_path'] = $file_path;
            }
        }
        else
        {
            $storedFile['stored_file_bd'] = $file_data;
        }

        $storedFile->save();
        return $storedFile['id'];
    }

    // TODO make $table_n a required parameter
    public static function downloadFile($stored_file_id, $table_n = null)
    {
        $file = StoredFile::find($stored_file_id);

        if(!$file)
            return [
                "error"   => true,
                "message" => "Stored file not found"
            ];

        if($table_n && $file->table_n != $table_n)
            return [
                "error"   => true,
                "message" => "Stored file not found"
            ];

        $return_data = [
            "name"         => $file->stored_file_name,
            "size"         => $file->stored_file_size,
            "extension"    => $file->stored_file_extension,
            "file_type_id" => $file->file_type_id,
            "table_n"      => $file->table_n,
            "row_id"       => $file->row_id,
            "mime"         => $file->stored_file_mime
        ];

        if($file->stored_file_storage_type == 0)
        {
            try
            {
                $fileData = Storage::disk('public')->get($file->stored_file_path);
            }
            catch(FileNotFoundException $e)
            {
                return [
                    "error" => true,
                    "message" => "FileNotFound"
                ];

            }

            $return_data["file"] = base64_encode($fileData);
        }
        else
        {
            $return_data["file"] = $file->stored_file_bd;
        }
        return $return_data;
    }

    public static function updateRowId($file_id, $row_id)
    {
        $file = StoredFile::find($file_id);

        if(!$file)
            return [
                "error"   => true,
                "message" => "Stored file not found"
            ];

        $file->row_id = $row_id;

        $file->save();
    }

    public static function deleteFiles(array $file_ids) : bool
    {
        $file_paths = [];
        foreach($file_ids as $file_id)
        {
            $file = StoredFile::find($file_id);

            if(!$file)
                return false;

            if($file->stored_file_storage_type == 0)
            {
                $file_paths[] = $file->stored_file_path;
            }

            if(!$file->delete())
                return false;
        }

        foreach($file_paths as $file_path)
        {
            if(!file_exists(storage_path()."/app/public".$file_path))
            {
                $controller_code = class_basename(Route::current()->controller);


                $controller = \App\Models\Controller::where("controller_code", $controller_code)
                    ->select("id")->first();

                $user = \Auth::user()->toArray();
                $action_type_id = ActionType::where("action_type_code", "delete")
                    ->select("id")->first();

                $create_array = [
                    "controller_id"      => $controller->id,
                    "consumer_id"        => $user["id"],
                    "action_type_id"     => $action_type_id["id"],
                    "action_log_error_l" => true,
                    "action_log_message" => "Файл по пути $file_path не найден",
                    "created_by"         => $user["consumer_code"],
                    "updated_by"         => $user["consumer_code"],
                    "action_log_error_code" => 350,
                    'remote_addr' =>  request()->server('REMOTE_ADDR'),
                    'http_referer' => request()->server('HTTP_REFERER'),
                    'redirect_url' => request()->server('REDIRECT_URL'),
                    'request_method' => request()->server('REQUEST_METHOD'),
                    'http_user_agent' => request()->server('HTTP_USER_AGENT'),
                ];

                ActionLog::create($create_array);

                continue;
            }
            Storage::disk('public')->delete($file_path);
        }


        return true;
    }
}