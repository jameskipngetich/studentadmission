
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
        <h5>Classes</h5>
        <table>
            <thead>
                <th>Id</th>
                <th>name</th>
                <th>Created At</th>
                <th>Updated At</th>
            </thead>
            <tbody>
                @if(!empty($classes))
                    @foreach($classes as $key=>$Class)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$Class->classname}}</td>
                            <td>{{$Class->created_at}}</td>
                            <td>{{$Class->updated_at}}</td>
                        </tr>
                    @endforeach
                @else
                    <p>No records found</p>
                @endif
            </tbody>
        </table>
              
    </body>
</html>