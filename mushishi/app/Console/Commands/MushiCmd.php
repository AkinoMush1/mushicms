<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class MushiCmd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mushi:permission';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '根据permission配置文件生成数据';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $permissionConfigs = include('Modules/Admin/Config/permission.php');
        foreach ($permissionConfigs['permission'] as $permissionConfig) {
            Permission::create(['name' => $permissionConfig['name'], 'guard_name' => $permissionConfig['guard']]);
        }
    }
}
