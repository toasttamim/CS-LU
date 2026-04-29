<?php /* Module M12 — Exercises and Challenges */ ?>

<h2>Work Through These in Order of Difficulty</h2>
<p>These exercises solidify everything covered in this course. Attempt each one before looking up solutions.</p>

<h2>🟢 Beginner</h2>

<h3>Exercise 1 — Min Stack</h3>
<p>Implement a stack that supports <code>push</code>, <code>pop</code>, <code>peek</code>, and a <code>getMin</code> operation that returns the minimum element in <strong>O(1)</strong> time.</p>
<blockquote><strong>Hint:</strong> Use a second helper stack that tracks the current minimum. Every time you push, also push the new minimum onto the helper stack. When you pop, pop from both.</blockquote>

<h3>Exercise 2 — Queue Using Two Stacks</h3>
<p>Implement a queue using only two stacks. <code>enqueue</code> should use one stack, and <code>dequeue</code> should use the other.</p>
<blockquote><strong>Hint:</strong> When the dequeue-stack is empty, pour all elements from the enqueue-stack into it (reversing them). This gives correct FIFO order.</blockquote>

<h3>Exercise 3 — Stack Using Two Queues</h3>
<p>Implement a stack using only two queues. Push and pop should behave as expected.</p>
<blockquote><strong>Hint:</strong> On push, enqueue to queue1. On pop, move all elements except the last from queue1 to queue2, return the last, then swap the queues.</blockquote>

<h2>🟡 Intermediate</h2>

<h3>Exercise 4 — Evaluate a Postfix Expression</h3>
<p>Given a postfix expression like <code>5 3 + 8 2 - *</code>, evaluate it using a stack.</p>
<pre><code>Algorithm:
  for each token in expression:
    if token is operand:
      push(token)
    if token is operator:
      b = pop()
      a = pop()
      push(a op b)</code></pre>
<p>Expected: <code>5 3 + 8 2 - *</code> → <code>(5+3) * (8-2)</code> = <code>48</code></p>

<h3>Exercise 5 — Infix to Postfix Conversion</h3>
<p>Convert an infix expression like <code>(A + B) * C</code> to postfix <code>A B + C *</code> using a stack and operator precedence rules.</p>
<div class="table-wrap"><table>
<tr><th>Operator</th><th>Precedence</th></tr>
<tr><td><code>^</code></td><td>3 (highest)</td></tr>
<tr><td><code>* /</code></td><td>2</td></tr>
<tr><td><code>+ -</code></td><td>1</td></tr>
<tr><td><code>( )</code></td><td>0</td></tr>
</table></div>

<h3>Exercise 6 — Next Greater Element</h3>
<p>Given an array, for each element find the next greater element to its right. Use a stack for an <strong>O(n)</strong> solution.</p>
<pre><code>Input:  [4, 5, 2, 10, 8]
Output: [5, 10, 10, -1, -1]</code></pre>
<blockquote><strong>Hint:</strong> Traverse right to left. Use a stack to track candidates. For each element, pop all stack elements smaller than it — they can't be the answer for anything to the left.</blockquote>

<h2>🔴 Advanced</h2>

<h3>Exercise 7 — LRU Cache</h3>
<p>Implement a Least Recently Used (LRU) cache with <code>get(key)</code> and <code>put(key, value)</code> operations, both in <strong>O(1)</strong>.</p>
<blockquote><strong>Hint:</strong> Combine a doubly linked list (to track usage order) with a hash map (for O(1) access). In C, implement the hash map as an array of structs.</blockquote>

<h3>Exercise 8 — Level-Order Binary Tree Traversal</h3>
<p>Given a binary tree, print each level's nodes using a queue (breadth-first traversal).</p>
<pre><code>Tree:
      1
     / \
    2   3
   / \
  4   5

Output:
Level 0: 1
Level 1: 2 3
Level 2: 4 5</code></pre>

<h3>Exercise 9 — Sliding Window Maximum</h3>
<p>Given an array and window size <code>k</code>, find the maximum in every window of size <code>k</code> in <strong>O(n)</strong> using a deque.</p>
<pre><code>Input:  arr = [1, 3, -1, -3, 5, 3, 6, 7], k = 3
Output: [3, 3, 5, 5, 6, 7]</code></pre>
<blockquote><strong>Hint:</strong> The deque stores indices. Maintain it so the front is always the index of the maximum for the current window. Remove indices that are out of the window from the front; remove indices whose values are smaller than the current element from the rear.</blockquote>
