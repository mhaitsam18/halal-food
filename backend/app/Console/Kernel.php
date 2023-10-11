<?php

namespace App\Console;

use App\Models\Restaurant;
use App\Models\Reviewer;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Artisan;
use Carbon\Carbon;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $now = Carbon::now(); // Ambil waktu saat ini
            
            // $restos = Restaurant::where('deadline', '<', $now)->get();
            $reviewers= Reviewer::whereDoesntHave('review')->whereHas('restaurant', function ($query) use ($now) {
                $query->where('deadline', '<', $now);
            })->get();

            // $reviewers= Reviewer::whereDoesntHave('certificate_report')->get();

            // foreach ($reviewers as $reviewer) {
            //     if ($reviewer->restaurant->deadline < $now) {

            //         $created_at = $reviewer->restaurant->created_at;
            //         $deadline = $reviewer->restaurant->deadline;

            //         $time = $created_at->diffInDays($deadline);
            //         $add_deadline = Carbon::now()->addDays($time)->format('Y-m-d');
            //         if ($reviewer->restaurant->status == 'Menunggu Kontributor') {
            //             $reviewer->restaurant->update([
            //                 'deadline' => $add_deadline,
            //             ]);
            //         } else {
            //             $reviewer->restaurant->update([
            //                 'deadline' => $add_deadline,
            //                 'status' => 'Menunggu Kontributor'
            //             ]);
        
            //             $reviewer->delete();
            //         }
            //     }
            // }

            // foreach ($restos as $resto) {
            //     $created_at = $resto->created_at;
            //     $deadline = $resto->deadline;

            //     $time = $created_at->diffInDays($deadline);
            //     $add_deadline = Carbon::now()->addDays($time)->format('Y-m-d');
            //     if ($resto->status == 'Menunggu Kontributor') {
            //         $resto->update([
            //             'deadline' => $add_deadline
            //         ]);
            //     } else {
            //         $reviewers = 
            //     }
            // }
            foreach ($reviewers as $reviewer) {
                $created_at = $reviewer->restaurant->created_at;
                $deadline = $reviewer->restaurant->deadline;

                $time = $created_at->diffInDays($deadline);
                $add_deadline = Carbon::now()->addDays($time)->format('Y-m-d');

                if ($reviewer->restaurant->status == 'Menunggu Kontributor' && $reviewer->restaurant->deadline < $now) {

                    $reviewer->restaurant->update([
                        'deadline' => $add_deadline,
                    ]);

                } else {
                    $reviewer->restaurant->update([
                        'deadline' => $add_deadline,
                        'status' => 'Menunggu Kontributor'
                    ]);
    
                    $reviewer->delete();
                }
            }

        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
