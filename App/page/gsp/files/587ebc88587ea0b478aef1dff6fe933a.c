#include<stdio.h>
#include<stdlib.h>

void strcmp(char *m1, char *m2){
    int cnt= 0;
    int i= 0;
    for(; m1[i]!= '\0'; i++){
        if(m1[i]!= m2[i]){
            cnt++;
        }
    }
    if(cnt== 0){
        printf("일치");
    }else{
        printf("불일치하는 개수: %d개", cnt);
    }
}

int main(){
    char *m1= "13245";
    char *m2= "12345";
    strcmp(m1, m2);

    return 0;
}