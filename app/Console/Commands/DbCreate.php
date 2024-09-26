<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class DbCreate extends Command
{
    // The name and signature of the console command
    protected $signature = 'db:create';

    // The console command description
    protected $description = 'Create the toursmie MySQL database';

    // Execute the console command
    public function handle()
    {
        // Define the database name
        $database = 'toursmie';

        // Update the database configuration dynamically
        Config::set('database.connections.mysql.database', null);

        // Create the new database
        $query = "CREATE DATABASE IF NOT EXISTS $database";
        
        try {
            DB::statement($query);
            $this->info("Database '$database' created successfully.");
        } catch (\Exception $e) {
            $this->error("Failed to create the database: " . $e->getMessage());
        }

        // Reconnect with the newly created database
        Config::set('database.connections.mysql.database', $database);
        DB::reconnect();
    }
}
