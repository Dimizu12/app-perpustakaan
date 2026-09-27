{{-- File: resources/views/members/show.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Member Details</title>
    <style>
        body { font-family: sans-serif; margin: 40px; max-width: 500px; }
        table { border-collapse: collapse; width: 100%; margin-top: 16px; }
        th, td { border: 1px solid #ccc; padding: 8px 12px; text-align: left; }
        th { width: 160px; background: #f3f4f6; }
    </style>
</head>
<body>
    <h1>Member Details</h1>
    <p><a href="{{ route('members.index') }}">&larr; Back to member list</a></p>

    <table>
        <tr>
            <th>NIM</th>
            <td>{{ $member['nim'] }}</td>
        </tr>
        <tr>
            <th>Name</th>
            <td>{{ $member['name'] }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $member['email'] }}</td>
        </tr>
        <tr>
            <th>Phone Number</th>
            <td>{{ $member['phone_num'] }}</td>
        </tr>
        <tr>
            <th>Address</th>
            <td>{{ $member['address'] ?? '-' }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $member['status'] }}</td>
        </tr>
    </table>
</body>
</html>
