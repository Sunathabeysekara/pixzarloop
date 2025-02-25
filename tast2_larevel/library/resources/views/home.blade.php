<!DOCTYPE html>
<html>
<head>
    <title>Library System</title>
    <script>
        function updateForm() {
            var operation = document.getElementById("operation").value;

            // Hide fields
            document.getElementById("userid_row").style.display = "none";
            document.getElementById("name_row").style.display = "none";
            document.getElementById("email_row").style.display = "none";
            document.getElementById("role_row").style.display = "none";

            // Show required fields based on selected operation
            if (operation === "add") {
                document.getElementById("name_row").style.display = "table-row";
                document.getElementById("email_row").style.display = "table-row";
                document.getElementById("role_row").style.display = "table-row";
            } else if (operation === "update") {
                document.getElementById("userid_row").style.display = "table-row";
                document.getElementById("name_row").style.display = "table-row";
                document.getElementById("email_row").style.display = "table-row";
                document.getElementById("role_row").style.display = "table-row";
            } else if (operation === "delete") {
                document.getElementById("userid_row").style.display = "table-row";
            }
        }
    </script>
</head>

<body>
    <pre style="margin-left: 700px;font-size: 19px">Library System</pre>

    <form method="POST" action="{{ route('user.action') }}">
        @csrf
        <table style="margin-left: 650px">
            <tr>
                <td>Select Operation:</td>
                <td>
                    <select id="operation" name="operation" onchange="updateForm()">
                        <option value="">-- Select --</option>
                        <option value="add">Add</option>
                        <option value="update">Update</option>
                        <option value="delete">Delete</option>
                        <option value="list">List</option>
                    </select>
                </td>
            </tr>
            <tr id="userid_row" style="display: none;">
                <td>UserID:</td>
                <td><input type="text" name="userid" id="userid"></td>
            </tr>
            <tr id="name_row" style="display: none;">
                <td>Name:</td>
                <td><input type="text" name="name" id="name"></td>
            </tr>
            <tr id="email_row" style="display: none;">
                <td>Email:</td>
                <td><input type="email" name="email" id="email"></td>
            </tr>
            <tr id="role_row" style="display: none;">
                <td>Role:</td>
                <td><input type="text" name="role" id="role"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Submit">
                </td>
            </tr>
        </table>
    </form>

    @if(isset($users))
        <h3>Users List</h3>
        <table border="1" style="margin-left: 650px; border-collapse: collapse;">
            <tr><th>ID</th><th>Name</th><th>Email</th><th>Role</th></tr>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                </tr>
            @endforeach
        </table>
    @endif
</body>
</html>
