

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
