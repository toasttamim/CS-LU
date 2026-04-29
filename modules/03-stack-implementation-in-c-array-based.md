## Module 3: Stack Implementation in C (Array-Based)

This is the simplest implementation. We use a fixed-size array and an integer `top` that tracks the index of the topmost element.

### Full Implementation

```c
#include <stdio.h>
#include <stdlib.h>

#define MAX_SIZE 100

typedef struct {
    int data[MAX_SIZE];
    int top;
} Stack;

// Initialize the stack
void init(Stack *s) {
    s->top = -1;
}

// Check if the stack is empty
int isEmpty(Stack *s) {
    return s->top == -1;
}

// Check if the stack is full
int isFull(Stack *s) {
    return s->top == MAX_SIZE - 1;
}

// Push an element onto the stack
void push(Stack *s, int value) {
    if (isFull(s)) {
        printf("Stack Overflow! Cannot push %d\n", value);
        return;
    }
    s->data[++(s->top)] = value;
    printf("Pushed: %d\n", value);
}

// Pop an element from the stack
int pop(Stack *s) {
    if (isEmpty(s)) {
        printf("Stack Underflow! Stack is empty.\n");
        return -1; // sentinel value
    }
    return s->data[(s->top)--];
}

// Peek at the top element
int peek(Stack *s) {
    if (isEmpty(s)) {
        printf("Stack is empty.\n");
        return -1;
    }
    return s->data[s->top];
}

// Print all elements
void printStack(Stack *s) {
    if (isEmpty(s)) {
        printf("Stack is empty.\n");
        return;
    }
    printf("Stack (top → bottom): ");
    for (int i = s->top; i >= 0; i--) {
        printf("%d ", s->data[i]);
    }
    printf("\n");
}

int main() {
    Stack s;
    init(&s);

    push(&s, 10);
    push(&s, 20);
    push(&s, 30);
    printStack(&s);

    printf("Top element: %d\n", peek(&s));
    printf("Popped: %d\n", pop(&s));
    printf("Popped: %d\n", pop(&s));
    printStack(&s);

    return 0;
}
```

### Output

```
Pushed: 10
Pushed: 20
Pushed: 30
Stack (top → bottom): 30 20 10
Top element: 30
Popped: 30
Popped: 20
Stack (top → bottom): 10
```

### Pros and Cons of Array-Based Stack

**Pros:** Simple, fast, cache-friendly memory layout.  
**Cons:** Fixed size. Stack overflow if the array limit is exceeded.

---
