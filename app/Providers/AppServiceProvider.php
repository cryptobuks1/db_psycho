<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\SystemParameter;
use Illuminate\Support\Facades\App;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        App::singleton('typeVerify', function(){
            $param = SystemParameter::where('sys_par_code','TypeExtVerification')->select('sys_par_value')->first()->sys_par_value;
            $type = SystemParameter::where('sys_par_code','TypeExtVerification')->select('data_type_id')->value('data_type_id');
            return (new AppServiceProvider($param))->convert($param, $type);
        });

        //CheckInRequestTimeOut link is active email (Forgotten password change value to table CheckInRequestTimeOut ->sys_par_value)
        App::singleton('RequestTimeOut', function(){
            $param = SystemParameter::where('sys_par_code','CheckInRequestTimeOut')->select('sys_par_value')->first()->sys_par_value;
            $type = SystemParameter::where('sys_par_code','CheckInRequestTimeOut')->select('data_type_id')->value('data_type_id');
            return (new AppServiceProvider($param))->convert($param, $type);
        });
        //END CheckInRequestTimeOut

        App::singleton('UseCaptcha', function(){
            $param =  SystemParameter::where('sys_par_code','CheckInUseCaptcha')->select('sys_par_value')->first()->sys_par_value;
            $type = SystemParameter::where('sys_par_code','CheckInUseCaptcha')->select('data_type_id')->value('data_type_id');
            return (new AppServiceProvider($param))->convert($param, $type);
        });

        App::singleton('CaptchaNumberOfInvalid', function(){
            $param =  SystemParameter::where('sys_par_code','CaptchaNumberOfInvalidLogin')->select('sys_par_value')->first()->sys_par_value;
            $type = SystemParameter::where('sys_par_code','CaptchaNumberOfInvalidLogin')->select('data_type_id')->value('data_type_id');
            return (new AppServiceProvider($param))->convert($param, $type);
        });

        //resubmit request change value to table CheckInRequestTimeOut ->sys_par_value
        App::singleton('PasswordRecovery', function(){
            $param = SystemParameter::where('sys_par_code','TimeOutRequestPasswordRecovery')->select('sys_par_value')->first()->sys_par_value;
            $type = SystemParameter::where('sys_par_code','TimeOutRequestPasswordRecovery')->select('data_type_id')->value('data_type_id');
            return (new AppServiceProvider($param))->convert($param, $type);
        });

        //END resubmit request

        App::singleton('RePasswordRecovery', function(){
            $param = SystemParameter::where('sys_par_code','TimeOutRequestRePasswordRecovery')->select('sys_par_value')->first()->sys_par_value;
            $type = SystemParameter::where('sys_par_code','TimeOutRequestRePasswordRecovery')->select('data_type_id')->value('data_type_id');
            return (new AppServiceProvider($param))->convert($param, $type);
        });

        App::singleton('TimeOutChangeEmail', function(){
            $param = SystemParameter::where('sys_par_code','TypeTimeOutChangeEmail')->select('sys_par_value')->first()->sys_par_value;
            $type = SystemParameter::where('sys_par_code','TypeTimeOutChangeEmail')->select('data_type_id')->value('data_type_id');
            return (new AppServiceProvider($param))->convert($param, $type);
        });

        App::singleton('ExtVerificationTypeSystem', function(){
            $param = SystemParameter::where('sys_par_code','ExtVerificationTypeSystem')->select('sys_par_value')->first()->sys_par_value;
            $type = SystemParameter::where('sys_par_code','ExtVerificationTypeSystem')->select('data_type_id')->value('data_type_id');
            return (new AppServiceProvider($param))->convert($param, $type);
        });
    }

    public function convert($param, $type){
        if($type == 41) {
            $sortTime = sscanf($param, "%d:%d:%d", $hours, $minutes, $seconds);
            $param_seconds = $hours * 3600 + $minutes * 60 + $seconds;
            return $param_seconds;
        }
        if($type == 16) {
            return (int)$param;
        }
        if($type == 4) {
            return filter_var($param, FILTER_VALIDATE_BOOLEAN);
        }
    }
}
