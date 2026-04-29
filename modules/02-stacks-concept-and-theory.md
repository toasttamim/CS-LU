## Module 2: Stacks — Concept and Theory

### What is a Stack?

A stack is a linear data structure that follows the **LIFO** principle — **Last In, First Out**. Think of a stack of plates: you always add a new plate on top and take from the top. You cannot remove the bottom plate without removing all the ones above it first.

### Core Operations

| Operation | Description |
|-----------|-------------|
| `push(x)` | Insert element `x` on top of the stack |
| `pop()`   | Remove and return the top element |
| `peek()`  | Return the top element without removing it |
| `isEmpty()` | Return true if the stack has no elements |
| `isFull()` | Return true if the stack is at capacity (array-based) |

### Visualization

```
push(10) → push(20) → push(30)

     |  30  |   ← TOP
     |  20  |
     |  10  |
     +------+

pop() returns 30

     |  20  |   ← TOP
     |  10  |
     +------+
```

### Time Complexity

All stack operations run in **O(1)** time — constant time, regardless of stack size.

---
