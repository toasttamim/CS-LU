<?php /* Module M08 — Queue Implementation in C (Linked List-Based) */ ?>

<h2>Overview</h2>
<p>A linked list queue avoids both the size limitation and the wasted-space problem of an array queue. We maintain two pointers: <code>front</code> (where we dequeue) and <code>rear</code> (where we enqueue).</p>

<h2>Node Layout</h2>
<pre><code>front                         rear
  ↓                             ↓
[100] → [200] → [300] → NULL</code></pre>

<h2>Full Implementation</h2>
<pre><code>#include &lt;stdio.h&gt;
#include &lt;stdlib.h&gt;

typedef struct Node {
    int data;
    struct Node *next;
} Node;

typedef struct {
    Node *front;
    Node *rear;
    int size;
} Queue;

void init(Queue *q) {
    q-&gt;front = q-&gt;rear = NULL;
    q-&gt;size = 0;
}

int isEmpty(Queue *q) { return q-&gt;front == NULL; }

void enqueue(Queue *q, int value) {
    Node *newNode = (Node *)malloc(sizeof(Node));
    if (!newNode) { printf("Memory error!\n"); return; }
    newNode-&gt;data = value;
    newNode-&gt;next = NULL;

    if (isEmpty(q)) {
        q-&gt;front = q-&gt;rear = newNode;
    } else {
        q-&gt;rear-&gt;next = newNode;
        q-&gt;rear = newNode;
    }
    q-&gt;size++;
    printf("Enqueued: %d\n", value);
}

int dequeue(Queue *q) {
    if (isEmpty(q)) { printf("Queue is empty!\n"); return -1; }
    Node *temp = q-&gt;front;
    int value = temp-&gt;data;
    q-&gt;front = q-&gt;front-&gt;next;
    if (q-&gt;front == NULL) q-&gt;rear = NULL; // queue is now empty
    free(temp);
    q-&gt;size--;
    return value;
}

int frontValue(Queue *q) {
    if (isEmpty(q)) { printf("Queue is empty.\n"); return -1; }
    return q-&gt;front-&gt;data;
}

void printQueue(Queue *q) {
    Node *curr = q-&gt;front;
    printf("Queue (front → rear): ");
    while (curr) { printf("%d ", curr-&gt;data); curr = curr-&gt;next; }
    printf("\n");
}

void destroyQueue(Queue *q) {
    while (!isEmpty(q)) dequeue(q);
}

int main() {
    Queue q;
    init(&amp;q);

    enqueue(&amp;q, 100);
    enqueue(&amp;q, 200);
    enqueue(&amp;q, 300);
    printQueue(&amp;q);

    printf("Dequeued: %d\n", dequeue(&amp;q));
    printQueue(&amp;q);

    destroyQueue(&amp;q);
    return 0;
}</code></pre>

<h2>Key Implementation Detail</h2>
<p>When the last element is dequeued, both <code>front</code> and <code>rear</code> must be set to <code>NULL</code>. Forgetting this leads to a dangling pointer bug where <code>rear</code> still points to freed memory.</p>
