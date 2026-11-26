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
        Schema::table('event_registrations', function (Blueprint $table) {
            // Personal Information
            $table->string('gender')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('country_of_residence')->nullable();
            $table->string('state_city')->nullable();
            $table->text('home_address')->nullable();

            // Church Information
            $table->enum('howm_member', ['yes', 'no'])->nullable();
            $table->string('howm_branch')->nullable();
            $table->string('home_church')->nullable();
            $table->string('church_role')->nullable();
            $table->string('pastor_name')->nullable();

            // Attendance Details
            $table->enum('attendance_type', ['onsite', 'online'])->nullable();
            $table->json('attendance_days')->nullable();
            $table->enum('accommodation_needed', ['yes', 'no'])->nullable();
            $table->enum('transportation_needed', ['yes', 'no'])->nullable();

            // Emergency Information
            $table->string('emergency_contact_name')->nullable();
            $table->string('emergency_contact_relationship')->nullable();
            $table->string('emergency_contact_phone')->nullable();

            // Special Needs
            $table->text('medical_conditions')->nullable();
            $table->text('dietary_restrictions')->nullable();

            // Volunteering
            $table->enum('willing_to_volunteer', ['yes', 'no'])->nullable();
            $table->string('preferred_department')->nullable();

            // Payment Information
            $table->string('registration_type')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('proof_of_payment_path')->nullable();

            // Consent
            $table->boolean('contact_consent')->default(false);
            $table->boolean('information_correct')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('event_registrations', function (Blueprint $table) {
            $table->dropColumn([
                'gender',
                'date_of_birth',
                'marital_status',
                'country_of_residence',
                'state_city',
                'home_address',
                'howm_member',
                'howm_branch',
                'home_church',
                'church_role',
                'pastor_name',
                'attendance_type',
                'attendance_days',
                'accommodation_needed',
                'transportation_needed',
                'emergency_contact_name',
                'emergency_contact_relationship',
                'emergency_contact_phone',
                'medical_conditions',
                'dietary_restrictions',
                'willing_to_volunteer',
                'preferred_department',
                'registration_type',
                'payment_method',
                'proof_of_payment_path',
                'contact_consent',
                'information_correct',
            ]);
        });
    }
};
