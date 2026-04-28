<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $client = Bouncer::role()->firstOrCreate([
            'name' => 'client',
            'title' => 'client',
        ]);
        $modifier = Bouncer::role()->firstOrCreate([
            'name' => 'midifier',
            'title' => 'peut modifier',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
