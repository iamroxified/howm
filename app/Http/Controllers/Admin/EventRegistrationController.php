<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\EventRegistration;
use Illuminate\Http\Request;

class EventRegistrationController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(EventRegistration $registration)
    {
        return view('admin.registrations.show', compact('registration'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EventRegistration $registration)
    {
        $countries = Country::all();
        return view('admin.registrations.edit', compact('registration', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EventRegistration $registration)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female,Other',
            'date_of_birth' => 'required|date',
            'marital_status' => 'required|in:Single,Married,Divorced,Widowed',
            'phone' => 'required|string|max:20',
            'email' => 'required|string|email|max:255',
            'country_of_residence' => 'required|exists:countries,id',
            'state_city' => 'nullable|string|max:255',
            'home_address' => 'required|string|max:500',
            'howm_member' => 'required|in:yes,no',
            'howm_branch' => 'required_if:howm_member,yes|nullable|string|max:255',
            'home_church' => 'required_if:howm_member,no|nullable|string|max:255',
            'attendance_type' => 'required|in:onsite,online',
            'accommodation_needed' => 'required|in:yes,no',
            'emergency_contact_name' => 'required|string|max:255',
            'emergency_contact_relationship' => 'required|string|max:255',
            'emergency_contact_phone' => 'required|string|max:20',
            'willing_to_volunteer' => 'required|in:yes,no',
            'preferred_department' => 'required_if:willing_to_volunteer,yes|nullable|string|max:255',
        ]);

        $registration->update($validated);

        return redirect()->route('admin.registrations.show', $registration->id)->with('success', 'Registration updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventRegistration $registration)
    {
        $eventName = $registration->event->evn_title;
        $registration->delete();

        return redirect()->back()->with('success', 'Registration for ' . $eventName . ' deleted successfully.');
    }
}