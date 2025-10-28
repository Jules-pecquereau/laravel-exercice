<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        $admin = Bouncer::role()->firstOrCreate([
            'name' => 'admin',
            'title' => 'Administrator',
        ]);
        $modifier = Bouncer::role()->firstOrCreate([
            'name' => 'midifier',
            'title' => 'peut modifier',
        ]);
        $delete = Bouncer::ability()->firstOrCreate([
            'name' => 'delete_univer',
            'title' => 'supprimer un univer',
        ]);
        $create = Bouncer::ability()->firstOrCreate([
            'name' => 'create_univer',
            'title' => 'crée un univer',
        ]);
        $update = Bouncer::ability()->firstOrCreate([
            'name' => 'update_univer',
            'title' => 'mettre a jour un univer',
        ]);

        Bouncer::allow($admin)->to($delete);
        Bouncer::allow($admin)->to($create);
        Bouncer::allow($admin)->to($update);
        Bouncer::allow($modifier)->to($update);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
