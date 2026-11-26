<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\EventRegistration;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class PublicEventsController extends Controller
{
    public function index()
    {
        $events = Events::latest()->simplePaginate(10);

        return view('events', compact('events'));
    }

    public function show(Events $event)
    {
        $events = Events::latest()->take(5)->get();
        return view('event_detail', compact('event', 'events'));
    }

    public function showRegistrationForm(Events $event)
    {
        $countries = Country::orderBy('name')->get();
        return view('event_registration', compact('event', 'countries'));
    }

    public function register(Request $request)
    {
        // Get the country to check if it's Nigeria
        $country = Country::find($request->country_of_residence);
        $isNigeria = $country && $country->sortname === 'NG';

        // Normalize inputs that may be submitted as arrays (defensive)
        if ($request->has('home_church') && is_array($request->home_church)) {
            $request->merge(['home_church' => implode(', ', $request->home_church)]);
        }

        $eventId = $request->input('event_id');

        $emailRule = [
            'required',
            'email',
            'max:255',
            Rule::unique('event_registrations')->where(function ($query) use ($eventId) {
                return $query->where('event_id', $eventId);
            }),
        ];

        $validated = $request->validate([
            // Personal Information
            'event_id' => 'required|exists:events,id',
            'name' => 'required|string|max:255',
            'email' => $emailRule,
            'phone' => 'required|string|max:20',
            'gender' => 'required|string|in:Male,Female,Other',
            'date_of_birth' => 'required|date',
            'marital_status' => 'required|string|in:Single,Married,Divorced,Widowed',
            'country_of_residence' => 'required|exists:countries,id',
            'state_city' => $isNigeria ? 'required|exists:states,id' : 'nullable',
            'home_address' => 'required|string|max:500',
            // Church Information
            'howm_member' => 'required|in:yes,no',
            'howm_branch' => 'nullable|required_if:howm_member,yes|string|max:255',
            'home_church' => 'nullable|required_if:howm_member,no|string|max:255',
            // Attendance Details
            'attendance_type' => 'required|in:onsite,online',
            'accommodation_needed' => 'required|in:yes,no',
            // Emergency Information
            'emergency_contact_name' => 'required|string|max:255',
            'emergency_contact_relationship' => 'required|string|max:255',
            'emergency_contact_phone' => 'required|string|max:20',
            // Volunteering
            'willing_to_volunteer' => 'required|in:yes,no',
            'preferred_department' => 'nullable|required_if:willing_to_volunteer,yes|string|max:255',
            // Consent
            'contact_consent' => 'accepted',
            'information_correct' => 'accepted',
        ], [
            'contact_consent.accepted' => 'You must agree to be contacted by HOWM',
            'information_correct.accepted' => 'You must confirm that all information is correct',
        ]);

        $validated['contact_consent'] = true;
        $validated['information_correct'] = true;

        $registration = EventRegistration::create($validated);

        // Build and store registration code: HOWM/{year}/{event_id}/{registration_id}
        $code = 'HOWM/' . $registration->created_at->format('Y') . '/' . $registration->event_id . '/' . $registration->id;
        $registration->update(['registration_code' => $code]);

        return redirect()->route('registration.confirmation', $registration->id);
    }

    public function confirmation(EventRegistration $registration)
    {
        $event = $registration->event;
        return view('registration_confirmation', compact('registration', 'event'));
    }
}
