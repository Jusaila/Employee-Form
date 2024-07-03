<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

      .container {
        background-color: lightblue;
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

    @if(session('success'))
        <div class="success-message" id="flash-message">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="error-message"id="flash-message" >
            {{ session('error') }}
        </div>
    @endif

<h2>Employee List</h2>
<div>
  <a class="btn btn-primary" href="{{ route('create') }}" role="button">Create New</a>
</div>
<br>
<table>
  <tr>
    <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>E-mail</th>
    <th>Phone No</th>
    <th>DOB</th>
    <th>Designation</th>
    <th>Department</th>

    <th>Image</th>
    <th>Delete</th>
    <th>Edit</th>

  </tr>
  @foreach($employees as $employee)
  <tr>
    <td>{{$employee->id }}</td>

    <td>{{$employee->first_name }}</td>
    <td>{{$employee->last_name }}</td>
    <td>{{$employee->email }}</td>
    <td>{{$employee->phone_no }}</td>
    <td>{{date('d-m-Y', strtotime($employee->dob ))}}</td>
    <td>{{$employee->designation }}</td>
    <td>{{$employee->department_name }}</td>

    <td><img style="width: 50px;height:50px;" src="{{ $employee->image }}"></td>
    <td>
        <form method="POST" action="{{ route('delete') }}">
            @csrf
            <input type="hidden" name="id" value="{{ $employee->id }}">
        <button type="submit">Delete</button>
        </form>
    </td>
    <td>
        <a href="{{ url('edit/'.$employee->id) }}" ><button class="btn btn-primary">Edit</button></a>
    </td>
  </tr>
  @endforeach

  <script>
    document.addEventListener('DOMContentLoaded', function() {
        const flashMessage = document.getElementById('flash-message');
        if (flashMessage) {
            setTimeout(() => {
                flashMessage.style.display = 'none';
            }, 3000); // 5000 milliseconds = 5 seconds
        }
    });
</script>


</table>

</body>
</html>

