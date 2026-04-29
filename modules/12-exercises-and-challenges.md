## Module 12: Exercises and Challenges

Work through these exercises in order of difficulty.

### Beginner

1. **Min Stack** — Implement a stack that supports `push`, `pop`, `peek`, and a `getMin` operation that returns the minimum element in O(1) time. *(Hint: use a second helper stack.)*

2. **Queue using Two Stacks** — Implement a queue using only two stacks. `enqueue` should use one stack, and `dequeue` should use the other.

3. **Stack using Two Queues** — Implement a stack using only two queues.

### Intermediate

4. **Evaluate a Postfix Expression** — Given a postfix expression like `5 3 + 8 2 - *`, evaluate it using a stack. *(Hint: push operands, pop and compute on operators.)*

5. **Infix to Postfix Conversion** — Convert an infix expression like `(A + B) * C` to postfix `A B + C *` using a stack and operator precedence rules.

6. **Next Greater Element** — Given an array, for each element find the next greater element to its right. Use a stack for an O(n) solution.

### Advanced

7. **LRU Cache** — Implement a Least Recently Used (LRU) cache using a queue (or doubly linked list) and a hash map in C.

8. **Level-Order Binary Tree Traversal** — Given a binary tree, print each level's nodes using a queue (breadth-first traversal).

9. **Sliding Window Maximum** — Given an array and a window size k, find the maximum in every window of size k in O(n) using a deque.

---

## Summary

| Feature            | Stack             | Queue              | Circular Queue     | Deque              |
|--------------------|-------------------|--------------------|--------------------|--------------------|
| Access order       | LIFO              | FIFO               | FIFO               | Both ends          |
| Insert position    | Top only          | Rear only          | Rear only          | Front or Rear      |
| Delete position    | Top only          | Front only         | Front only         | Front or Rear      |
| Array space reuse  | Yes               | No (linear)        | Yes (wraps)        | Yes (wraps)        |
| Dynamic size       | With linked list  | With linked list   | Fixed              | Fixed / Linked     |
| Time complexity    | O(1) all ops      | O(1) all ops       | O(1) all ops       | O(1) all ops       |

---

## Key Takeaways

- Use a **stack** when you need to reverse things, track history, or handle nested structures (like brackets or function calls).
- Use a **queue** when order of arrival matters — scheduling, BFS, buffering.
- Prefer **linked list** implementations when size is unpredictable; prefer **array** implementations for speed and simplicity when the maximum size is known.
- A **circular queue** is the production-grade fix for the linear array queue's wasted-space problem.
- A **deque** is the most flexible of the four — it can simulate both a stack and a queue.
