## Module 5: Stack Applications

### 5.1 Balanced Parentheses Checker

A classic stack problem: check whether an expression has balanced brackets.

```c
#include <stdio.h>
#include <string.h>

#define MAX 100

char stack[MAX];
int top = -1;

void push(char c)  { stack[++top] = c; }
char pop()         { return stack[top--]; }
int  isEmpty()     { return top == -1; }

int isBalanced(const char *expr) {
    for (int i = 0; expr[i] != '\0'; i++) {
        char c = expr[i];
        if (c == '(' || c == '{' || c == '[') {
            push(c);
        } else if (c == ')' || c == '}' || c == ']') {
            if (isEmpty()) return 0;
            char top = pop();
            if ((c == ')' && top != '(') ||
                (c == '}' && top != '{') ||
                (c == ']' && top != '['))
                return 0;
        }
    }
    return isEmpty(); // must be empty at the end
}

int main() {
    const char *tests[] = { "{[()]}", "{[(])}", "(((" };
    for (int i = 0; i < 3; i++) {
        printf("\"%s\" → %s\n", tests[i],
               isBalanced(tests[i]) ? "Balanced" : "Not Balanced");
        top = -1; // reset
    }
    return 0;
}
```

**Output:**
```
"{[()]}" → Balanced
"{[(])}" → Not Balanced
"(((" → Not Balanced
```

### 5.2 Reverse a String Using a Stack

```c
#include <stdio.h>
#include <string.h>

#define MAX 100
char stack[MAX];
int top = -1;

void push(char c) { stack[++top] = c; }
char pop()        { return stack[top--]; }
int isEmpty()     { return top == -1; }

void reverseString(char *str) {
    int len = strlen(str);
    for (int i = 0; i < len; i++) push(str[i]);
    for (int i = 0; i < len; i++) str[i] = pop();
}

int main() {
    char str[] = "Hello, World!";
    printf("Original:  %s\n", str);
    reverseString(str);
    printf("Reversed:  %s\n", str);
    return 0;
}
```

---
