
<html>
<head>
    <title>Document</title>
    <style>
        table{
            width:80%;
            margin:20px auto;
            border-collapse:collapse;
            font-family:Arial, sans-serif;
        }
        th, td{
            padding:12px;
            text-align:left;
            border:1px solid #ddd;
        }
        th{
            background-color:#4CAF50;
            color:white;

        }
        tr:nth-child(even){
            background-color: #f2f2f2;
        }
        tr:hover{
            background-color:#ddd;
        }
    </style>
</head>
    <body>
        <h5>Users</h5>
        <table>
            <thead>
                <th>Id</th>
                <th>name</th>
                <th>Created At</th>
                <th>Updated At</th>
            </thead>
            <tbody>
                @if(!empty($departments))
                    @foreach($departments as $key=>$department)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$department->departmentname}}</td>
                            <td>{{$department->created_at}}</td>
                            <td>{{$department->updated_at}}</td>
                        </tr>
                    @endforeach
                @else
                    <p>No records found</p>
                @endif
            </tbody>
        </table>
              
    </body>
</html>