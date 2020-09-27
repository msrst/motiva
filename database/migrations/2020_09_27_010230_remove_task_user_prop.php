<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveTaskUserProp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign('tasks_student_id_foreign');
            $table->dropColumn('student_id');
        });

        // tasks <-> student
        Schema::table('task_user', function (Blueprint $table) {
            $table->date('finished_date')->nullable();
            $table->date('assignment_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->foreignId('student_id')->constrained('users');
        });
        Schema::table('task_user', function (Blueprint $table) {
            $table->removeColumn('finished_date', 'assignment_date');
        });
    }
}
