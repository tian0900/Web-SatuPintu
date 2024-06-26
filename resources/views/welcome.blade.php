<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Jenis</title>
    <!-- ICONS -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <!-- STYLESHEET -->
    <link rel="stylesheet" href="Sidebar/style.css" />
</head>
<body>
    

    <h1>Daftar Jenisd</h1>

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
    
    <!-- Jquery -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js"
      integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw=="
      crossorigin="anonymous"
    ></script>
    <script src="script.js"></script>
</body>
</html>
