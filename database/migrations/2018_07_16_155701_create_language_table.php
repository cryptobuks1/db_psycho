<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_Languages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('language_code', 4)->nullable();
            $table->string('language_code3', 4)->nullable();
            $table->string('language_code_n', 4)->nullable();
            $table->string('language_view', 100)->nullable();
            $table->string('language_name', 100)->nullable();
            $table->string('language_name_ru', 100)->nullable();
            $table->string('language_name_aa', 100)->nullable();
            $table->string('language_name_ab', 100)->nullable();
            $table->string('language_name_ae', 100)->nullable();
            $table->string('language_name_af', 100)->nullable();
            $table->string('language_name_ak', 100)->nullable();
            $table->string('language_name_am', 100)->nullable();
            $table->string('language_name_an', 100)->nullable();
            $table->string('language_name_ar', 100)->nullable();
            $table->string('language_name_as', 100)->nullable();
            $table->string('language_name_av', 100)->nullable();
            $table->string('language_name_ay', 100)->nullable();
            $table->string('language_name_az', 100)->nullable();
            $table->string('language_name_ba', 100)->nullable();
            $table->string('language_name_be', 100)->nullable();
            $table->string('language_name_bg', 100)->nullable();
            $table->string('language_name_bh', 100)->nullable();
            $table->string('language_name_bm', 100)->nullable();
            $table->string('language_name_bi', 100)->nullable();
            $table->string('language_name_bn', 100)->nullable();
            $table->string('language_name_bo', 100)->nullable();
            $table->string('language_name_br', 100)->nullable();
            $table->string('language_name_bs', 100)->nullable();
            $table->string('language_name_ca', 100)->nullable();
            $table->string('language_name_ce', 100)->nullable();
            $table->string('language_name_ch', 100)->nullable();
            $table->string('language_name_co', 100)->nullable();
            $table->string('language_name_cr', 100)->nullable();
            $table->string('language_name_cs', 100)->nullable();
            $table->string('language_name_cu', 100)->nullable();
            $table->string('language_name_cv', 100)->nullable();
            $table->string('language_name_cy', 100)->nullable();
            $table->string('language_name_da', 100)->nullable();
            $table->string('language_name_de', 100)->nullable();
            $table->string('language_name_dv', 100)->nullable();
            $table->string('language_name_dz', 100)->nullable();
            $table->string('language_name_ee', 100)->nullable();
            $table->string('language_name_el', 100)->nullable();
            $table->string('language_name_eo', 100)->nullable();
            $table->string('language_name_es', 100)->nullable();
            $table->string('language_name_et', 100)->nullable();
            $table->string('language_name_eu', 100)->nullable();
            $table->string('language_name_fa', 100)->nullable();
            $table->string('language_name_ff', 100)->nullable();
            $table->string('language_name_fi', 100)->nullable();
            $table->string('language_name_fj', 100)->nullable();
            $table->string('language_name_fo', 100)->nullable();
            $table->string('language_name_fr', 100)->nullable();
            $table->string('language_name_fy', 100)->nullable();
            $table->string('language_name_ga', 100)->nullable();
            $table->string('language_name_gd', 100)->nullable();
            $table->string('language_name_gl', 100)->nullable();
            $table->string('language_name_gn', 100)->nullable();
            $table->string('language_name_gu', 100)->nullable();
            $table->string('language_name_gv', 100)->nullable();
            $table->string('language_name_ha', 100)->nullable();
            $table->string('language_name_he', 100)->nullable();
            $table->string('language_name_hi', 100)->nullable();
            $table->string('language_name_ho', 100)->nullable();
            $table->string('language_name_hr', 100)->nullable();
            $table->string('language_name_ht', 100)->nullable();
            $table->string('language_name_hu', 100)->nullable();
            $table->string('language_name_hy', 100)->nullable();
            $table->string('language_name_hz', 100)->nullable();
            $table->string('language_name_ia', 100)->nullable();
            $table->string('language_name_id', 100)->nullable();
            $table->string('language_name_ie', 100)->nullable();
            $table->string('language_name_ig', 100)->nullable();
            $table->string('language_name_ii', 100)->nullable();
            $table->string('language_name_ik', 100)->nullable();
            $table->string('language_name_io', 100)->nullable();
            $table->string('language_name_is', 100)->nullable();
            $table->string('language_name_it', 100)->nullable();
            $table->string('language_name_iu', 100)->nullable();
            $table->string('language_name_ja', 100)->nullable();
            $table->string('language_name_jv', 100)->nullable();
            $table->string('language_name_ka', 100)->nullable();
            $table->string('language_name_kg', 100)->nullable();
            $table->string('language_name_ki', 100)->nullable();
            $table->string('language_name_kj', 100)->nullable();
            $table->string('language_name_kk', 100)->nullable();
            $table->string('language_name_kl', 100)->nullable();
            $table->string('language_name_km', 100)->nullable();
            $table->string('language_name_kn', 100)->nullable();
            $table->string('language_name_ko', 100)->nullable();
            $table->string('language_name_kr', 100)->nullable();
            $table->string('language_name_ks', 100)->nullable();
            $table->string('language_name_ku', 100)->nullable();
            $table->string('language_name_kv', 100)->nullable();
            $table->string('language_name_kw', 100)->nullable();
            $table->string('language_name_ky', 100)->nullable();
            $table->string('language_name_la', 100)->nullable();
            $table->string('language_name_lb', 100)->nullable();
            $table->string('language_name_lg', 100)->nullable();
            $table->string('language_name_li', 100)->nullable();
            $table->string('language_name_ln', 100)->nullable();
            $table->string('language_name_lo', 100)->nullable();
            $table->string('language_name_lt', 100)->nullable();
            $table->string('language_name_lu', 100)->nullable();
            $table->string('language_name_lv', 100)->nullable();
            $table->string('language_name_mg', 100)->nullable();
            $table->string('language_name_mh', 100)->nullable();
            $table->string('language_name_mi', 100)->nullable();
            $table->string('language_name_mk', 100)->nullable();
            $table->string('language_name_ml', 100)->nullable();
            $table->string('language_name_mn', 100)->nullable();
            $table->string('language_name_mr', 100)->nullable();
            $table->string('language_name_ms', 100)->nullable();
            $table->string('language_name_mt', 100)->nullable();
            $table->string('language_name_my', 100)->nullable();
            $table->string('language_name_na', 100)->nullable();
            $table->string('language_name_nb', 100)->nullable();
            $table->string('language_name_nd', 100)->nullable();
            $table->string('language_name_ne', 100)->nullable();
            $table->string('language_name_ng', 100)->nullable();
            $table->string('language_name_nl', 100)->nullable();
            $table->string('language_name_nn', 100)->nullable();
            $table->string('language_name_no', 100)->nullable();
            $table->string('language_name_nr', 100)->nullable();
            $table->string('language_name_nv', 100)->nullable();
            $table->string('language_name_ny', 100)->nullable();
            $table->string('language_name_oc', 100)->nullable();
            $table->string('language_name_oj', 100)->nullable();
            $table->string('language_name_om', 100)->nullable();
            $table->string('language_name_or', 100)->nullable();
            $table->string('language_name_os', 100)->nullable();
            $table->string('language_name_pa', 100)->nullable();
            $table->string('language_name_pi', 100)->nullable();
            $table->string('language_name_pl', 100)->nullable();
            $table->string('language_name_ps', 100)->nullable();
            $table->string('language_name_pt', 100)->nullable();
            $table->string('language_name_qu', 100)->nullable();
            $table->string('language_name_rm', 100)->nullable();
            $table->string('language_name_rn', 100)->nullable();
            $table->string('language_name_ro', 100)->nullable();
            $table->string('language_name_rw', 100)->nullable();
            $table->string('language_name_sa', 100)->nullable();
//            $table->string('language_name_sc', 100)->nullable();
//            $table->string('language_name_sd', 100)->nullable();
            $table->string('language_name_se', 100)->nullable();
//            $table->string('language_name_sg', 100)->nullable();
//            $table->string('language_name_si', 100)->nullable();
            $table->string('language_name_sk', 100)->nullable();
            $table->string('language_name_sl', 100)->nullable();
//            $table->string('language_name_sm', 100)->nullable();
//            $table->string('language_name_sn', 100)->nullable();
//            $table->string('language_name_so', 100)->nullable();
            $table->string('language_name_sq', 100)->nullable();
            $table->string('language_name_sr', 100)->nullable();
//            $table->string('language_name_ss', 100)->nullable();
//            $table->string('language_name_st', 100)->nullable();
            $table->string('language_name_su', 100)->nullable();
            $table->string('language_name_sv', 100)->nullable();
//            $table->string('language_name_sw', 100)->nullable();
//            $table->string('language_name_ta', 100)->nullable();
//            $table->string('language_name_te', 100)->nullable();
            $table->string('language_name_tg', 100)->nullable();
//            $table->string('language_name_th', 100)->nullable();
//            $table->string('language_name_ti', 100)->nullable();
            $table->string('language_name_tk', 100)->nullable();
//            $table->string('language_name_tl', 100)->nullable();
            $table->string('language_name_tn', 100)->nullable();
//            $table->string('language_name_to', 100)->nullable();
            $table->string('language_name_tr', 100)->nullable();
//            $table->string('language_name_ts', 100)->nullable();
            $table->string('language_name_tt', 100)->nullable();
//            $table->string('language_name_tw', 100)->nullable();
            $table->string('language_name_ty', 100)->nullable();
            $table->string('language_name_ug', 100)->nullable();
            $table->string('language_name_uk', 100)->nullable();
//            $table->string('language_name_ur', 100)->nullable();
            $table->string('language_name_uz', 100)->nullable();
//            $table->string('language_name_ve', 100)->nullable();
            $table->string('language_name_vi', 100)->nullable();
//            $table->string('language_name_vo', 100)->nullable();
            $table->string('language_name_wa', 100)->nullable();
            $table->string('language_name_wo', 100)->nullable();
//            $table->string('language_name_xh', 100)->nullable();
//            $table->string('language_name_yi', 100)->nullable();
//            $table->string('language_name_yo', 100)->nullable();
//            $table->string('language_name_za', 100)->nullable();
            $table->string('language_name_zh', 100)->nullable();
            $table->string('language_name_zu', 100)->nullable();
            $table->string('created_by', 20)->nullable();
            $table->string('updated_by', 20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_Languages');
    }
}