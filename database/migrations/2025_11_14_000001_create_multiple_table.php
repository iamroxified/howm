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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('bran_id')->unique()->nullable();
            $table->string('bran_name');
            $table->text('bran_img')->nullable();
            $table->text('bran_desc')->nullable();
            $table->string('bran_loc')->nullable();
            $table->string('bran_pst')->nullable();
            $table->text('bran_pst_img')->nullable();
            $table->string('bran_phone')->nullable();
            $table->string('bran_email')->nullable();
            $table->timestamps();
            $table->boolean('bran_stat')->default(true);
        });

        Schema::create('gallery', function (Blueprint $table) {
            $table->id();
            $table->string('gal_id')->unique()->nullable();
            $table->string('gal_name');
            $table->text('gal_img')->nullable();
            $table->text('gal_desc')->nullable();
            $table->string('gal_cat')->nullable();
            $table->string('gal_date')->nullable();
            $table->timestamps();
            $table->boolean('gal_stat')->default(true);
        });

        Schema::create('sermon', function (Blueprint $table) {
            $table->id();
            $table->string('ser_id')->unique()->nullable();
            $table->string('ser_name');
            $table->text('ser_img')->nullable();
            $table->text('ser_desc')->nullable();
            $table->text('ser_link')->nullable();
            $table->string('ser_cat')->nullable();
            $table->string('ser_date')->nullable();
            $table->timestamps();
            $table->boolean('ser_stat')->default(true);
        });

        Schema::create('hod', function (Blueprint $table) {
            $table->id();
            $table->string('hod_id')->unique()->nullable();
            $table->string('hod_name');
            $table->text('hod_img')->nullable();
            $table->text('hod_desc')->nullable();
            $table->text('hod_link')->nullable();
            $table->string('hod_cat')->nullable();
            $table->string('hod_date')->nullable();
            $table->timestamps();
            $table->boolean('hod_stat')->default(true);
        });


        Schema::create('ministry', function (Blueprint $table) {
            $table->id();
            $table->string('min_id')->unique()->nullable();
            $table->string('min_name');
            $table->text('min_img')->nullable();
            $table->text('min_desc')->nullable();
            $table->text('min_lead')->nullable();
            $table->text('min_vis')->nullable();
            $table->text('min_mis')->nullable();
            $table->text('min_link')->nullable();
            $table->string('min_cat')->nullable();
            $table->string('min_date')->nullable();
            $table->timestamps();
            $table->boolean('min_stat')->default(true);
            $table->string('min_loc')->nullable();

        });

        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('evn_id')->unique()->nullable();
            $table->string('evn_title');
            $table->string('evn_link')->nullable();
            $table->string('evn_img')->nullable();
            $table->text('evn_desc')->nullable();
            $table->string('evn_loc')->nullable();
            $table->date('evn_start')->nullable();
            $table->date('evn_end')->nullable();
            $table->string('evn_time')->nullable();
            $table->date('evn_date')->nullable();
            $table->timestamps();
            $table->boolean('evn_stat')->default(true);
        });

        Schema::create('programmes', function (Blueprint $table) {
            $table->id();
            $table->string('prg_id')->unique()->nullable();
            $table->string('prg_title');
            $table->string('prg_cat');
            $table->string('prg_link')->nullable();
            $table->string('prg_img')->nullable();
            $table->text('prg_desc')->nullable();
            $table->string('prg_loc')->nullable();
            $table->date('prg_start')->nullable();
            $table->date('prg_end')->nullable();
            $table->string('prg_time')->nullable();
            $table->date('prg_date')->nullable();
            $table->timestamps();
            $table->boolean('prg_stat')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
        Schema::dropIfExists('programmes');
        Schema::dropIfExists('branches');
        Schema::dropIfExists('gallery');
        Schema::dropIfExists('sermon');
        Schema::dropIfExists('hod');
        Schema::dropIfExists('ministry');
    }
};
