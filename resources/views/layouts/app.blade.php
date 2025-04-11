<!DOCTYPE html>
<html>
<head>
    <title>Group Task Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">
    <nav class="bg-blue-600 text-white p-4">
        <a href="{{ route('dashboard') }}" class="mr-4">Dashboard</a>
        <a href="{{ route('task.create') }}" class="mr-4">Create Task</a>
        <a href="{{ route('members.index') }}">Group Members</a>
    </nav>
    <div class="p-6">
        @yield('content')
    </div>
</body>
</html>
