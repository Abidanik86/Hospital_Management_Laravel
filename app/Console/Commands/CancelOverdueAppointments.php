<?php

namespace App\Console\Commands;
use App\Models\Appointment;
use Illuminate\Console\Command;

class CancelOverdueAppointments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:cancel-overdue-appointments';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $overdueAppointments = Appointment::where('date', '<', now())
        ->where('status', '!=', 'canceled')
        ->get();

    foreach ($overdueAppointments as $appointment) {
        $appointment->update(['status' => 'canceled']);
        // You can perform additional actions if needed
    }

    $this->info(count($overdueAppointments) . ' overdue appointments canceled.');
    }
}
