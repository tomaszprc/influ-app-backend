<?php

use App\DataTypes\UserType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('account_type', UserType::TYPES)->default(UserType::INFLUENCER);
            $table->foreignId('company_id');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreignId('influencer_id');
            $table->foreign('influencer_id')->references('id')->on('influencers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
