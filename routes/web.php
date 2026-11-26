<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HodController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\EventsController;
use App\Http\Controllers\Admin\SermonController;
use App\Http\Controllers\PublicEventsController;
use App\Http\Controllers\PublicSermonController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\PublicGalleryController;
use App\Http\Controllers\Admin\MinistryController;
use App\Http\Controllers\PublicMinistryController;
use App\Http\Controllers\Admin\ProgrammeController;
use App\Http\Controllers\Admin\EventRegistrationController;
use App\Http\Controllers\PublicProgrammeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\GivingController;
use App\Http\Controllers\PaymentController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/about','about')->name('about');
Route::view('/blog','blog')->name('blog');
Route::view('/contact','contact')->name('contact');
Route::view('/give','give')->name('give');
Route::view('/leadership','leadership')->name('leadership');

Route::get('/programme', [PublicProgrammeController::class, 'index'])->name('programme.index');

Route::get('/programme/{programme}', [PublicProgrammeController::class, 'show'])->name('programme.show');

Route::get('/gallery', [PublicGalleryController::class, 'index'])->name('gallery.index');
Route::get('/gallery/{gallery}', [PublicGalleryController::class, 'show'])->name('gallery.show');

Route::get('/ministry', [PublicMinistryController::class, 'index'])->name('ministry.index');
Route::get('/ministry/{ministry}', [PublicMinistryController::class, 'show'])->name('ministry.show');

Route::get('/sermon', [PublicSermonController::class, 'index'])->name('sermon.index');
Route::get('/sermon/{sermon}', [PublicSermonController::class, 'show'])->name('sermon.show');

Route::get('/events', [PublicEventsController::class, 'index'])->name('events.index');
Route::get('/events/{event}', [PublicEventsController::class, 'show'])->name('events.show');

Route::get('/event_registration/{event}', [PublicEventsController::class, 'showRegistrationForm'])->name('event_registration');
Route::post('/event_registration', [PublicEventsController::class, 'register'])->name('event_registration.store');
Route::get('/registration/confirmation/{registration}', [PublicEventsController::class, 'confirmation'])->name('registration.confirmation');

Route::view('/activities','activities')->name('activities');
// Route::view('/events','events');

Route::view('/sponsors','sponsors')->name('sponsors');
Route::view('/speakers','speakers')->name('speakers');
Route::view('/team','team')->name('team');

// Location/Country/State API endpoints
Route::get('/api/countries', [LocationController::class, 'getCountries'])->name('api.countries');
Route::get('/api/countries/{country}/states', [LocationController::class, 'getStates'])->name('api.country.states');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/index', function () {
        return redirect()->route('admin.index');
    });

    Route::prefix('admin')->group(function () {
        Route::get('/index', [AdminController::class, 'index'])->name('admin.index');
        
        Route::resource('users', UserController::class)->names([
            'index' => 'admin.users.index',
            'create' => 'admin.users.create',
            'store' => 'admin.users.store',
            'show' => 'admin.users.show',
            'edit' => 'admin.users.edit',
            'update' => 'admin.users.update',
            'destroy' => 'admin.users.destroy',
        ]);

        Route::resource('/programme', ProgrammeController::class, ['names' => ['index' => 'admin.programme.index', 'create' => 'admin.programme.create', 'store' => 'admin.programme.store', 'show' => 'admin.programme.show', 'edit' => 'admin.programme.edit', 'update' => 'admin.programme.update', 'destroy' => 'admin.programme.destroy']]);

        Route::resource('/branches', BranchController::class, ['names' => ['index' => 'admin.branches.index', 'create' => 'admin.branches.create', 'store' => 'admin.branches.store', 'show' => 'admin.branches.show', 'edit' => 'admin.branches.edit', 'update' => 'admin.branches.update', 'destroy' => 'admin.branches.destroy']]);

        Route::resource('/gallery', GalleryController::class, ['names' => ['index' => 'admin.gallery.index', 'create' => 'admin.gallery.create', 'store' => 'admin.gallery.store', 'show' => 'admin.gallery.show', 'edit' => 'admin.gallery.edit', 'update' => 'admin.gallery.update', 'destroy' => 'admin.gallery.destroy']]);

        Route::resource('/sermon', SermonController::class, ['names' => ['index' => 'admin.sermon.index', 'create' => 'admin.sermon.create', 'store' => 'admin.sermon.store', 'show' => 'admin.serm,on.show', 'edit' => 'admin.sermon.edit', 'update' => 'admin.sermon.update', 'destroy' => 'admin.sermon.destroy']]);

        Route::resource('/hod', HodController::class, ['names' => ['index' => 'admin.hod.index', 'create' => 'admin.hod.create', 'store' => 'admin.hod.store', 'show' => 'admin.hod.show', 'edit' => 'admin.hod.edit', 'update' => 'admin.hod.update', 'destroy' => 'admin.hod.destroy']]);

        Route::resource('/ministry', MinistryController::class, ['names' => ['index' => 'admin.ministry.index', 'create' => 'admin.ministry.create', 'store' => 'admin.ministry.store', 'show' => 'admin.ministry.show', 'edit' => 'admin.ministry.edit', 'update' => 'admin.ministry.update', 'destroy' => 'admin.ministry.destroy']]);

        Route::resource('/events', EventsController::class, ['names' => ['index' => 'admin.events.index', 'create' => 'admin.events.create', 'store' => 'admin.events.store', 'show' => 'admin.events.show', 'edit' => 'admin.events.edit', 'update' => 'admin.events.update', 'destroy' => 'admin.events.destroy']]);

        Route::resource('registrations', EventRegistrationController::class)->only([
            'show', 'edit', 'update', 'destroy'
        ])->names([
            'show' => 'admin.registrations.show',
            'edit' => 'admin.registrations.edit',
            'update' => 'admin.registrations.update',
            'destroy' => 'admin.registrations.destroy',
        ]);

        // Event registration desk and attendance routes
        Route::get('/events/{event}/registration-desk', [EventsController::class, 'registrationDesk'])->name('admin.events.registration_desk');
        Route::post('/events/{event}/register-attendee', [EventsController::class, 'registerAttendee'])->name('admin.events.register_attendee');
        Route::get('/events/{event}/attendance', [EventsController::class, 'attendance'])->name('admin.events.attendance');
        Route::post('/events/{event}/attendance/{registration}/checkin', [EventsController::class, 'markCheckin'])->name('admin.events.mark_checkin');
        Route::get('/events/{event}/attendance/export', [EventsController::class, 'exportAttendance'])->name('admin.events.attendance_export');

        Route::get('/books', [BookController::class, 'adminIndex'])->name('admin.books.index');
        Route::get('/books/create', [BookController::class, 'create'])->name('admin.books.create');
        Route::post('/books', [BookController::class, 'store'])->name('admin.books.store');
        Route::get('/books/{book}', [BookController::class, 'adminShow'])->name('admin.books.show');
        Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('admin.books.edit');
        Route::put('/books/{book}', [BookController::class, 'update'])->name('admin.books.update');
        Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('admin.books.destroy');

        Route::get('/givings', [\App\Http\Controllers\Admin\GivingController::class, 'index'])->name('admin.givings.index');
        Route::get('/givings/{giving}/requery', [\App\Http\Controllers\Admin\GivingController::class, 'requery'])->name('admin.givings.requery');

        Route::get('/book-orders', [\App\Http\Controllers\Admin\BookOrderController::class, 'index'])->name('admin.book_orders.index');
        Route::get('/book-orders/{book_order}/requery', [\App\Http\Controllers\Admin\BookOrderController::class, 'requery'])->name('admin.book_orders.requery');
    });
});

Route::get('/bookstore', [BookController::class, 'index'])->name('books.index');
Route::get('/bookstore/{book}', [BookController::class, 'show'])->name('books.show');
Route::get('/bookstore/{book}/checkout', [BookController::class, 'showCheckoutForm'])->name('books.checkout');

// Giving Routes
Route::get('/give-now', [GivingController::class, 'showGivingForm'])->name('giving.form');
Route::post('/give-now', [GivingController::class, 'redirectToGateway'])->name('giving.pay');
Route::get('/giving/callback', [GivingController::class, 'handleGatewayCallback'])->name('giving.callback');

// Paystack Routes
Route::post('/pay', [PaymentController::class, 'redirectToGateway'])->name('pay');
Route::get('/payment/callback', [PaymentController::class, 'handleGatewayCallback'])->name('payment.callback');

// Catch-all route for 404 errors
Route::fallback(function () {
    return response()->view('404', [], 404);
});

require __DIR__.'/auth.php';
