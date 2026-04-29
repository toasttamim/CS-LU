## Module 6: Queues — Concept and Theory

### What is a Queue?

A queue is a linear data structure that follows the **FIFO** principle — **First In, First Out**. Think of a line at a bank: the first person to arrive is the first to be served. New people join at the back, and service happens at the front.

### Core Operations

| Operation   | Description |
|-------------|-------------|
| `enqueue(x)` | Insert element `x` at the rear of the queue |
| `dequeue()`  | Remove and return the element at the front |
| `front()`    | Return the front element without removing it |
| `isEmpty()`  | Return true if the queue has no elements |
| `isFull()`   | Return true if the queue is at capacity |

### Visualization

```
enqueue(10) → enqueue(20) → enqueue(30)

FRONT → | 10 | 20 | 30 | ← REAR

dequeue() returns 10

FRONT → | 20 | 30 | ← REAR
```

### Time Complexity

All queue operations run in **O(1)** time.

---
