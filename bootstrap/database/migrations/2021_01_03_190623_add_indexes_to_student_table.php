<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexesToStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            //
         //  $table->unique('email'); // مازبطت لانه في ايميلات مكررة
            $table->index('gender');
            $table->index('active');
            $table->index('city_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropIndex('students_city_id_index');
            $table->dropIndex('students_gender_index');
            $table->dropIndex('students_active_index');
           
        });
    }
}
