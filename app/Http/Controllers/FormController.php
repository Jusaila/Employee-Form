<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employee;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Validator;



class FormController extends Controller
{
    public function index()
    {
        $employees = employee::orderBy('created_at','DESC')->get();
        // dd($employees);
        return view('employee-list')->with(compact('employees'));
    }

    public function create(){

        return view('index');
    }

    public function store(Request $request)
    {
        $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'phone_no' => 'required|numeric',
        'email' => 'required|email|unique:employees,email',
        'dob' => 'required',
        'designation' => 'required',
        'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048'

    ];

    $messages = [
        //
        'first_name.required' => 'First name is required',
        'last_name.required' => 'last name is required',
        'phone_no.required' => 'phone no is required',
        'phone_no.numeric' => 'only number allowed',
        'email.required' => 'email is required',
        'email.email' => 'it must include email format (@gmail.com)',
        'dob' => 'dob is required',
        'designation' => 'designation must be select',
        'email.unique' => 'this email already exists',
        'image.required' => 'Image is required',
        'image.mimes' => 'Image must be in jpeg or png or jpg or gif format only',
        'image.max' => 'Maximum image size is 2MB'

    ];

    $validator = Validator::make($request->all(), $rules, $messages);
    //method
    if($validator->fails()){
    return redirect('/create')->withErrors($validator)->withInput();
    }
        $input = $request->all();
//
        $input['image_path'] = "";
        if ($request->hasFile('image')) {
            $filename = $request->image->getClientOriginalName();
            $filename_without_ext = pathinfo($filename, PATHINFO_FILENAME);

            $new_file_name = $filename_without_ext . time() . '.' . $request->image->getClientOriginalExtension();

            $move = $request->image->move(public_path('assets/uploads/image'), $new_file_name);

            $image = url("assets/uploads/image/{$new_file_name}");
            $input['image_path'] = $image;
        }


        $data = employee::employeeSave($input);

        // employee::create([
        //     'first_name' => $request->first_name,
        //     'last_name' => $request->last_name,
        //     'email' => $request->email,
        //     'phone_no' => $request->phone_no,
        //     'dob' => $request->dob,
        //     'designation' => $request->designation,
        // ]);
        // if($data == true){
        //     dd('Employee Details saved Successfully');
        // }else{
        //     dd('Something went wrong');
        // }
        // return view('index');


        if ($data == true) {
            return redirect('/')
                ->with('success', 'Employee details saved successfully.');
        } else {
            return redirect('/')
                ->with('error', 'Something went wrong.');
        }


    }
//delete
    public function delete(Request $request){
        $selectRaw = employee::find($request->id);
        $selectRaw->delete();
        return redirect('/')
        ->with('success', 'Employee details Deleted successfully.');
    }

//edit

        public function edit($id){
            $data = employee::find($id);
            return view('employee-edit')->with(compact('data'));
        }
//update

        public function update(Request $request){

                $rules = [
                'first_name' => 'required',
                'last_name' => 'required',
                'phone_no' => 'required|numeric',
                'email' => 'required|email||unique:employees,email,'.$request->id,
                'dob' => 'required',
                'designation' => 'required',
                // 'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048'

            ];

            $messages = [
                //
                'first_name.required' => 'First name is required',
                'last_name.required' => 'last name is required',
                'phone_no.required' => 'phone no is required',
                'phone_no.numeric' => 'only number allowed',
                'email.required' => 'email is required',
                'email.email' => 'it must include email format (@gmail.com)',
                'dob' => 'dob is required',
                'designation' => 'designation must be select',
                'email.unique' => 'this email already exists',
                // 'image.mimes' => 'Image must be in jpeg or png or jpg or gif format only',
                // 'image.max' => 'Maximum image size is 2MB'

            ];

            $validator = Validator::make($request->all(), $rules, $messages);
            //method

            if ($validator->fails()) {
                return redirect('edit/' . $request->id)
                    ->withErrors($validator)
                    ->withInput();
            }

                $input = $request->all();
        //
                $input['image_path'] = $request->currentImage;
                if ($request->hasFile('image')) {
                    $filename = $request->image->getClientOriginalName();
                    $filename_without_ext = pathinfo($filename, PATHINFO_FILENAME);

                    $new_file_name = $filename_without_ext . time() . '.' . $request->image->getClientOriginalExtension();

                    $move = $request->image->move(public_path('assets/uploads/image'), $new_file_name);

                    $image = url("assets/uploads/image/{$new_file_name}");
                    $input['image_path'] = $image;
                }


                $data = employee::employeeUpdate($input);
                if ($data == true) {
                    return redirect('/')
                        ->with('success', 'Employee details updated successfully.');
                } else {
                    return redirect('/')
                        ->with('error', 'Something went wrong.');
                }



        }
    }
