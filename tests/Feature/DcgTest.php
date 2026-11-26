<?php

namespace Tests\Feature;

use App\Models\Dcg;
use App\Models\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class DcgTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Schema::dropIfExists('dcgs');
        Schema::create('dcgs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('date')->index();
            $table->string('type', 10);
            $table->longText('content')->nullable();
            $table->string('file_path')->nullable();
            $table->timestamps();
        });

        Schema::dropIfExists('ministry');
        Schema::create('ministry', function (Blueprint $table) {
            $table->id();
        });
    }

    public function test_public_can_view_dcg_writeups_without_signing_in(): void
    {
        Dcg::create([
            'title' => 'A daily reflection',
            'date' => '2026-11-26',
            'type' => 'writeup',
            'content' => 'Take time to pray.',
        ]);

        $this->get(route('resources.dcg'))
            ->assertOk()
            ->assertSee('navbarCollapse')
            ->assertSee('A daily reflection')
            ->assertSee('Take time to pray.');
    }

    public function test_public_resources_menu_links_to_dcg(): void
    {
        $this->view('partials.navbar', ['ministries' => collect()])
            ->assertSee(route('resources.dcg'))
            ->assertSee('DCG');
    }

    public function test_verified_user_can_create_dcg_writeup_and_view_it_publicly(): void
    {
        $this->actingAs($this->user(true));

        $this->get(route('admin.dcg.index'))->assertOk();
        $this->get(route('admin.dcg.create'))->assertOk();

        $this->post(route('admin.dcg.store'), [
            'title' => 'Morning prayer',
            'date' => '2026-11-26',
            'type' => 'writeup',
            'content' => 'Begin the day with gratitude.',
        ])->assertRedirect(route('admin.dcg.index'));

        $this->assertDatabaseHas('dcgs', [
            'title' => 'Morning prayer',
            'type' => 'writeup',
            'content' => 'Begin the day with gratitude.',
        ]);

        $this->get(route('resources.dcg'))
            ->assertOk()
            ->assertSee('Morning prayer')
            ->assertSee('Begin the day with gratitude.');
    }

    public function test_uploaded_pdf_is_available_to_the_public(): void
    {
        Storage::fake('local');
        $this->actingAs($this->user(true));

        $this->post(route('admin.dcg.store'), [
            'title' => 'Daily reading',
            'date' => '2026-11-26',
            'type' => 'pdf',
            'file' => UploadedFile::fake()->createWithContent('reading.pdf', "%PDF-1.4\nDaily reading"),
        ])->assertRedirect(route('admin.dcg.index'));

        $entry = Dcg::firstOrFail();
        Storage::disk('local')->assertExists($entry->file_path);

        $this->get(route('resources.dcg.file', $entry))
            ->assertOk()
            ->assertHeader('Content-Type', 'application/pdf')
            ->assertHeader('X-Content-Type-Options', 'nosniff');
    }

    public function test_uploaded_image_is_displayed_on_the_public_page(): void
    {
        Storage::fake('local');
        $this->actingAs($this->user(true));

        $this->post(route('admin.dcg.store'), [
            'title' => 'Daily image',
            'date' => '2026-11-26',
            'type' => 'image',
            'file' => UploadedFile::fake()->image('reflection.png'),
        ])->assertRedirect(route('admin.dcg.index'));

        $entry = Dcg::firstOrFail();

        $this->get(route('resources.dcg'))
            ->assertOk()
            ->assertSee(route('resources.dcg.file', $entry), false);

        $this->get(route('resources.dcg.file', $entry))
            ->assertOk()
            ->assertHeader('Content-Type', 'image/png');
    }

    public function test_non_admin_users_cannot_manage_dcg_entries(): void
    {
        $this->actingAs($this->user(false));

        $this->get(route('admin.dcg.index'))->assertForbidden();
    }

    private function user(bool $isAdmin): User
    {
        $user = new User([
            'first_name' => 'DCG',
            'last_name' => 'Test',
            'username' => 'dcg-test',
            'email' => 'dcg-test@example.com',
            'is_admin' => $isAdmin,
        ]);
        $user->id = 1;
        $user->exists = true;

        return $user;
    }
}
