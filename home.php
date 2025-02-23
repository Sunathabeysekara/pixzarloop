<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <pre style="margin-left: 700px; font-size: 19px">Library System</pre>
    
    <form method="POST" action="home.php">
        <table style="margin-left: 650px">
            <tr>
                <td>UserID:</td>
                <td><input type="text" name="userid" id="userid"></td>
            </tr>
            <tr>
                <td>Name:</td>
                <td><input type="text" name="name" id="name"></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="text" name="email" id="email"></td>
            </tr>
            <tr>
                <td>Role:</td>
                <td><select name="role" id="role" required>
                        <option value="admin">Admin</option>
                        <option value="librarian">Librarian</option>
                        <option value="user">User</option>
                    </select></td>
            </tr>
            <tr>
                <td><input type="submit" name="add" value="Add"></td>
                <td><input type="submit" name="delete" value="Delete"></td>
                <td><input type="submit" name="update" value="Update"></td>
                <td><input type="submit" name="list" value="List"></td>
            </tr>
            <tr>
                <td><input type="submit" name="logout" value="Logout"></td>
            </tr>
        </table>
    </form>

    <?php
    require_once 'config/connect.php';
    require_once 'function/org.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $userid = $_POST['userid'];
        $username = $_POST['name'];
        $mail = $_POST['email'];
        $role = $_POST['role'];

        if (isset($_POST['add'])) {
            $op=$_POST['add'];
        } elseif (isset($_POST['delete'])) {
           $op=$_POST['delete'];
        } elseif (isset($_POST['update'])) {
           $op=$_POST['update'];
        } elseif (isset($_POST['list'])) {
            $op=$_POST['list'];
        } elseif (isset($_POST['logout'])) {
            header('Location: index.php');
        }
         manageUser($userid,$op, $connect);



    }
    ?>
</body>
</html>
