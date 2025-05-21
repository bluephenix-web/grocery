<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST" onsubmit="saveUser();">
        <label for="">Username</label>
        <input type="text" name="username" id="username" required>
        
        <label for="">Password</label>
        <input type="password" name="password" id="password" required>
        
        <label for="">Role</label>
        <select name="role" id="role">
            <option value="administrator">Administrator</option>
            <option value="student">Student</option>
        </select>

        <input type="submit" value="Submit">
    </form>

    <table id="users" border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="user-body"></tbody>
    </table>

    <script>
        function fetchUsers(){
            fetch("select.php")
            .then(response => response.json())
            .then(users => {
                let userBody = document.getElementById("user-body");
                userBody.innerHTML = ""; // Clear existing rows
                users.forEach(user => {
                    let row = document.createElement("tr");
                    row.innerHTML = `<td>${user.id}</td>
                    <td>${user.username}</td>
                    <td>${user.password}</td>
                    <td>${user.role}</td>
                    <td>
                        <button onclick="deleteUser(${user.id})">Delete</button>
                        <button onclick="editUser(${user.id})">Edit</button>
                    </td>
                    `;
                    userBody.appendChild(row);
                });
            })
            .catch()
        }
        function deleteUser(id){
            let ans = confirm("Are you sure you want to delete this user?");
            if(ans){
                fetch(`delete.php?id=${id}`, {
                    method: "DELETE"
                })
                .then(response => response.json())
                .then(status => {fetchUsers()})
            }
        }
        function editUser(id){

        }

        function saveUser(){
            event.preventDefault(); // Prevent form submission
            
            let username = document.getElementById("username").value;
            let password = document.getElementById("password").value;
            //added
            let role = document.getElementById("role").value;

            fetch("save_user.php", {
                method: "POST",
                body: JSON.stringify({
                    username: username,
                    password: password,
                    role: role //added
                }),
            })
            .then(response => response.json())
            .then(data => {
                alert(data.status);
                fetchUsers();
            });
            
        }

        fetchUsers();
    </script>
</body>
</html>