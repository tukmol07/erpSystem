<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'manage_production',
            'view_hr',
            'manage_employees',
            'access_planning',
            'manage_inventory',
            'view_stock',
            'view_reports',
            'access_crm',
            'manage_customers',
            'manage_marketing',
            'manage_sales',
            'manage_finances',
            'view_accounts'
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission,
                'description' => 'Permission to ' . str_replace('_', ' ', $permission)
            ]);
        }
    }
}
