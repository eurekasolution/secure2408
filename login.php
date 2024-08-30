<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Result</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Login Result</h2>
    <?php
    function connectDB() {
        $servername = "localhost";
        $dbname = "kpc";
        $username = "kpc";
        $password = "1111";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        return $conn;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $pass = $_POST['pass'];

        // DB 연결
        $conn = connectDB();

        // SQL 쿼리 실행
        $sql = "SELECT * FROM users WHERE id = '$id' AND pass = '$pass'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<div class='alert alert-success'>Login successful!</div>";
        } else {
            echo "<div class='alert alert-danger'>Invalid ID or Password.</div>";
        }

        // DB 연결 종료
        $conn->close();
    } else {
        echo "<div class='alert alert-danger'>Invalid access method.</div>";
    }
    ?>
</div>

<!-- Bootstrap JS (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
