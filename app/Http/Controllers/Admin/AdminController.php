<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookOrder;
use App\Models\EventRegistration;
use App\Models\Events;
use App\Models\Programme;
use App\Models\Sermon;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $stats = [
            'books' => Book::count(),
            'programmes' => Programme::count(),
            'sermons' => Sermon::count(),
            'events' => Events::count(),
            'users' => User::count(),
            'event_registrations' => EventRegistration::count(),
            'book_orders' => BookOrder::count(),
        ];

        return view('admin.index', compact('stats'));
    }
}