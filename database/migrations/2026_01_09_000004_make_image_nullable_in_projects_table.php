<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // Make the legacy 'image' column nullable to avoid insert errors when it's not provided
        DB::statement("ALTER TABLE `projects` MODIFY `image` VARCHAR(255) NULL;");
    }

    public function down()
    {
        // Revert to NOT NULL with empty string default to be safe
        DB::statement("ALTER TABLE `projects` MODIFY `image` VARCHAR(255) NOT NULL DEFAULT '';");
    }
};
