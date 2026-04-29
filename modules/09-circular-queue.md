## Module 9: Circular Queue

In a standard array-based queue, once `rear` reaches the end of the array, no more enqueuing is possible even if there's free space at the front (from previous dequeues). A **circular queue** wraps around using the modulo operator `%`.

```c
#include <stdio.h>
#define MAX 5

typedef struct {
    int data[MAX];
    int front, rear, size;
} CircularQueue;

void init(CircularQueue *q) {
    q->front = q->rear = 0;
    q->size = 0;
}

int isEmpty(CircularQueue *q) { return q->size == 0; }
int isFull(CircularQueue *q)  { return q->size == MAX; }

void enqueue(CircularQueue *q, int value) {
    if (isFull(q)) { printf("Queue is full!\n"); return; }
    q->data[q->rear] = value;
    q->rear = (q->rear + 1) % MAX;   // wrap around
    q->size++;
    printf("Enqueued: %d\n", value);
}

int dequeue(CircularQueue *q) {
    if (isEmpty(q)) { printf("Queue is empty!\n"); return -1; }
    int value = q->data[q->front];
    q->front = (q->front + 1) % MAX; // wrap around
    q->size--;
    return value;
}

void printQueue(CircularQueue *q) {
    if (isEmpty(q)) { printf("Queue is empty.\n"); return; }
    printf("Queue: ");
    for (int i = 0, idx = q->front; i < q->size; i++) {
        printf("%d ", q->data[idx]);
        idx = (idx + 1) % MAX;
    }
    printf("\n");
}

int main() {
    CircularQueue q;
    init(&q);

    enqueue(&q, 1);
    enqueue(&q, 2);
    enqueue(&q, 3);
    enqueue(&q, 4);
    enqueue(&q, 5);  // fills the queue

    printf("Dequeued: %d\n", dequeue(&q));
    printf("Dequeued: %d\n", dequeue(&q));

    enqueue(&q, 6);  // can reuse freed slots now
    enqueue(&q, 7);

    printQueue(&q);
    return 0;
}
```

**Key idea:** `rear = (rear + 1) % MAX` and `front = (front + 1) % MAX` make the array behave as if it's circular.

---
