<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ExtendUserAddTeacherTasksItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->foreignId('student_id')->constrained('users');
            $table->date('assignment_date');
            $table->date('due_date')->nullable();
        });

        // tasks <-> student
        Schema::create('task_user', function (Blueprint $table) {
            $table->foreignId('task_id')->constrained();
            $table->foreignId('user_id')->constrained();
        });

        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // unused
            $table->string('img_location');
            $table->unsignedInteger('points')->default(1);
            $table->string('type'); // e. g. head, torso
        });

        Schema::create('item_user', function (Blueprint $table) {
            $table->foreignId('item_id')->constrained();
            $table->foreignId('user_id')->constrained();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('teacher_id')
                    ->after('two_factor_recovery_codes')
                    ->nullable();

            $table->unsignedInteger('points')
                    ->after('teacher_id')
                    ->nullable()
                    ->default(0);
  
            $table->unsignedInteger('hair_id')
                    ->references('id')->on('items')->setNullOnDelete()
                    ->after('teacher_id')
                    ->nullable();
            $table->unsignedInteger('face_id')
                    ->references('id')->on('items')->setNullOnDelete()
                    ->after('hair_id')
                    ->nullable();
            $table->unsignedInteger('torso_id')
                    ->references('id')->on('items')->setNullOnDelete()
                    ->after('face_id')
                    ->nullable();
            $table->unsignedInteger('legs_id')
                    ->references('id')->on('items')->setNullOnDelete()
                    ->after('torso_id')
                    ->nullable();
            $table->unsignedInteger('accessory_id')
                    ->references('id')->on('items')->setNullOnDelete()
                    ->after('legs_id')
                    ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            # $table->dropForeign('users_teacher_id_foreign');
            $table->dropColumn('teacher_id',
                'points',
                'hair_id',
                'face_id',
                'torso_id',
                'legs_id',
                'accessory_id');
        });
        Schema::dropIfExists('task_user');
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign('tasks_student_id_foreign');
            $table->dropColumn('student_id');
            $table->dropColumn('assignment_date');
            $table->dropColumn('due_date');
        });
        Schema::dropIfExists('item_user');
        Schema::dropIfExists('items');
    }
}
