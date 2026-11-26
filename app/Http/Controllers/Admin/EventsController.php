<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Events;
use App\Models\EventRegistration;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $events = Events::all();
        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'evn_title' => 'required|string|max:255',
            'evn_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'evn_desc' => 'nullable|string',
            'evn_loc' => 'nullable|string|max:255',
            'evn_start' => 'nullable|date',
            'evn_end' => 'nullable|date',
            'evn_time' => 'nullable|string|max:255',
        ]);

        // Handle image upload if present
        if ($request->hasFile('evn_img')) {
            $imagePath = $request->file('evn_img')->store('events', 'public');
            $validated['evn_img'] = $imagePath;
        }

        Events::create($validated);

        return redirect()->route('admin.events.index')->with('success', 'Events created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Events $event)
    {
        return view('admin.events.show', ['event' => $event]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Events $event)
    {
        return view('admin.events.edit', ['event' => $event]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Events $event)
    {
        $validated = $request->validate([
            'evn_title' => 'required|string|max:255',
            'evn_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'evn_desc' => 'nullable|string',
            'evn_loc' => 'nullable|string|max:255',
            'evn_start' => 'nullable|date',
            'evn_end' => 'nullable|date',
            'evn_time' => 'nullable|string|max:255',
        ]);

        // Handle image upload if present
        if ($request->hasFile('evn_img')) {
            // Delete old image if it exists
            if ($event->evn_img && Storage::disk('public')->exists($event->evn_img)) {
                Storage::disk('public')->delete($event->evn_img);
            }
            // Store new image
            $imagePath = $request->file('evn_img')->store('events', 'public');
            $validated['evn_img'] = $imagePath;
        }

        $event->update($validated);
        return redirect()->route('admin.events.index')->with('success', 'Events updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Events $event)
    {
        $event->delete();
        return redirect()->route('admin.events.index')->with('success', 'Events deleted successfully.');
    }

    /**
     * Show registration desk page for admins to register attendees
     */
    public function registrationDesk(Events $event)
    {
        $registrations = $event->registrations()->latest()->paginate(200);
        $countries = Country::orderBy('name')->get();
        return view('admin.events.registration_desk', compact('event', 'registrations', 'countries'));
    }

    /**
     * Store attendee registration from desk
     */
    public function registerAttendee(Request $request, Events $event)
    {
        // Get the country to check if it's Nigeria
        $country = Country::find($request->country_of_residence);
        $isNigeria = $country && $country->sortname === 'NG';

        // Defensive normalization: ensure home_church is string when submitted as array
        if ($request->has('home_church') && is_array($request->home_church)) {
            $request->merge(['home_church' => implode(', ', $request->home_church)]);
        }

        $validated = $request->validate([
            // Personal Information
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('event_registrations')->where(function ($query) use ($event) {
                    return $query->where('event_id', $event->id);
                }),
            ],
            'phone' => 'required|string|max:20',
            'gender' => 'required|string|in:Male,Female',
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
            // Consent (admin registers attendee so accept if present, we'll set true server-side)

        ], [
            'contact_consent.accepted' => 'You must agree to be contacted by HOWM',
            'information_correct.accepted' => 'You must confirm that all information is correct',
        ]);

        $validated['event_id'] = $event->id;
        $validated['contact_consent'] = true;
        $validated['information_correct'] = true;

        $registration = EventRegistration::create($validated);

        // Build and store registration code for consistent identifier
        $code = 'HOWM/' . $registration->created_at->format('Y') . '/' . $registration->event_id . '/' . $registration->id;
        $registration->update(['registration_code' => $code]);

        return redirect()->route('admin.events.registration_desk', $event->id)
                   ->with('success', 'Attendee registered successfully!');
    }

    /**
     * Show attendance marking page for a specific date
     */
    public function attendance(Request $request, Events $event)
    {
        // Read date from query string (e.g., ?date=2025-11-21). Default to today.
        $date = $request->query('date', now()->format('Y-m-d'));

        // Show ALL registered attendees, not filtered by attendance_days
        $registrations = $event->registrations()
            ->orderBy('name')
            ->get();

        $uniqueDates = collect();
        foreach ($event->registrations as $reg) {
            $days = is_array($reg->attendance_days) ? $reg->attendance_days : (json_decode($reg->attendance_days, true) ?? []);
            if ($days && is_array($days)) {
                foreach ($days as $day) {
                    $uniqueDates->push($day);
                }
            }
        }
        $uniqueDates = $uniqueDates->unique()->sort();

        return view('admin.events.attendance', compact('event', 'registrations', 'date', 'uniqueDates'));
    }

    /**
     * Mark attendee check-in
     */
    public function markCheckin(Request $request, Events $event, EventRegistration $registration)
    {
        $date = $request->input('date');

        // validate date format and ensure it's not a future date
        try {
            $checkDate = \Carbon\Carbon::createFromFormat('Y-m-d', $date);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Invalid date format'], 422);
        }

        if ($checkDate->isFuture()) {
            return response()->json(['success' => false, 'message' => 'Cannot check-in for a future date'], 422);
        }

        // Normalize existing checked_in_dates to associative array date => timestamp
        $existing = $registration->checked_in_dates ?? [];
        if (!is_array($existing)) {
            $existing = [];
        }

        // If existing is a numeric array of dates, convert to assoc with null timestamps
        $assoc = [];
        $isNumericList = array_values($existing) === $existing;
        if ($isNumericList) {
            foreach ($existing as $d) {
                $assoc[$d] = null;
            }
        } else {
            $assoc = $existing;
        }

        if ($request->boolean('checked_in')) {
            // add or update timestamp for this date
            $assoc[$date] = now()->toDateTimeString();
            $message = 'Checked in successfully at ' . $assoc[$date];
        } else {
            // remove the date entry if present
            if (array_key_exists($date, $assoc)) {
                unset($assoc[$date]);
            }
            $message = 'Check-in removed for ' . $date;
        }

        $registration->update(['checked_in_dates' => $assoc]);

        return response()->json(['success' => true, 'message' => $message, 'checked_in_at' => $assoc[$date] ?? null]);
    }

    /**
     * Export checked-in attendees for a selected date as CSV
     */
    public function exportAttendance(Request $request, Events $event)
    {
        $date = $request->query('date', now()->format('Y-m-d'));

        // validate date
        try {
            $checkDate = \Carbon\Carbon::createFromFormat('Y-m-d', $date);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Invalid date');
        }

        $rows = [];
        foreach ($event->registrations as $reg) {
            $checked = $reg->checked_in_dates ?? [];
            if (is_array($checked) && array_key_exists($date, $checked) && $checked[$date]) {
                $rows[] = [
                    'Name' => $reg->name,
                    'Email' => $reg->email,
                    'Phone' => $reg->phone,
                    'Type' => $reg->attendance_type,
                    'Checked At' => $checked[$date],
                ];
            }
        }

        $filename = 'attendance-' . $event->id . '-' . $date . '.csv';
        $handle = fopen('php://memory', 'w');
        // If no rows, still output header
        fputcsv($handle, ['Name', 'Email', 'Phone', 'Type', 'Checked At']);
        foreach ($rows as $row) {
            fputcsv($handle, $row);
        }
        rewind($handle);
        $csv = stream_get_contents($handle);
        fclose($handle);

        return response($csv, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ]);
    }
}
