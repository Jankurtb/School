<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSendgradeadminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sendgradeadmins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('student_id');
            $table->string('gradeLevel');
            $table->string('schoolYear');
            $table->string('gradingperiod');
            $table->string('className');
            $table->string('subjectCode');
            $table->string('grade');
            $table->string('employee_id');
            $table->softDeletes();
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
        Schema::dropIfExists('sendgradeadmins');
    }
}
