<?php

namespace Tests\Feature;

use Tests\TestCase;

class SecurityTest extends TestCase
{
    /**
     * Test that fuzzing / scanning parameters on {lang} return 404.
     */
    public function test_fuzzing_scanner_requests_return_404(): void
    {
        $response1 = $this->get('/wp_Config.php~');
        $response1->assertStatus(404);

        $response2 = $this->get('/phpinfo.php~');
        $response2->assertStatus(404);

        $response3 = $this->get('/.env.old');
        $response3->assertStatus(404);

        $response4 = $this->get('/aws.py');
        $response4->assertStatus(404);
    }

    /**
     * Test that vulnerable LFM endpoints return 404 (removed).
     */
    public function test_lfm_endpoints_do_not_exist(): void
    {
        $response = $this->get('/cms/fire-filemanager');
        $response->assertStatus(404);

        $responseUpload = $this->post('/cms/fire-filemanager/upload');
        $responseUpload->assertStatus(404);

        $responseRename = $this->get('/cms/fire-filemanager/rename?file=test.png&new_name=test.php');
        $responseRename->assertStatus(404);
    }

    /**
     * Test that unauthenticated upload to tinymce upload route redirects to login.
     */
    public function test_unauthenticated_tinymce_upload_is_blocked(): void
    {
        $response = $this->post('/cms/tinymce-upload');
        $response->assertRedirect('/cms/login');
    }

    /**
     * Test that authenticated users can upload valid images and get hashed path.
     */
    public function test_authenticated_user_can_upload_valid_image(): void
    {
        \Illuminate\Support\Facades\Storage::fake('public');

        $file = \Illuminate\Http\UploadedFile::fake()->image('picture.jpg', 100, 100);

        $response = $this->withSession(['id' => 1])
            ->post('/cms/tinymce-upload', [
                'file' => $file,
            ]);

        $response->assertStatus(200);
        $response->assertJsonStructure(['location']);
        $location = $response->json('location');
        $this->assertStringNotContainsString('picture.jpg', $location);
        $this->assertStringContainsString('uploads/editor/', $location);
    }

    /**
     * Test that executable file upload is strictly rejected.
     */
    public function test_executable_file_upload_is_rejected(): void
    {
        \Illuminate\Support\Facades\Storage::fake('public');

        $file = \Illuminate\Http\UploadedFile::fake()->create('shell.php', 100, 'text/x-php');

        $response = $this->withSession(['id' => 1])
            ->post('/cms/tinymce-upload', [
                'file' => $file,
            ]);

        $response->assertStatus(422);
        $response->assertJsonStructure(['error']);
    }
}
