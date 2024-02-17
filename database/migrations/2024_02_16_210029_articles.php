<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()  {

        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('name', 160);
            $table->string('editor');
            $table->string('editor_id');
            $table->text('description');
            $table->string('meta_title');
            $table->string('meta_description');
            $table->string('meta_keywords');
            $table->string('photo');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });

    }

        public function down() {
            Schema::drop('articles');
        }

};
