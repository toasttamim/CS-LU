<?php /* Module M11 — Queue Applications */ ?>

<h2>11.1 — Simulating a Print Queue</h2>
<p>A printer queue is a real-world FIFO queue: jobs are printed in the order they arrive.</p>
<pre><code>#include &lt;stdio.h&gt;
#include &lt;string.h&gt;
#define MAX 10
#define NAME_LEN 50

typedef struct {
    char jobs[MAX][NAME_LEN];
    int front, rear, size;
} PrintQueue;

void init(PrintQueue *q)    { q-&gt;front = q-&gt;rear = 0; q-&gt;size = 0; }
int  isEmpty(PrintQueue *q) { return q-&gt;size == 0; }
int  isFull(PrintQueue *q)  { return q-&gt;size == MAX; }

void addJob(PrintQueue *q, const char *job) {
    if (isFull(q)) { printf("Print queue full!\n"); return; }
    strcpy(q-&gt;jobs[q-&gt;rear], job);
    q-&gt;rear = (q-&gt;rear + 1) % MAX;
    q-&gt;size++;
    printf("Job added: %s\n", job);
}

void processJob(PrintQueue *q) {
    if (isEmpty(q)) { printf("No jobs in queue.\n"); return; }
    printf("Printing: %s\n", q-&gt;jobs[q-&gt;front]);
    q-&gt;front = (q-&gt;front + 1) % MAX;
    q-&gt;size--;
}

int main() {
    PrintQueue pq;
    init(&amp;pq);
    addJob(&amp;pq, "Report.pdf");
    addJob(&amp;pq, "Resume.docx");
    addJob(&amp;pq, "Invoice.pdf");
    processJob(&amp;pq);
    processJob(&amp;pq);
    processJob(&amp;pq);
    processJob(&amp;pq); // queue empty
    return 0;
}</code></pre>

<h2>11.2 — Hot Potato Game (Josephus Problem)</h2>
<p>The hot potato game eliminates every k-th player in a circle until one remains. A queue models this perfectly — keep rotating the front player to the back until it's their turn to be eliminated.</p>
<pre><code>#include &lt;stdio.h&gt;
#define MAX 100

int queue[MAX], front = 0, rear = -1, size = 0;
void enqueue(int v) { queue[++rear] = v; size++; }
int  dequeue()      { size--; return queue[front++]; }

int hotPotato(int players[], int n, int k) {
    for (int i = 0; i &lt; n; i++) enqueue(players[i]);

    while (size &gt; 1) {
        // Pass potato k-1 times (k-th person is eliminated)
        for (int i = 0; i &lt; k - 1; i++)
            enqueue(dequeue());
        printf("Eliminated: %d\n", dequeue());
    }
    return dequeue();
}

int main() {
    int players[] = {1, 2, 3, 4, 5, 6};
    int winner = hotPotato(players, 6, 3);
    printf("Winner: %d\n", winner);
    return 0;
}</code></pre>

<h2>11.3 — Breadth-First Search (BFS)</h2>
<p>BFS explores a graph level by level. A queue ensures nodes are visited in the correct order (nearest first).</p>
<pre><code>Algorithm BFS(graph, start):
  create empty queue Q
  mark start as visited
  enqueue(start)

  while Q is not empty:
    node = dequeue(Q)
    process(node)
    for each neighbor of node:
      if neighbor not visited:
        mark neighbor as visited
        enqueue(neighbor)</code></pre>

<blockquote><strong>Rule of thumb:</strong> If an algorithm needs to process things in <em>arrival order</em>, reach for a queue. If it needs to process the <em>most recent</em> thing first, reach for a stack.</blockquote>
