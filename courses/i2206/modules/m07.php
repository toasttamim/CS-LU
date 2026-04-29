<?php /* Module M07 — Queue Implementation in C (Array-Based) */ ?>

<h2>Overview</h2>
<p>A naive array-based queue uses <code>front</code> and <code>rear</code> indices. One drawback: as elements are dequeued, the front of the array becomes "wasted" space. The circular queue (Module 9) solves this.</p>

<h2>Full Implementation</h2>
<pre><code>#include &lt;stdio.h&gt;
#include &lt;stdlib.h&gt;

#define MAX_SIZE 100

typedef struct {
    int data[MAX_SIZE];
    int front;
    int rear;
    int size;
} Queue;

void init(Queue *q) {
    q-&gt;front = 0;
    q-&gt;rear  = -1;
    q-&gt;size  = 0;
}

int isEmpty(Queue *q) { return q-&gt;size == 0; }
int isFull(Queue *q)  { return q-&gt;size == MAX_SIZE; }

void enqueue(Queue *q, int value) {
    if (isFull(q)) {
        printf("Queue is full! Cannot enqueue %d\n", value);
        return;
    }
    q-&gt;data[++(q-&gt;rear)] = value;
    q-&gt;size++;
    printf("Enqueued: %d\n", value);
}

int dequeue(Queue *q) {
    if (isEmpty(q)) {
        printf("Queue is empty! Cannot dequeue.\n");
        return -1;
    }
    int value = q-&gt;data[q-&gt;front++];
    q-&gt;size--;
    return value;
}

int front(Queue *q) {
    if (isEmpty(q)) { printf("Queue is empty.\n"); return -1; }
    return q-&gt;data[q-&gt;front];
}

void printQueue(Queue *q) {
    if (isEmpty(q)) { printf("Queue is empty.\n"); return; }
    printf("Queue (front → rear): ");
    for (int i = q-&gt;front; i &lt;= q-&gt;rear; i++)
        printf("%d ", q-&gt;data[i]);
    printf("\n");
}

int main() {
    Queue q;
    init(&amp;q);

    enqueue(&amp;q, 10);
    enqueue(&amp;q, 20);
    enqueue(&amp;q, 30);
    printQueue(&amp;q);

    printf("Front: %d\n", front(&amp;q));
    printf("Dequeued: %d\n", dequeue(&amp;q));
    printQueue(&amp;q);

    return 0;
}</code></pre>

<h2>The Wasted Space Problem</h2>
<p>After each <code>dequeue()</code>, the <code>front</code> index moves forward — but those earlier slots can never be reused. If you enqueue and dequeue repeatedly, you'll eventually hit the end of the array even if many slots at the front are empty.</p>
<pre><code>After 3 enqueues + 2 dequeues:

Index: [0]  [1]  [2]  [3]  ...
Data:  [×]  [×]  [30] ...
        ↑              ↑
      wasted         front=2, rear=2

Rear can still advance, but indices 0 and 1 are forever wasted.</code></pre>

<blockquote><strong>Solution:</strong> Use a <strong>Circular Queue</strong> (Module 9) to wrap around and reuse those slots.</blockquote>
