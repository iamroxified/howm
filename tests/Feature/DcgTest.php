<?php

namespace Tests\Feature;

use App\Models\Dcg;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class DcgTest extends TestCase
{
    use RefreshDatabase;

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
            ->assertSee('A daily reflection')
            ->assertSee('Take time to pray.');
    }

    public function test_verified_user_can_create_dcg_writeup_and_view_it_publicly(): void
    {
        $this->actingAs(User::factory()->create([
            'email_verified_at' => now(),
            'role' => 'admin',
        ]));

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
        $this->actingAs(User::factory()->create([
            'email_verified_at' => now(),
            'role' => 'admin',
        ]));

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
        $this->actingAs(User::factory()->create([
            'email_verified_at' => now(),
            'role' => 'admin',
        ]));

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
        $this->actingAs(User::factory()->create([
            'email_verified_at' => now(),
            'role' => 'student',
        ]));

        $this->get(route('admin.dcg.index'))->assertForbidden();
    }
}
