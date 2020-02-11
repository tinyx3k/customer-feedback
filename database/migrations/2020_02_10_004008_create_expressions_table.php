<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpressionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expressions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('item_id')->nullable();
            $table->string('neutral_score')->nullable();
            $table->string('happy_score')->nullable();
            $table->string('sad_score')->nullable();
            $table->string('angry_score')->nullable();
            $table->string('fearful_score')->nullable();
            $table->string('disgusted_score')->nullable();
            $table->string('surprised_score')->nullable();
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
        Schema::dropIfExists('expressions');
    }
}
