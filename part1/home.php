<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <script>
        function updateForm() {
            var operation = document.getElementById("operation").value;

            // Hide feilds 
            document.getElementById("userid_row").style.display = "none";
            document.getElementById("name_row").style.display = "none";
            document.getElementById("email_row").style.display = "none";
            document.getElementById("role_row").style.display = "none";

            // Show fields needs to fill based on operation
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

    <form method="POST" action="home.php">
        <table style="margin-left: 650px">
            <tr><!-- for select operation and show feilds needs to be filds according to query -->
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
            <!-- all the input fileds that dynamically change to operation select-->
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
                <td><input type="text" name="email" id="email"></td>
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
            <tr><!--logout button direct page back to admin to login to-->
                <td colspan="2">
                    <input type="submit" name="logout" value="Logout">
                </td>
            </tr>
        </table>
    </form>

    <?php
    //call files required to execute
    require_once 'config/connect.php';
    require_once 'function/org.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //if selected logout button direct to login page
        if (isset($_POST['logout'])) {
            header('Location: index.php');
            exit();
        }
        //for operation test case given 
        $operation = $_POST['operation'];
        $user = [
            'id' => $_POST['userid'],
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'role' => $_POST['role']
              ];
        //for select operation call function maegeUser with parameter values
        if ($operation) {
            manageUser($user, $operation, $connect);
        } else {
            //if not selected operation before submit show warning to select operation.
            echo "Please select an operation.";
        }
    }
    ?>
</body>
</html>
