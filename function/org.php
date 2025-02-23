<?php

/*
user id:$u
operstions: add user/delete user/update user/listing users

*/

function manageUser($u, $op, $conn)
{
    //function for add operation
    if ($op == 'add') {
        $sql = "INSERT INTO users (name, email, role) VALUES ('" . $u['name'] . "', '" . $u['email'] . "', '" . $u['role'] . "')";
        $conn->query($sql);
        if ($conn->affected_rows > 0) {
            echo "User added";
        }
    } elseif ($op == 'delete') {
        //function for delete user operation
        $sql = "DELETE FROM users WHERE id=" . $u['id'];
        $conn->query($sql);
        if ($conn->affected_rows > 0) {
            echo "User deleted";
        }
    } elseif ($op == 'update') {
        //function with update user information 
        $sql = "UPDATE users SET name='" . $u['name'] . "', email='" . $u['email'] . "', role='" . $u['role'] . "' WHERE id=" . $u['id'];
        $conn->query($sql);
        if ($conn->affected_rows > 0) {
            echo "User updated";
        }
    } elseif ($op == 'list') {
        //for listing the users ny querying given by user
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                //fetch data from DB and give all user information as output updated to give out put as table format
                
                echo "ID: " . $row["id"] . " - Name: " . $row["name"] . " - Email: " . $row["email"] . " - Role: " . $row["role"] . "<br>";
            }
        } else {
            //if no users found based un query output no found in DB
            echo "No users found";
        }
    } else {
        //if no operation out put invalid operaion
        echo "Invalid operation";
    }
}


// Example usage
//$conn = new mysqli("localhost", "username", "password", "database");

//$user = array(
//   'id' => 1,
//    'name' => 'John Doe',
//   'email' => 'john@example.com',
//    'role' => 'admin'
//);

//manageUser($user, 'add', $conn);

?>