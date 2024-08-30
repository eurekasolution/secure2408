

https://github.com/eurekasolution/secure2408

여기까지 커밋

void copy(char *str)
{
    char buf[100];
    strcpy(buf, str);

    printf("buf = %s\n", buf);
}

// ./test hellortrtrtrtrtrtrtr
int main(int argc, char **argv)
{
    copy(argv[1]);


    int i = 3;

    printf("i = %03d\n", i);  // 003
    return 0;
}


https://w3schools.com


javascript:alert(document.cookie);


localhost/phpmyadmin

🤩🤩


CREATE TABLE users ( 

    idx integer auto_increment primary key,
    id  varchar(20) UNIQUE,
    name  varchar(20),
    pass  varchar(50)
);

insert into users (id, name, pass) values('test', 'tester', '1111');
insert into users (id, name, pass) values('admin', 'administrator', '1111');


<script>
 alert('hello');
</script>

&lt;script&gt;
alert('hello');
&lt;/script&gt;

다음과 같은 스키마가 정의되어 있어.
create table bbs(
    idx integer auto_increment primary key,
    title varchar(100),
    name    varchar(20),
    html    mediumtext
);

board.php 파일을 다음과 같이 정의해 줘.
$cmd 값에 따라 write, dbwrite, list, show가 결정돼.
$cmd가 없으면 $cmd = "list"로 기본값 설정

$conn = connectDB();
dbname = kpc;
dbuser = kpc;
dbpass = 1111;

리스트 보기는 게시판의 목록을 보여줘.
목록의 제목을 클릭하면 해당 글보기(show)를 수행
리스트 하단에 글쓰기 버튼을 클릭하면 글쓰기화면(write)
제목과 작성자, 글내용 입력하는 부분 생성
글작성후 실행 버튼을 클릭하면 데이터베이스에 저장


192.168.11.119/board.php