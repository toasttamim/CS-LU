<?php /* Module M03 — Stack Implementation in C (Array-Based) */ ?>

<h2>Overview</h2>
<p>This is the simplest implementation. We use a fixed-size array and an integer <code>top</code> that tracks the index of the topmost element. When the stack is empty, <code>top = -1</code>.</p>

<h2>Full Implementation</h2>
<pre><code>#include &lt;stdio.h&gt;
#include &lt;stdlib.h&gt;

#define MAX_SIZE 100

typedef struct {
    int data[MAX_SIZE];
    int top;
} Stack;

void init(Stack *s) {
    s-&gt;top = -1;
}

int isEmpty(Stack *s) {
    return s-&gt;top == -1;
}

int isFull(Stack *s) {
    return s-&gt;top == MAX_SIZE - 1;
}

void push(Stack *s, int value) {
    if (isFull(s)) {
        printf("Stack Overflow! Cannot push %d\n", value);
        return;
    }
    s-&gt;data[++(s-&gt;top)] = value;
    printf("Pushed: %d\n", value);
}

int pop(Stack *s) {
    if (isEmpty(s)) {
        printf("Stack Underflow! Stack is empty.\n");
        return -1;
    }
    return s-&gt;data[(s-&gt;top)--];
}

int peek(Stack *s) {
    if (isEmpty(s)) {
        printf("Stack is empty.\n");
        return -1;
    }
    return s-&gt;data[s-&gt;top];
}

void printStack(Stack *s) {
    if (isEmpty(s)) { printf("Stack is empty.\n"); return; }
    printf("Stack (top → bottom): ");
    for (int i = s-&gt;top; i &gt;= 0; i--)
        printf("%d ", s-&gt;data[i]);
    printf("\n");
}

int main() {
    Stack s;
    init(&amp;s);

    push(&amp;s, 10);
    push(&amp;s, 20);
    push(&amp;s, 30);
    printStack(&amp;s);

    printf("Top element: %d\n", peek(&amp;s));
    printf("Popped: %d\n", pop(&amp;s));
    printf("Popped: %d\n", pop(&amp;s));
    printStack(&amp;s);

    return 0;
}</code></pre>

<h2>Expected Output</h2>
<pre><code>Pushed: 10
Pushed: 20
Pushed: 30
Stack (top → bottom): 30 20 10
Top element: 30
Popped: 30
Popped: 20
Stack (top → bottom): 10</code></pre>

<h2>How the top Index Works</h2>
<div class="table-wrap"><table>
<tr><th>Action</th><th>top value</th><th>Array state</th></tr>
<tr><td>init()</td><td>-1</td><td>[] (empty)</td></tr>
<tr><td>push(10)</td><td>0</td><td>[10]</td></tr>
<tr><td>push(20)</td><td>1</td><td>[10, 20]</td></tr>
<tr><td>push(30)</td><td>2</td><td>[10, 20, 30]</td></tr>
<tr><td>pop()</td><td>1</td><td>[10, 20] (30 is gone)</td></tr>
</table></div>

<h2>Pros and Cons</h2>
<ul>
  <li><strong>Pros:</strong> Simple, fast O(1) operations, cache-friendly memory layout.</li>
  <li><strong>Cons:</strong> Fixed size — if <code>MAX_SIZE</code> is too small, stack overflow occurs; if too large, memory is wasted.</li>
</ul>
