<?php



namespace Tests\Unit;

use App\Models\Contractor;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Artisan;




//require('/var/www/html/dashboard_back/routes/testUnit.php');


 class ContractorTest extends TestCase
{

// use RefreshDatabase;
    /**
     * @runInSeparateProcess
     */

//    use WithoutMiddleware;

//    public function testExample()
//    {
//        $this->assertTrue(true);
//    }


    public function testBasicTest()
    {
//        $this->withoutMiddleware();

        // load post manually first
          $db_post = DB::select('SELECT * FROM "Contractors" WHERE id = 1');
        $db_post_title = $db_post[0]->contractor_full_name;

        // load post using Eloquent
        $model_post = Contractor::find(1);
        $model_post_title = $model_post->contractor_full_name;
        $this->assertEquals($db_post_title, $model_post_title);
        
    }

//    public function testOne()
//    {
////        $this->withoutMiddleware();
//        $a = 2;
//        $b = 2;
//
//        $this->assertTrue($a == $b);
////        $this->assertNull($a);
////        $this->assertNotNull($a);
//    }
}
