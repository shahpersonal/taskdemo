<?php

use Illuminate\Database\Seeder;


class UsersRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $permissions =[
        [
            'name' =>'create',
            'display_name'=>'Create new record',
            'description' =>'Can create the new record'
        ],
        [
            'name' =>'edit',
            'display_name'=>'Edit record',
            'description' =>'Can edit the old record'
        ],
        [
            'name' =>'delete',
            'display_name'=>'delete record',
            'description' =>'Can delete the old record'
        ]
        ];
        foreach($permissions as $key=>$value)
        {
            App\Permission::create($value);
        }
    }
}
