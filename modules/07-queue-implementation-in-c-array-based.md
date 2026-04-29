## Module 7: Queue Implementation in C (Array-Based)

A naive array-based queue uses `front` and `rear` indices. One drawback: as elements are dequeued, the front of the array is "wasted" space. The circular queue (Module 9) solves this.

```c
#include <stdio.h>
#include <stdlib.h>

#define MAX_SIZE 100

typedef struct {
    int data[MAX_SIZE];
    int front;
    int rear;
    int size;
} Queue;

void init(Queue *q) {
    q->front = 0;
    q->rear  = -1;
    q->size  = 0;
}

int isEmpty(Queue *q) { return q->size == 0; }
int isFull(Queue *q)  { return q->size == MAX_SIZE; }

void enqueue(Queue *q, int value) {
    if (isFull(q)) {
        printf("Queue is full! Cannot enqueue %d\n", value);
        return;
    }
    q->data[++(q->rear)] = value;
    q->size++;
    printf("Enqueued: %d\n", value);
}

int dequeue(Queue *q) {
    if (isEmpty(q)) {
        printf("Queue is empty! Cannot dequeue.\n");
        return -1;
    }
    int value = q->data[q->front++];
    q->size--;
    return value;
}

int front(Queue *q) {
    if (isEmpty(q)) { printf("Queue is empty.\n"); return -1; }
    return q->data[q->front];
}

void printQueue(Queue *q) {
    if (isEmpty(q)) { printf("Queue is empty.\n"); return; }
    printf("Queue (front → rear): ");
    for (int i = q->front; i <= q->rear; i++)
        printf("%d ", q->data[i]);
    printf("\n");
}

int main() {
    Queue q;
    init(&q);

    enqueue(&q, 10);
    enqueue(&q, 20);
    enqueue(&q, 30);
    printQueue(&q);

    printf("Front: %d\n", front(&q));
    printf("Dequeued: %d\n", dequeue(&q));
    printQueue(&q);

    return 0;
}
```

---
