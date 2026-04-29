## Module 4: Stack Implementation in C (Linked List-Based)

A linked list-based stack has no fixed size limit. Each element is a node containing data and a pointer to the next node. The `top` pointer always points to the most recently pushed node.

```c
#include <stdio.h>
#include <stdlib.h>

typedef struct Node {
    int data;
    struct Node *next;
} Node;

typedef struct {
    Node *top;
    int size;
} Stack;

void init(Stack *s) {
    s->top = NULL;
    s->size = 0;
}

int isEmpty(Stack *s) {
    return s->top == NULL;
}

void push(Stack *s, int value) {
    Node *newNode = (Node *)malloc(sizeof(Node));
    if (!newNode) {
        printf("Memory allocation failed!\n");
        return;
    }
    newNode->data = value;
    newNode->next = s->top;
    s->top = newNode;
    s->size++;
    printf("Pushed: %d\n", value);
}

int pop(Stack *s) {
    if (isEmpty(s)) {
        printf("Stack Underflow!\n");
        return -1;
    }
    Node *temp = s->top;
    int value = temp->data;
    s->top = s->top->next;
    free(temp);
    s->size--;
    return value;
}

int peek(Stack *s) {
    if (isEmpty(s)) {
        printf("Stack is empty.\n");
        return -1;
    }
    return s->top->data;
}

void printStack(Stack *s) {
    Node *curr = s->top;
    printf("Stack (top → bottom): ");
    while (curr) {
        printf("%d ", curr->data);
        curr = curr->next;
    }
    printf("\n");
}

// Free all nodes
void destroyStack(Stack *s) {
    while (!isEmpty(s)) pop(s);
}

int main() {
    Stack s;
    init(&s);

    push(&s, 5);
    push(&s, 15);
    push(&s, 25);
    printStack(&s);

    printf("Popped: %d\n", pop(&s));
    printStack(&s);

    destroyStack(&s);
    return 0;
}
```

> **Important:** Always free dynamically allocated nodes when you're done. Failing to call `free()` causes memory leaks.

---
