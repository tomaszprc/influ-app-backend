<?php

use App\DataTypes\AnnouncementStatus;
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
        Schema::create('annoucements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id');
            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->string('title');
            $table->string('description');
            $table->boolean('onlyVerifiedInfluencers')->default(false);
            $table->enum('status', AnnouncementStatus::TYPES)->default(AnnouncementStatus::DRAFT);
            $table->dateTime('start_at');
            $table->dateTime('finished_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annoucements');
    }
};
