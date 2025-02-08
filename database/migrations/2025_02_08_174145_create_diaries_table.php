<?php

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
        Schema::create('diaries', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('title', 30);
            $table->text('body');
            $table->timestamps();
        });
    }
            //     id 主キー
            // date 日付型
            // title VARCHAR型\
            // body TEXT型
            // created_at 日時型
            // updated_at 日時型

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diaries');
    }
};
