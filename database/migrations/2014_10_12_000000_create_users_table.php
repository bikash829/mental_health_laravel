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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name',30)->nullable();
            $table->string('last_name',30)->nullable();

            $table->string('email',100)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->string('gender',10)->nullable();
            $table->string('phone',30)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('identity_no',100)->nullable();
            $table->string('identity_type',50)->nullable();
            $table->string('pp_name')->nullable();
            $table->string('pp_location')->nullable();
            $table->string('religion')->nullable();


//            $table->unsignedBigInteger('blood_group_id')->nullable();
//            $table->foreign('blood_group_id')
//                ->references('id')
//                ->on('blood_groups')
//                ->onDelete('cascade');

            $table->foreignId('blood_group_id')->nullable()->constrained();
//            $table->foreignId('blood_group_id')->nullable()->constrained('table name');




            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }

};
