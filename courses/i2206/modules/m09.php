<?php /* Module M09 — Circular Queue */ ?>

<h2>The Problem it Solves</h2>
<p>In a standard array-based queue, once <code>rear</code> reaches the end of the array, no more enqueuing is possible — even if there's free space at the front from previous dequeues. A <strong>circular queue</strong> wraps around using the modulo operator <code>%</code>.</p>

<h2>How the Wrap-Around Works</h2>
<pre><code>Array of size 5, indices 0..4

After enqueue × 5 + dequeue × 2:

Index:  [0]  [1]  [2]  [3]  [4]
         ↑              ↑
       front=2       rear=4

After dequeue × 2 more + enqueue × 2 (wraps):

rear wraps: (4+1)%5=0, (0+1)%5=1

Index:  [0]  [1]  [2]  [3]  [4]
   new→  ↑    ↑    ↑
        rear  ...  front</code></pre>

<h2>Full Implementation</h2>
<pre><code>#include &lt;stdio.h&gt;
#define MAX 5

typedef struct {
    int data[MAX];
    int front, rear, size;
} CircularQueue;

void init(CircularQueue *q) {
    q-&gt;front = q-&gt;rear = 0;
    q-&gt;size = 0;
}

int isEmpty(CircularQueue *q) { return q-&gt;size == 0; }
int isFull(CircularQueue *q)  { return q-&gt;size == MAX; }

void enqueue(CircularQueue *q, int value) {
    if (isFull(q)) { printf("Queue is full!\n"); return; }
    q-&gt;data[q-&gt;rear] = value;
    q-&gt;rear = (q-&gt;rear + 1) % MAX;   // wrap around
    q-&gt;size++;
    printf("Enqueued: %d\n", value);
}

int dequeue(CircularQueue *q) {
    if (isEmpty(q)) { printf("Queue is empty!\n"); return -1; }
    int value = q-&gt;data[q-&gt;front];
    q-&gt;front = (q-&gt;front + 1) % MAX; // wrap around
    q-&gt;size--;
    return value;
}

void printQueue(CircularQueue *q) {
    if (isEmpty(q)) { printf("Queue is empty.\n"); return; }
    printf("Queue: ");
    for (int i = 0, idx = q-&gt;front; i &lt; q-&gt;size; i++) {
        printf("%d ", q-&gt;data[idx]);
        idx = (idx + 1) % MAX;
    }
    printf("\n");
}

int main() {
    CircularQueue q;
    init(&amp;q);

    enqueue(&amp;q, 1); enqueue(&amp;q, 2);
    enqueue(&amp;q, 3); enqueue(&amp;q, 4);
    enqueue(&amp;q, 5); // fills the queue

    printf("Dequeued: %d\n", dequeue(&amp;q));
    printf("Dequeued: %d\n", dequeue(&amp;q));

    enqueue(&amp;q, 6); // reuses slot 0
    enqueue(&amp;q, 7); // reuses slot 1
    printQueue(&amp;q);
    return 0;
}</code></pre>

<blockquote><strong>Key formula:</strong> <code>rear = (rear + 1) % MAX</code> and <code>front = (front + 1) % MAX</code> make the array behave as if it's circular — the slot after the last is index 0.</blockquote>
