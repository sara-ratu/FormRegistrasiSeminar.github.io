<?php

namespace Tests\Feature;

use App\Models\Registration;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_form_is_displayed(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('Form Pendaftaran')
            ->assertSee('csrf-token');
    }

    public function test_valid_registration_is_saved_and_confirmation_is_shown(): void
    {
        $this->followingRedirects()
            ->post('/registrations', [
                'name' => 'Budi Santoso',
                'email' => 'budi@example.com',
                'birth_date' => '2000-05-12',
                'phone' => '8123456789',
            ])
            ->assertOk()
            ->assertSee('Pendaftaran berhasil!');

        $this->assertDatabaseHas('registrations', [
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'birth_date' => '2000-05-12',
            'phone' => '8123456789',
        ]);
    }

    public function test_invalid_registration_is_rejected(): void
    {
        $this->from('/')
            ->post('/registrations', [
                'name' => 'Bo',
                'email' => 'bukan-email',
                'birth_date' => '2007-01-01',
                'phone' => '123abc',
            ])
            ->assertRedirect('/')
            ->assertSessionHasErrors(['name', 'email', 'birth_date', 'phone']);

        $this->assertDatabaseCount('registrations', 0);
    }

    public function test_email_can_only_be_registered_once(): void
    {
        Registration::create([
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'birth_date' => '2000-05-12',
            'phone' => '8123456789',
        ]);

        $this->post('/registrations', [
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'birth_date' => '2000-05-12',
            'phone' => '8123456789',
        ])->assertSessionHasErrors('email');

        $this->assertDatabaseCount('registrations', 1);
    }
}
