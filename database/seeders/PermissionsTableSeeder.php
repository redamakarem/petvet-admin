<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'auth_profile_edit',
            ],
            [
                'id'    => 2,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 3,
                'title' => 'permission_create',
            ],
            [
                'id'    => 4,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 5,
                'title' => 'permission_show',
            ],
            [
                'id'    => 6,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 7,
                'title' => 'permission_access',
            ],
            [
                'id'    => 8,
                'title' => 'role_create',
            ],
            [
                'id'    => 9,
                'title' => 'role_edit',
            ],
            [
                'id'    => 10,
                'title' => 'role_show',
            ],
            [
                'id'    => 11,
                'title' => 'role_delete',
            ],
            [
                'id'    => 12,
                'title' => 'role_access',
            ],
            [
                'id'    => 13,
                'title' => 'user_create',
            ],
            [
                'id'    => 14,
                'title' => 'user_edit',
            ],
            [
                'id'    => 15,
                'title' => 'user_show',
            ],
            [
                'id'    => 16,
                'title' => 'user_delete',
            ],
            [
                'id'    => 17,
                'title' => 'user_access',
            ],
            [
                'id'    => 18,
                'title' => 'pet_create',
            ],
            [
                'id'    => 19,
                'title' => 'pet_edit',
            ],
            [
                'id'    => 20,
                'title' => 'pet_show',
            ],
            [
                'id'    => 21,
                'title' => 'pet_delete',
            ],
            [
                'id'    => 22,
                'title' => 'pet_access',
            ],
            [
                'id'    => 23,
                'title' => 'pettype_create',
            ],
            [
                'id'    => 24,
                'title' => 'pettype_edit',
            ],
            [
                'id'    => 25,
                'title' => 'pettype_show',
            ],
            [
                'id'    => 26,
                'title' => 'pettype_delete',
            ],
            [
                'id'    => 27,
                'title' => 'pettype_access',
            ],
            [
                'id'    => 28,
                'title' => 'pet_gender_create',
            ],
            [
                'id'    => 29,
                'title' => 'pet_gender_edit',
            ],
            [
                'id'    => 30,
                'title' => 'pet_gender_show',
            ],
            [
                'id'    => 31,
                'title' => 'pet_gender_delete',
            ],
            [
                'id'    => 32,
                'title' => 'pet_gender_access',
            ],
            [
                'id'    => 33,
                'title' => 'vet_proffesion_create',
            ],
            [
                'id'    => 34,
                'title' => 'vet_proffesion_edit',
            ],
            [
                'id'    => 35,
                'title' => 'vet_proffesion_show',
            ],
            [
                'id'    => 36,
                'title' => 'vet_proffesion_delete',
            ],
            [
                'id'    => 37,
                'title' => 'vet_proffesion_access',
            ],
            [
                'id'    => 38,
                'title' => 'vet_location_create',
            ],
            [
                'id'    => 39,
                'title' => 'vet_location_edit',
            ],
            [
                'id'    => 40,
                'title' => 'vet_location_show',
            ],
            [
                'id'    => 41,
                'title' => 'vet_location_delete',
            ],
            [
                'id'    => 42,
                'title' => 'vet_location_access',
            ],
            [
                'id'    => 43,
                'title' => 'medical_history_create',
            ],
            [
                'id'    => 44,
                'title' => 'medical_history_edit',
            ],
            [
                'id'    => 45,
                'title' => 'medical_history_show',
            ],
            [
                'id'    => 46,
                'title' => 'medical_history_delete',
            ],
            [
                'id'    => 47,
                'title' => 'medical_history_access',
            ],
            [
                'id'    => 48,
                'title' => 'todo_create',
            ],
            [
                'id'    => 49,
                'title' => 'todo_edit',
            ],
            [
                'id'    => 50,
                'title' => 'todo_show',
            ],
            [
                'id'    => 51,
                'title' => 'todo_delete',
            ],
            [
                'id'    => 52,
                'title' => 'todo_access',
            ],
            [
                'id'    => 53,
                'title' => 'message_create',
            ],
            [
                'id'    => 54,
                'title' => 'message_edit',
            ],
            [
                'id'    => 55,
                'title' => 'message_show',
            ],
            [
                'id'    => 56,
                'title' => 'message_delete',
            ],
            [
                'id'    => 57,
                'title' => 'message_access',
            ],
            [
                'id'    => 58,
                'title' => 'subsription_create',
            ],
            [
                'id'    => 59,
                'title' => 'subsription_edit',
            ],
            [
                'id'    => 60,
                'title' => 'subsription_show',
            ],
            [
                'id'    => 61,
                'title' => 'subsription_delete',
            ],
            [
                'id'    => 62,
                'title' => 'subsription_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
