<?php

namespace App\Console\Commands;

use App\Models\User;
use Filament\Notifications\Notification;
use Illuminate\Console\Command;

class SendNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a test notification to users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Notification::make()
            ->title('Test Notification')
            ->success()
            ->sendToDatabase(User::first());
        $this->info('Notification sent successfully!');
    }
}
