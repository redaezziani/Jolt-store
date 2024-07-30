<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreInfoTable extends Migration
{
    public function up()
    {
        Schema::create('store_info', function (Blueprint $table) {
            $table->id();
            $table->string('store_name');
            $table->string('logo_name')->nullable(); // Added logo_name field
            $table->text('announcement')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->string('instagram_handle')->nullable();
            $table->string('support_email')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('store_info');
    }
}
