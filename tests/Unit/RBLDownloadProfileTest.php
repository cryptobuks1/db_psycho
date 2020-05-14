<?php

namespace Tests\Unit;

use App\Http\Classes\StoredFileManager;
use App\Models\DbAreaFile;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class RBLDownloadProfileTest extends TestCase
{
    use DatabaseTransactions;
    public function testRBLDownloadProfileFileExists()
    {
        $db_area_file = DbAreaFile::query()
            ->where("uid_1c_code", "rbl_download_profile_file")
            ->first();

        $file = StoredFileManager::downloadFile($db_area_file->stored_file_id);

        $this->assertArrayNotHasKey("error", $file);
    }
}
