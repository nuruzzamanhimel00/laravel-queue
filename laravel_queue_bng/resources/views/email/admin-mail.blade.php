<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
       <thead>
            <tr>
                <td>Email</td>
                <td>Name</td>
            </tr>
       </thead>
       <tbody>
        @foreach($datas as $data)
        <tr>
            <td>{{$data->email}}</td>
            <td>{{$data->name}}</td>
        </tr>
        @endforeach
       </tbody>
    </table>
</body>
</html>
