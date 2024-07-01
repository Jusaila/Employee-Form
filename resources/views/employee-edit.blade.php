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
    <form class="mx-4 my-4" action="{{ route('update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $data->id }}">
        <input type="hidden" name="currentImage" value="{{ $data->image }}">


        <div>
            <h2>Edit Registration</h2>
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
                <input type="text" class="form-control" id="first_name" value="{{ $data->first_name }}" name="first_name" placeholder="First Name">
                @error('first_name')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" id="last_name" value="{{ $data->last_name }}" name="last_name" placeholder="Last Name">
                @error('last_name')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group col-md-6">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" value="{{ $data->email }}" name="email" placeholder="Email">
            @error('email')
            <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="phone_no">Phone No</label>
            <input type="text" class="form-control" id="phone_no" value="{{ $data->phone_no }}" name="phone_no" placeholder="Phone No">
            @error('phone_no')
            <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="dob">Date of Birth</label>
            <input type="date" class="form-control" id="dob" value="{{ $data->dob }}" name="dob">
            @error('dob')
            <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="designation">Designation</label>
            <select id="designation" class="form-control" value="{{ $data->designation }}" name="designation">
                <option value="">Choose...</option>
                <option value="Manager" @if($data->designation == 'Manager') selected @endif>Manager</option>
                <option value="Developer" @if($data->designation == 'Developer') selected @endif>Developer</option>
                <option value="Designer" @if($data->designation == 'Designer') selected @endif>Designer</option>
                <option value="Tester" @if($data->designation == 'Tester') selected @endif>Tester</option>
                <option value="Other" @if($data->designation == 'Other') selected @endif>Other</option>
            </select>
            @error('designation')
            <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" value="{{ $data->image }}" name="image">
            <img style="width: 50px;height:50px;" src="{{ $data->image }}">
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
