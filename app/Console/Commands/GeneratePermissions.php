<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;

class GeneratePermissions extends Command
{
    protected $signature = 'permission:generate';
    protected $description = 'Generate permissions based on resource controllers';

    private $resources = [
        'user' => ['view', 'create', 'edit', 'delete'],
        'role' => ['view', 'create', 'edit', 'delete'],
        'permission' => ['view', 'create', 'edit', 'delete'],
    ];

    public function handle()
    {
        foreach ($this->resources as $resource => $actions) {
            foreach ($actions as $action) {
                $name = strtolower($action . '-' . $resource);
                Permission::firstOrCreate(['name' => $name]);
                $this->info("Permission created: $name");
            }
        }

        $this->info('All permissions have been generated!');
    }
}