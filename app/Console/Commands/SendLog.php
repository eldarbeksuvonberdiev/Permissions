<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\EmailVerification;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class SendLog extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-log {user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test uchun yozilmoqda';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = $this->getArguments('user');

        $time = Carbon::now()->subSeconds(120);

        $users = User::where('created_at', '>', $time)->delete();

        Log::info($users);
    }
}
