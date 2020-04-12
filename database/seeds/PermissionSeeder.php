<?php

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Permission::truncate();

        $permissions = [
            ['name' => 'Manage App Settings', 'id' => 'manage_app_settings', 'description' => 'Allows user to manage app settings.'],

            // user permissions
            ['name' => 'View Profile', 'id' => 'view_profile', 'description' => 'Allows user to view their profile.'],
            ['name' => 'Edit Profile', 'id' => 'edit_profile', 'description' => 'Allows user to edit their profile.'],
            ['name' => 'Reset Passwords', 'id' => 'reset_passwords', 'description' => 'Allows a user to reset everyone\'s passwords.'],
            ['name' => 'Change User Password', 'id' => 'change_user_password', 'description' => 'Allows a user to change another user\'s password.'],
            ['name' => 'Manage Users', 'id' => 'manage_users', 'description' => 'Allows a user to manage all users.'],

            // role permissions
            ['name' => 'Create Roles', 'id' => 'create_roles', 'description' => 'Allows user to create roles.'],
            ['name' => 'List Roles', 'id' => 'list_roles', 'description' => 'Allows user to list roles.'],
            ['name' => 'Show Role', 'id' => 'show_role', 'description' => 'Allow user to view a role.'],
            ['name' => 'Edit Roles', 'id' => 'edit_roles', 'description' => 'Allows user to edit roles.'],
            ['name' => 'Delete Roles', 'id' => 'delete_roles', 'description' => 'Allows user to delete roles.'],

            // permission permissions
            ['name' => 'Create Permissions', 'id' => 'create_permissions', 'description' => 'Allows user to create permissions.'],
            ['name' => 'List Permissions', 'id' => 'list_permissions', 'description' => 'Allows user to list permissions.'],
            ['name' => 'Show Permission', 'id' => 'show_permission', 'description' => 'Allow user to view a permission.'],
            ['name' => 'Edit Permissions', 'id' => 'edit_permissions', 'description' => 'Allows user to edit permissions.'],
            ['name' => 'Delete Permissions', 'id' => 'delete_permissions', 'description' => 'Allows user to delete permissions.'],

            // project permissions
            ['name' => 'Create Projects', 'id' => 'create_projects', 'description' => 'Allows user to create projects.'],
            ['name' => 'List Projects', 'id' => 'list_projects', 'description' => 'Allows user to list projects.'],
            ['name' => 'Show Project', 'id' => 'show_project', 'description' => 'Allow user to view a project.'],
            ['name' => 'Edit Projects', 'id' => 'edit_projects', 'description' => 'Allows user to edit projects.'],
            ['name' => 'Delete Projects', 'id' => 'delete_projects', 'description' => 'Allows user to delete projects.'],
            ['name' => 'Manage Others Projects', 'id' => 'manage_others_projects', 'description' => 'Manage other users projects.'],

            // task permissions
            ['name' => 'Create Tasks', 'id' => 'create_tasks', 'description' => 'Allows user to create tasks.'],
            ['name' => 'List Tasks', 'id' => 'list_tasks', 'description' => 'Allows user to list tasks.'],
            ['name' => 'Show Task', 'id' => 'show_task', 'description' => 'Allow user to view a task.'],
            ['name' => 'Edit Tasks', 'id' => 'edit_tasks', 'description' => 'Allows user to edit tasks.'],
            ['name' => 'Delete Tasks', 'id' => 'delete_tasks', 'description' => 'Allows user to delete tasks.'],
            ['name' => 'Manage Others Tasks', 'id' => 'manage_others_tasks', 'description' => 'Manage other users tasks.'],
        ];

        foreach ($permissions as $permission) {
            try {
                Permission::create($permission);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }

        $admin = Role::find('admin');
        $user = Role::find('user');

        $userPermissions = PermissionSeeder::getUserPermissions();
        $adminPermissions = PermissionSeeder::getAdminPermissions();

        foreach ($userPermissions as $permission) {
            $user->permissions()->attach($permission);
        }

        foreach ($adminPermissions as $permission) {
            $admin->permissions()->attach($permission);
        }
    }

    public static function getUserPermissions()
    {
        $userPermissions = [];

        $userPermissions[] = Permission::find('view_profile');
        $userPermissions[] = Permission::find('edit_profile');

        $userPermissions[] = Permission::find('list_projects');
        $userPermissions[] = Permission::find('view_projects');
        $userPermissions[] = Permission::find('create_projects');
        $userPermissions[] = Permission::find('edit_projects');
        $userPermissions[] = Permission::find('delete_projects');

        $userPermissions[] = Permission::find('list_tasks');
        $userPermissions[] = Permission::find('view_tasks');
        $userPermissions[] = Permission::find('create_tasks');
        $userPermissions[] = Permission::find('edit_tasks');
        $userPermissions[] = Permission::find('delete_tasks');

        return $userPermissions;
    }

    public static function getAdminPermissions()
    {
        $adminPermissions = self::getUserPermissions();

        $adminPermissions[] = Permission::find('manage_app_settings');
        $adminPermissions[] = Permission::find('manage_users');
        $adminPermissions[] = Permission::find('manage_others_projects');

        $adminPermissions[] = Permission::find('reset_passwords');
        $adminPermissions[] = Permission::find('change_user_password');

        $adminPermissions[] = Permission::find('create_roles');
        $adminPermissions[] = Permission::find('list_roles');
        $adminPermissions[] = Permission::find('show_role');
        $adminPermissions[] = Permission::find('view_role');
        $adminPermissions[] = Permission::find('edit_roles');
        $adminPermissions[] = Permission::find('delete_roles');

        $adminPermissions[] = Permission::find('create_permissions');
        $adminPermissions[] = Permission::find('list_permissions');
        $adminPermissions[] = Permission::find('show_permission');
        $adminPermissions[] = Permission::find('view_permission');
        $adminPermissions[] = Permission::find('edit_permissions');
        $adminPermissions[] = Permission::find('delete_permissions');

        return $adminPermissions;
    }
}
