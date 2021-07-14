<?php

use App\Utm\Users\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddAdminOnUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $user = new User;
        $user->email = 'support@utm.com';
        $user->name = 'Support';
        $user->password = '404a818373f0f431633f3c465dc63498';
        $user->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('users')->truncate();
    }
}
