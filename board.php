<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Board</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <?php
    // 데이터베이스 연결 함수
    function connectDB() {
        $servername = "localhost";
        $dbname = "kpc";
        $username = "kpc";
        $password = "1111";

        // DB 연결 생성
        $conn = new mysqli($servername, $username, $password, $dbname);

        // 연결 체크
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        return $conn;
    }

    // cmd가 설정되지 않았으면 기본값을 list로 설정
    $cmd = isset($_GET['cmd']) ? $_GET['cmd'] : 'list';

    $conn = connectDB();

    if ($cmd == "list") {
        // 게시판 목록 보기
        $sql = "SELECT idx, title, name FROM bbs ORDER BY idx DESC";
        $result = $conn->query($sql);

        echo "<h2>게시판 목록</h2>";
        echo "<table class='table table-bordered'>";
        echo "<tr><th>번호</th><th>제목</th><th>작성자</th></tr>";

        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['idx'] . "</td>";
            echo "<td><a href='board.php?cmd=show&idx=" . $row['idx'] . "'>" . $row['title'] . "</a></td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "<a href='board.php?cmd=write' class='btn btn-primary'>글쓰기</a>";

    } elseif ($cmd == "show") {
        // 게시글 보기
        $idx = intval($_GET['idx']);
        $sql = "SELECT title, name, html FROM bbs WHERE idx = $idx";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        echo "<h2>" . $row['title'] . "</h2>";
        echo "<p><strong>작성자:</strong> " . $row['name'] . "</p>";
        echo "<div>" . $row['html'] . "</div>";
        echo "<a href='board.php' class='btn btn-secondary'>목록으로</a>";

    } elseif ($cmd == "write") {
        // 글쓰기 화면
        echo "<h2>글쓰기</h2>";
        echo "<form action='board.php?cmd=dbwrite' method='post'>";
        echo "<div class='mb-3'>";
        echo "<label for='title' class='form-label'>제목</label>";
        echo "<input type='text' name='title' id='title' class='form-control' required>";
        echo "</div>";
        echo "<div class='mb-3'>";
        echo "<label for='name' class='form-label'>작성자</label>";
        echo "<input type='text' name='name' id='name' class='form-control' required>";
        echo "</div>";
        echo "<div class='mb-3'>";
        echo "<label for='html' class='form-label'>내용</label>";
        echo "<textarea name='html' id='html' class='form-control' rows='10' required></textarea>";
        echo "</div>";
        echo "<button type='submit' class='btn btn-primary'>작성</button>";
        echo "</form>";

    } elseif ($cmd == "dbwrite") {
        // 글 작성 후 DB에 저장
        //$title = $conn->real_escape_string($_POST['title']);
        //$name = $conn->real_escape_string($_POST['name']);
        //$html = $conn->real_escape_string($_POST['html']);

        $title = $_POST['title'];
        $name = $_POST['name'];
        $html = $_POST['html'];

        $html = str_replace("<", "&lt;", $html);
        $html = str_replace(">", "&gt;", $html);


        $sql = "INSERT INTO bbs (title, name, html) VALUES ('$title', '$name', '$html')";

        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success'>글이 성공적으로 작성되었습니다.</div>";
            echo "<a href='board.php' class='btn btn-secondary'>목록으로</a>";
        } else {
            echo "<div class='alert alert-danger'>글 작성에 실패했습니다: " . $conn->error . "</div>";
        }
    }

    // DB 연결 종료
    $conn->close();
    ?>
</div>

<!-- Bootstrap JS (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
