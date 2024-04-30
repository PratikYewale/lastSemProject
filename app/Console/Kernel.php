<?php

namespace App\Console;

use App\Models\Member;
use App\Models\Membership;
use App\Models\MembershipHistory;
use App\Models\User;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    // Import the necessary classes

    // Within the schedule method of your Kernel class
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            // Get all membership histories that have expired
            $expiredMemberships = MembershipHistory::where('end_date', '<', now())->get();

            // Update the role of users associated with expired memberships
            foreach ($expiredMemberships as $membership) {
                $member = Member::where('id',$membership->member_id)->first();
                $this->updateUserRole($member->user_id, 'member');
            }
        })->everyMinute();
    }
    public function updateUserRole($userId, $newRole)
    {
        $user = User::findOrFail($userId);
        $user->role = $newRole;
        $user->save();
    }


    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
