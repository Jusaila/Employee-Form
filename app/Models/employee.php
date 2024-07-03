<?php

namespace App\Models;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone_no', 'dob', 'designation','image','department_id'

    ];

//static to call to controller
    public static function employeeSave($input){
        //dd($input);

        $createEmployee = employee::create([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'email' => $input['email'],
            'phone_no' => $input['phone_no'],
            'dob' => $input['dob'],
            'designation' => $input['designation'],
            'department_id' => $input['department_id'],

            'image' => $input['image_path']
        ]);
        if($createEmployee){
            return true;
        }else{
            return false;
        }

    }

    public static function employeeUpdate($input){
        // dd($input);

        $updateEmployee = employee::where('id',$input['id'])->update([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'email' => $input['email'],
            'phone_no' => $input['phone_no'],
            'dob' => $input['dob'],
            'designation' => $input['designation'],
            'department_id' => $input['department_id'],
            'image' => $input['image_path']
        ]);
        if($updateEmployee){
            return true;
        }else{
            return false;
        }

    }



}
