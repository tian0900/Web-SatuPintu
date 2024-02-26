<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Jenis</title>
</head>
<body>
    <h1>Daftar Jenis</h1>

    <table>
        <thead>
            <tr>
                <th>Identifier</th>
                <th>Username</th>
                <th>First name</th>
                <th>Last name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jenis as $item)
                <tr>
                    <td>{{ $item->_id }}</td>
                    <td>{{ $item->Username }}</td>
                    <td>{{ $item->{'First name'} }}</td>
                    <td>{{ $item->{'Last name'} }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
