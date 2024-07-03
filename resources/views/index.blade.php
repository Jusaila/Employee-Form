<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .container {
            background-color: rgb(208, 167, 90);
            margin-left: 100px;
        }
        .success-message {
            color: green;
            font-weight: bold;
        }
        .error-message {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="error-message">
            {{ session('error') }}
        </div>
    @endif
    <form class="mx-4 my-4" action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <h2>Registration</h2>
        </div>

        {{-- @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="color:red">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name">
                @error('first_name')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name">
                @error('last_name')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group col-md-6">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Email">
            @error('email')
            <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="phone_no">Phone No</label>
            <input type="text" class="form-control" id="phone_no" name="phone_no" placeholder="Phone No">
            @error('phone_no')
            <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="dob">Date of Birth</label>
            <input type="date" class="form-control" id="dob" name="dob">
            @error('dob')
            <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="departments">Departments</label>
            <select class="form-control" name="department_id" >
                <option value="">Choose..</option>
                @foreach($departments as $department)
                <option value="{{ $department->id }}" selected>{{ $department->name }}</option>
                @endforeach
            </select>
            @error('designation')
            <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>



        <div class="form-group col-md-6">
            <label for="designation">Designation</label>
            <select class="form-control" name="designation" >
                <option value="">Choose...</option>
                <option value="Manager" selected>Manager</option>
                <option value="Developer">Developer</option>
                <option value="Designer">Designer</option>
                <option value="Tester">Tester</option>
                <option value="Other">Other</option>
            </select>
            @error('designation')
            <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image">
            @error('image')
            <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>
</body>
</html>
