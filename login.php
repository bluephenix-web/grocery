<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST" onsubmit="login();">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>

        <input type="submit" value="Login">
    </form>

    <script> 
        function login() {
            event.preventDefault();
            let username = document.getElementById("username").value;
            let password = document.getElementById("password").value;

            fetch("process_login.php", {
                method: "POST",
                body: JSON.stringify({
                    username: username,
                    password: password
                })
            })
            .then(response => response.json())
            .then(data => {
                if(data.role == "administrator"){
                    window.location.href = "admin/dashboard.php";
                }
                else if(data.role == "student"){
                    window.location.href = "student/dashboard.php";
                }
            })

        }
    </script>
</body>
</html>