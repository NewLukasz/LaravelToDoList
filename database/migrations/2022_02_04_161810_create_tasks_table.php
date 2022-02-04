<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('userId');
            $table->string('name');
            $table->integer('prioId')->default(1);
            $table->integer('statusId')->nullable()->default(1);
            $table->integer('categoryId')->default(0);
            $table->integer('projectId')->default(0);
            $table->string('source')->nullable();
            $table->date('startDate');
            $table->date('dueDate');
            $table->longText('notes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
