<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <title>Curd</title>
</head>

<body>
    <div class="container">
        <a href="{{url('/add-data')}}" class="btn btn-primary my-3">Add Data</a>
        @if(Session::has('msg'))
        <p class="alert alert-success">{{Session::get('msg')}}</p>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($showData as $value=>$data)
                <tr>
                    <td>{{$value+1}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->email}}</td>
                    <td>{{$data->address}}</td>

                    <td>
                        <a href="{{url('/edit-data/'.$data->id)}}" class="btn btn-success"><i class="las la-edit"></i></a>
                        <a href="{{url('/delete-data/'.$data->id)}}" onclick="return confirm('Are You Sure To Delete')" class="btn btn-danger"><i class="las la-trash-alt"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$showData ->links()}}
    </div>

    
    @include('ajax_js')

    
</body>

</html>