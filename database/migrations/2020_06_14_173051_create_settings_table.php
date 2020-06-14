<?php

use App\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('company');
            $table->string('issuer')->nullable();
            $table->string('logo')->default('logo.png');
            $table->string('address')->nullable();
            $table->string('email')->unique();
            $table->string('telephone')->nullable();
            $table->string('phone')->nullable();
            $table->string('website')->nullable();
            $table->timestamps();
        });

        Setting::create([
            'company' => 'XYZ Ltd',
            'issuer' => 'Accounts',
            'address' => '54 Kpakpo Samoa Rd',
            'email' => 'niiokai@outlook.com',
            'telephone' => '0551284173',
            'website' => 'https://deklegacysolutions.com'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
