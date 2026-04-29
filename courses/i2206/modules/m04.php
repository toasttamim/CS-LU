<?php /* Module M04 — Stack Implementation in C (Linked List-Based) */ ?>

<h2>Overview</h2>
<p>A linked list-based stack has no fixed size limit. Each element is a <strong>node</strong> containing data and a pointer to the next node. The <code>top</code> pointer always points to the most recently pushed node.</p>

<h2>Node Structure</h2>
<pre><code>TOP
 ↓
[30] → [20] → [10] → NULL</code></pre>

<h2>Full Implementation</h2>
<pre><code>#include &lt;stdio.h&gt;
#include &lt;stdlib.h&gt;

typedef struct Node {
    int data;
    struct Node *next;
} Node;

typedef struct {
    Node *top;
    int size;
} Stack;

void init(Stack *s) {
    s-&gt;top = NULL;
    s-&gt;size = 0;
}

int isEmpty(Stack *s) {
    return s-&gt;top == NULL;
}

void push(Stack *s, int value) {
    Node *newNode = (Node *)malloc(sizeof(Node));
    if (!newNode) { printf("Memory allocation failed!\n"); return; }
    newNode-&gt;data = value;
    newNode-&gt;next = s-&gt;top;
    s-&gt;top = newNode;
    s-&gt;size++;
    printf("Pushed: %d\n", value);
}

int pop(Stack *s) {
    if (isEmpty(s)) { printf("Stack Underflow!\n"); return -1; }
    Node *temp = s-&gt;top;
    int value = temp-&gt;data;
    s-&gt;top = s-&gt;top-&gt;next;
    free(temp);
    s-&gt;size--;
    return value;
}

int peek(Stack *s) {
    if (isEmpty(s)) { printf("Stack is empty.\n"); return -1; }
    return s-&gt;top-&gt;data;
}

void printStack(Stack *s) {
    Node *curr = s-&gt;top;
    printf("Stack (top → bottom): ");
    while (curr) { printf("%d ", curr-&gt;data); curr = curr-&gt;next; }
    printf("\n");
}

void destroyStack(Stack *s) {
    while (!isEmpty(s)) pop(s);
}

int main() {
    Stack s;
    init(&amp;s);
    push(&amp;s, 5);
    push(&amp;s, 15);
    push(&amp;s, 25);
    printStack(&amp;s);
    printf("Popped: %d\n", pop(&amp;s));
    printStack(&amp;s);
    destroyStack(&amp;s);
    return 0;
}</code></pre>

<blockquote><strong>Important:</strong> Always free dynamically allocated nodes when you're done. Failing to call <code>free()</code> causes memory leaks — a common bug in C programs.</blockquote>

<h2>Array vs Linked List Stack</h2>
<div class="table-wrap"><table>
<tr><th>Feature</th><th>Array-Based</th><th>Linked List-Based</th></tr>
<tr><td>Size</td><td>Fixed at compile time</td><td>Dynamic, grows on demand</td></tr>
<tr><td>Memory</td><td>Contiguous, cache-friendly</td><td>Scattered nodes + pointer overhead</td></tr>
<tr><td>Overflow</td><td>Possible</td><td>Only if RAM exhausted</td></tr>
<tr><td>Complexity</td><td>Simple</td><td>Requires memory management</td></tr>
</table></div>
