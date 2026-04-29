<?php /* Module M10 — Double-Ended Queue (Deque) */ ?>

<h2>What is a Deque?</h2>
<p>A <strong>deque</strong> (double-ended queue, pronounced "deck") allows insertion and deletion from <strong>both ends</strong> — front and rear. It's a generalization of both stacks and queues.</p>

<h2>Operations Summary</h2>
<div class="table-wrap"><table>
<tr><th>Operation</th><th>Description</th></tr>
<tr><td><code>insertFront(x)</code></td><td>Insert at the front</td></tr>
<tr><td><code>insertRear(x)</code></td><td>Insert at the rear</td></tr>
<tr><td><code>deleteFront()</code></td><td>Remove from the front</td></tr>
<tr><td><code>deleteRear()</code></td><td>Remove from the rear</td></tr>
<tr><td><code>isEmpty()</code></td><td>Check if empty</td></tr>
<tr><td><code>isFull()</code></td><td>Check if full</td></tr>
</table></div>

<h2>Full Implementation</h2>
<pre><code>#include &lt;stdio.h&gt;
#define MAX 10

typedef struct {
    int data[MAX];
    int front, rear, size;
} Deque;

void init(Deque *d) {
    d-&gt;front = MAX / 2;
    d-&gt;rear  = MAX / 2 - 1;
    d-&gt;size  = 0;
}

int isEmpty(Deque *d) { return d-&gt;size == 0; }
int isFull(Deque *d)  { return d-&gt;size == MAX; }

void insertFront(Deque *d, int val) {
    if (isFull(d)) { printf("Deque is full!\n"); return; }
    d-&gt;front = (d-&gt;front - 1 + MAX) % MAX;
    d-&gt;data[d-&gt;front] = val;
    d-&gt;size++;
}

void insertRear(Deque *d, int val) {
    if (isFull(d)) { printf("Deque is full!\n"); return; }
    d-&gt;rear = (d-&gt;rear + 1) % MAX;
    d-&gt;data[d-&gt;rear] = val;
    d-&gt;size++;
}

int deleteFront(Deque *d) {
    if (isEmpty(d)) { printf("Deque is empty!\n"); return -1; }
    int val = d-&gt;data[d-&gt;front];
    d-&gt;front = (d-&gt;front + 1) % MAX;
    d-&gt;size--;
    return val;
}

int deleteRear(Deque *d) {
    if (isEmpty(d)) { printf("Deque is empty!\n"); return -1; }
    int val = d-&gt;data[d-&gt;rear];
    d-&gt;rear = (d-&gt;rear - 1 + MAX) % MAX;
    d-&gt;size--;
    return val;
}

void printDeque(Deque *d) {
    printf("Deque (front → rear): ");
    for (int i = 0, idx = d-&gt;front; i &lt; d-&gt;size; i++) {
        printf("%d ", d-&gt;data[idx]);
        idx = (idx + 1) % MAX;
    }
    printf("\n");
}

int main() {
    Deque d;
    init(&amp;d);

    insertRear(&amp;d, 10);
    insertRear(&amp;d, 20);
    insertFront(&amp;d, 5);
    insertFront(&amp;d, 1);
    printDeque(&amp;d);  // 1 5 10 20

    printf("Delete front: %d\n", deleteFront(&amp;d));
    printf("Delete rear:  %d\n", deleteRear(&amp;d));
    printDeque(&amp;d);  // 5 10
    return 0;
}</code></pre>

<h2>Deque as Stack and Queue</h2>
<ul>
  <li><strong>Use as a Stack:</strong> Only use <code>insertFront</code> and <code>deleteFront</code> — that's LIFO.</li>
  <li><strong>Use as a Queue:</strong> Only use <code>insertRear</code> and <code>deleteFront</code> — that's FIFO.</li>
  <li><strong>Deque shines</strong> when you need both behaviors, e.g. the <em>Sliding Window Maximum</em> algorithm.</li>
</ul>
