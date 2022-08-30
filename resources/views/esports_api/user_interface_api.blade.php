<html>
<head>
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
    </style>
</head>
<body>

<h2>E-spots API</h2>
<table>
    <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>Games</th>
    </tr>

    @foreach($tests as $test)
    <tr>

        <td>{{$test->id}}</td>
        <td>{{$test->name}}</td>
        <td>{{$test->game->name}}</td>

    </tr>
    @endforeach
</table>

</body>
</html>