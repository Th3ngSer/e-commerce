<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;e
use Illuminate\Support\Facades\Hash;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $adminRoleId = $this->getOrCreateId('roles', ['name' => 'admin']);
        $managerRoleId = $this->getOrCreateId('roles', ['name' => 'manager']);
        $staffRoleId = $this->getOrCreateId('roles', ['name' => 'staff']);

        $permissions = [
            'users.manage',
            'products.create',
            'products.update',
            'products.delete',
            'category.create',
            'category.update',
            'category.delete',
        ];

        $permissionIds = [];
        foreach ($permissions as $permissionName) {
            $permissionIds[$permissionName] = $this->getOrCreateId('permissions', ['name' => $permissionName]);
        }

        // admin: all permissions
        foreach ($permissionIds as $permissionId) {
            $this->attachPermissionToRole($permissionId, $adminRoleId);
        }

        // manager: manage products + categories (no users.manage)
        $this->attachPermissionToRole($permissionIds['products.create'], $managerRoleId);
        $this->attachPermissionToRole($permissionIds['products.update'], $managerRoleId);
        $this->attachPermissionToRole($permissionIds['products.delete'], $managerRoleId);
        $this->attachPermissionToRole($permissionIds['category.create'], $managerRoleId);
        $this->attachPermissionToRole($permissionIds['category.update'], $managerRoleId);
        $this->attachPermissionToRole($permissionIds['category.delete'], $managerRoleId);

        // staff: create only (example)
        $this->attachPermissionToRole($permissionIds['products.create'], $staffRoleId);

        // Sample users (repeatable)
        $adminUserId = $this->getOrCreateUserId('Admin', 'admin@example.com', 'password');
        $managerUserId = $this->getOrCreateUserId('Manager', 'manager@example.com', 'password');
        $staff1UserId = $this->getOrCreateUserId('Staff 1', 'staff1@example.com', 'password');
        $staff2UserId = $this->getOrCreateUserId('Staff 2', 'staff2@example.com', 'password');

        $this->attachRoleToUser($adminUserId, $adminRoleId);
        $this->attachRoleToUser($managerUserId, $managerRoleId);
        $this->attachRoleToUser($staff1UserId, $staffRoleId);
        $this->attachRoleToUser($staff2UserId, $staffRoleId);
    }

    private function attachRoleToUser(int $userId, int $roleId): void
    {
        DB::table('role_user')->updateOrInsert([
            'user_id' => $userId,
            'role_id' => $roleId,
        ], []);
    }

    private function getOrCreateUserId(string $name, string $email, string $plainPassword): int
    {
        $existingId = User::query()->where('email', $email)->value('id');
        if ($existingId !== null) {
            return (int) $existingId;
        }

        $user = User::query()->create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($plainPassword),
        ]);

        return (int) $user->id;
    }

    private function attachPermissionToRole(int $permissionId, int $roleId): void
    {
        DB::table('permission_role')->updateOrInsert([
            'permission_id' => $permissionId,
            'role_id' => $roleId,
        ], []);
    }

    /**
     * @param array<string, mixed> $unique
     */
    private function getOrCreateId(string $table, array $unique): int
    {
        $query = DB::table($table);

        foreach ($unique as $column => $value) {
            $query->where($column, $value);
        }

        $id = $query->value('id');
        if ($id !== null) {
            return (int) $id;
        }

        return (int) DB::table($table)->insertGetId($unique);
    }
}
