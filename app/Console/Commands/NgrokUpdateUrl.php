<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class NgrokUpdateUrl extends Command
{
    protected $signature = 'ngrok:update-url';
    protected $description = 'Update ngrok URL in .env file';

    public function handle()
    {
        $ngrokUrl = exec('ngrok http --domain=refined-relaxing-redbird.ngrok-free.app 8000'); // Ganti your-subdomain sesuai dengan subdomain ngrok Anda
        $ngrokCallbackUrl = "https://$ngrokUrl/auth/google/callback";

        file_put_contents(base_path('.env'), str_replace(
            'NGROK_CALLBACK_URL=' . env('NGROK_CALLBACK_URL'),
            'NGROK_CALLBACK_URL=' . $ngrokCallbackUrl,
            file_get_contents(base_path('.env'))
        ));

        $this->info("NGROK_CALLBACK_URL has been updated to: $ngrokCallbackUrl");
    }
}
