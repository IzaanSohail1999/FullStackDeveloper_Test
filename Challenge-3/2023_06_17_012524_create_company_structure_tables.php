<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateCompanyStructureTables extends Migration
{
    public function up()
    {
        DB::beginTransaction();

        try {
            Schema::create('companies', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('address');
                $table->timestamps();
            });

            Schema::create('locations', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
                $table->string('address');
                $table->timestamps();
            });

            Schema::create('assets', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
                $table->decimal('value', 8, 2);
                $table->timestamps();
            });

            Schema::create('managers', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
                $table->string('email')->unique();
                $table->timestamps();
            });

            Schema::create('employees', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
                $table->unsignedBigInteger('company_group_id')->nullable();
                $table->string('email')->unique();
                $table->timestamps();
            });

            Schema::create('company_groups', function (Blueprint $table) {
                $table->id();
                $table->foreignId('company_id')->nullable()->constrained('companies')->onDelete('cascade');
                $table->unsignedBigInteger('parent_id')->nullable();
                $table->foreign('parent_id')->references('id')->on('company_groups')->onDelete('cascade');
                $table->unsignedBigInteger('company_group_head_id')->nullable();
                $table->foreign('company_group_head_id')->references('id')->on('employees')->onDelete('set null');
                $table->string('group_name');
                $table->timestamps();
            });

            Schema::create('people', function (Blueprint $table) {
                $table->id();
                $table->foreignId('manager_id')->constrained('managers')->onDelete('cascade');
                $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
                $table->timestamps();
            });

            // Adding the foreign key constraint after creating the tables
            Schema::table('employees', function (Blueprint $table) {
                $table->foreign('company_group_id')->references('id')->on('company_groups')->onDelete('set null');
            });

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function down()
    {
        DB::beginTransaction();

        try {
            Schema::dropIfExists('people');
            Schema::table('employees', function (Blueprint $table) {
                $table->dropForeign('company_group_id');
                $table->dropColumn('company_group_id');
            });
            Schema::dropIfExists('employees');
            Schema::dropIfExists('managers');
            Schema::dropIfExists('assets');
            Schema::dropIfExists('locations');
            Schema::table('company_groups', function (Blueprint $table) {
                $table->dropForeign(['parent_id']);
                $table->dropForeign(['company_group_head_id']);
                $table->dropForeign(['company_id']);
            });
            Schema::dropIfExists('company_groups');
            Schema::dropIfExists('companies');

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

}
