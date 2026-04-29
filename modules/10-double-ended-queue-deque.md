## Module 10: Double-Ended Queue (Deque)

A **deque** (double-ended queue) allows insertion and deletion from **both ends** — front and rear. It's a generalization of both stacks and queues.

```c
#include <stdio.h>
#define MAX 10

typedef struct {
    int data[MAX];
    int front, rear, size;
} Deque;

void init(Deque *d) { d->front = MAX / 2; d->rear = MAX / 2 - 1; d->size = 0; }

int isEmpty(Deque *d) { return d->size == 0; }
int isFull(Deque *d)  { return d->size == MAX; }

void insertFront(Deque *d, int val) {
    if (isFull(d)) { printf("Deque is full!\n"); return; }
    d->front = (d->front - 1 + MAX) % MAX;
    d->data[d->front] = val;
    d->size++;
}

void insertRear(Deque *d, int val) {
    if (isFull(d)) { printf("Deque is full!\n"); return; }
    d->rear = (d->rear + 1) % MAX;
    d->data[d->rear] = val;
    d->size++;
}

int deleteFront(Deque *d) {
    if (isEmpty(d)) { printf("Deque is empty!\n"); return -1; }
    int val = d->data[d->front];
    d->front = (d->front + 1) % MAX;
    d->size--;
    return val;
}

int deleteRear(Deque *d) {
    if (isEmpty(d)) { printf("Deque is empty!\n"); return -1; }
    int val = d->data[d->rear];
    d->rear = (d->rear - 1 + MAX) % MAX;
    d->size--;
    return val;
}

void printDeque(Deque *d) {
    printf("Deque (front → rear): ");
    for (int i = 0, idx = d->front; i < d->size; i++) {
        printf("%d ", d->data[idx]);
        idx = (idx + 1) % MAX;
    }
    printf("\n");
}

int main() {
    Deque d;
    init(&d);

    insertRear(&d, 10);
    insertRear(&d, 20);
    insertFront(&d, 5);
    insertFront(&d, 1);
    printDeque(&d);  // 1 5 10 20

    printf("Delete front: %d\n", deleteFront(&d));
    printf("Delete rear:  %d\n", deleteRear(&d));
    printDeque(&d);  // 5 10

    return 0;
}
```

---
