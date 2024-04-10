<?php

namespace Tests\Feature;

use App\Models\Informasi;
use App\Models\KartuKeluarga;
use App\Models\Penduduk;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class LandingPageTest extends TestCase
{

    use RefreshDatabase;
    public function test_guest_can_see_homepage_screen(): void
    {
        Role::factory()->create();
        User::factory()->create();
        KartuKeluarga::factory()->create();
        Penduduk::factory()->create();
        Informasi::factory()->create();
        $response = $this->get('/');
        $response->assertStatus(200);
        // $response->assertSeeTextInOrder(['RT Goes Digital:', 'Sambutan Ketua RT']);
    }

    public function test_guest_can_see_news_screen(): void
    {
        Role::factory()->create();
        User::factory()->create();
        KartuKeluarga::factory()->create();
        Penduduk::factory()->create();
        Informasi::factory(20)->create();
        $response = $this->get('/berita');
        $response->assertStatus(200);
        $response->assertSeeText('Semua');
        $response->assertSeeText('Pengumuman');
        $response->assertSeeText('Dokumentasi');
        $response->assertSeeText('Berita');
        $response->assertSeeText('Artikel');
    }

    public function test_guest_can_see_news_detail_screen(): void
    {
        Role::factory()->create();
        User::factory()->create();
        KartuKeluarga::factory()->create();
        Penduduk::factory()->create();
        $berita = Informasi::factory()->create();
        $response = $this->get("berita/" . $berita->berita_id);
        $response->assertSeeText($berita->judul_informasi);
        $response->assertSeeText($berita->jenis_informasi);
    }
}
