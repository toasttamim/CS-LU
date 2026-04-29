## Module 11: Queue Applications

### 11.1 Simulating a Print Queue

```c
#include <stdio.h>
#include <string.h>

#define MAX 10
#define NAME_LEN 50

typedef struct {
    char jobs[MAX][NAME_LEN];
    int front, rear, size;
} PrintQueue;

void init(PrintQueue *q)          { q->front = q->rear = 0; q->size = 0; }
int  isEmpty(PrintQueue *q)       { return q->size == 0; }
int  isFull(PrintQueue *q)        { return q->size == MAX; }

void addJob(PrintQueue *q, const char *job) {
    if (isFull(q)) { printf("Print queue full!\n"); return; }
    strcpy(q->jobs[q->rear], job);
    q->rear = (q->rear + 1) % MAX;
    q->size++;
    printf("Job added: %s\n", job);
}

void processJob(PrintQueue *q) {
    if (isEmpty(q)) { printf("No jobs in queue.\n"); return; }
    printf("Printing: %s\n", q->jobs[q->front]);
    q->front = (q->front + 1) % MAX;
    q->size--;
}

int main() {
    PrintQueue pq;
    init(&pq);

    addJob(&pq, "Report.pdf");
    addJob(&pq, "Resume.docx");
    addJob(&pq, "Invoice.pdf");

    processJob(&pq);
    processJob(&pq);
    processJob(&pq);
    processJob(&pq); // queue empty

    return 0;
}
```

### 11.2 Hot Potato Game (Queue Simulation)

The hot potato game eliminates every k-th player in a circle until one remains. A queue models this perfectly.

```c
#include <stdio.h>
#define MAX 100

int queue[MAX], front = 0, rear = -1, size = 0;

void enqueue(int v) { queue[++rear] = v; size++; }
int  dequeue()      { size--; return queue[front++]; }

int hotPotato(int players[], int n, int k) {
    for (int i = 0; i < n; i++) enqueue(players[i]);

    while (size > 1) {
        // Pass the potato k-1 times (the k-th person is out)
        for (int i = 0; i < k - 1; i++)
            enqueue(dequeue());
        printf("Eliminated: %d\n", dequeue());
    }
    return dequeue();
}

int main() {
    int players[] = {1, 2, 3, 4, 5, 6};
    int n = 6, k = 3;
    int winner = hotPotato(players, n, k);
    printf("Winner: %d\n", winner);
    return 0;
}
```

---
