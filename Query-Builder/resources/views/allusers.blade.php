<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
   <div class="container ">
    <div class="row">
    <div class="col-6">
        <h1>All Users</h1>
        <table class="table table-bordered table-striped">
           
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Age</th>
                <th>E-mail</th>
                <th>View</th>
            </tr>
            @foreach($data as $id => $users)
            <tr>
                <td>{{ $users->id}} </td>
                <td>{{ $users->name}} </td>
                <td>{{ $users->age}}</td>
                <td>{{ $users->email}}</td>
                <td><a href="{{route('view.user',$users->id)}}" class="btn btn-primary">View</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
</div> 
</body>
</html>
