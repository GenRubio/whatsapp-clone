<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUidUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('users')) {
            Schema::table('users', function (Blueprint $table) {
                if (!Schema::hasColumn('users', 'provider')) {
                    $table->string('provider')->nullable()->after('email');
                }
                if (!Schema::hasColumn('users', 'provider_id')) {
                    $table->string('provider_id')->nullable()->after('email');
                }
                if (!Schema::hasColumn('users', 'friend_code')) {
                    $table->string('friend_code')->nullable()->after('email');
                }
                if (!Schema::hasColumn('users', 'uid')) {
                    $table->string('uid')->nullable()->after('email');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('users')) {
            Schema::table('users', function (Blueprint $table) {
                if (Schema::hasColumn('users', 'provider')) {
                    $table->dropColumn('provider');
                }
                if (Schema::hasColumn('users', 'provider_id')) {
                    $table->dropColumn('provider_id');
                }
                if (!Schema::hasColumn('users', 'friend_code')) {
                    $table->dropColumn('friend_code');
                }
                if (!Schema::hasColumn('users', 'uid')) {
                    $table->dropColumn('uid');
                }
            });
        }
    }
}
