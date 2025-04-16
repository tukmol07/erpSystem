<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define role-to-permission mapping
        $rolePermissions = [
            'Production' => ['manage_production'],
            'HR' => ['view_hr', 'manage_employees'],
            'Planning' => ['access_planning'],
            'Inventory_Management' => ['manage_inventory', 'view_stock'],
            'Reporting' => ['view_reports'],
            'CRM' => ['access_crm', 'manage_customers'],
            'Sales_and_Marketing' => ['manage_marketing', 'manage_sales'],
            'Finance_and_Accounting' => ['manage_finances', 'view_accounts'],
        ];

        foreach ($rolePermissions as $roleName => $permissions) {
            $role = Role::where('name', $roleName)->first();
            if ($role) {
                $permissionIds = Permission::whereIn('name', $permissions)->pluck('id');
                $role->permissions()->sync($permissionIds);
            }
        }
    }
}
