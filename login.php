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
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');
        $pass = htmlspecialchars($_POST['pass'], ENT_QUOTES, 'UTF-8');
        echo "<p><strong>ID:</strong> $id</p>";
        echo "<p><strong>Password:</strong> $pass</p>";
    } else {
        echo "<div class='alert alert-danger'>Invalid access method.</div>";
    }
    ?>
</div>

<!-- Bootstrap JS (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
