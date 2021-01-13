<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditMerchantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Merchants', function (Blueprint $table) {
            $table->string('merchant_id')->unique()->after('id');
            $table->string('biz_name')->unique()->after('name');
            $table->boolean('status')->default(0)->after('remember_token');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Merchant', function (Blueprint $table) {
            //
        });
    }
}
