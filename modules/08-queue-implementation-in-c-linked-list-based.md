## Module 8: Queue Implementation in C (Linked List-Based)

A linked list queue avoids the size limitation and the wasted-space problem. We maintain two pointers: `front` and `rear`.

```c
#include <stdio.h>
#include <stdlib.h>

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
    q->front = q->rear = NULL;
    q->size = 0;
}

int isEmpty(Queue *q) { return q->front == NULL; }

void enqueue(Queue *q, int value) {
    Node *newNode = (Node *)malloc(sizeof(Node));
    if (!newNode) { printf("Memory error!\n"); return; }
    newNode->data = value;
    newNode->next = NULL;

    if (isEmpty(q)) {
        q->front = q->rear = newNode;
    } else {
        q->rear->next = newNode;
        q->rear = newNode;
    }
    q->size++;
    printf("Enqueued: %d\n", value);
}

int dequeue(Queue *q) {
    if (isEmpty(q)) { printf("Queue is empty!\n"); return -1; }
    Node *temp = q->front;
    int value = temp->data;
    q->front = q->front->next;
    if (q->front == NULL) q->rear = NULL;
    free(temp);
    q->size--;
    return value;
}

int frontValue(Queue *q) {
    if (isEmpty(q)) { printf("Queue is empty.\n"); return -1; }
    return q->front->data;
}

void printQueue(Queue *q) {
    Node *curr = q->front;
    printf("Queue (front → rear): ");
    while (curr) { printf("%d ", curr->data); curr = curr->next; }
    printf("\n");
}

void destroyQueue(Queue *q) {
    while (!isEmpty(q)) dequeue(q);
}

int main() {
    Queue q;
    init(&q);

    enqueue(&q, 100);
    enqueue(&q, 200);
    enqueue(&q, 300);
    printQueue(&q);

    printf("Dequeued: %d\n", dequeue(&q));
    printQueue(&q);

    destroyQueue(&q);
    return 0;
}
```

---
