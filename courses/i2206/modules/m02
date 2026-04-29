<?php /* Module M02 — Stacks: Concept and Theory */ ?>

<h2>What is a Stack?</h2>
<p>A stack is a linear data structure that follows the <strong>LIFO</strong> principle — <strong>Last In, First Out</strong>. Think of a stack of plates: you always add a new plate on top and take from the top. You cannot remove the bottom plate without removing all the ones above it first.</p>

<h2>Core Operations</h2>
<div class="table-wrap"><table>
<tr><th>Operation</th><th>Description</th><th>Complexity</th></tr>
<tr><td><code>push(x)</code></td><td>Insert element <code>x</code> on top of the stack</td><td>O(1)</td></tr>
<tr><td><code>pop()</code></td><td>Remove and return the top element</td><td>O(1)</td></tr>
<tr><td><code>peek()</code></td><td>Return the top element without removing it</td><td>O(1)</td></tr>
<tr><td><code>isEmpty()</code></td><td>Return true if the stack has no elements</td><td>O(1)</td></tr>
<tr><td><code>isFull()</code></td><td>Return true if the stack is at capacity (array-based only)</td><td>O(1)</td></tr>
</table></div>

<h2>Visualization</h2>
<pre><code>push(10) → push(20) → push(30)

     |  30  |   ← TOP
     |  20  |
     |  10  |
     +------+

pop() returns 30

     |  20  |   ← TOP
     |  10  |
     +------+</code></pre>

<h2>Time Complexity</h2>
<p>All stack operations run in <strong>O(1)</strong> time — constant time, regardless of stack size. This is because:</p>
<ul>
  <li><code>push</code> only touches the top position</li>
  <li><code>pop</code> only removes from the top</li>
  <li>No searching or traversal is ever needed</li>
</ul>

<h2>Common Pitfalls</h2>
<ul>
  <li><strong>Stack Overflow:</strong> Pushing onto a full array-based stack. Always check <code>isFull()</code> before pushing.</li>
  <li><strong>Stack Underflow:</strong> Popping from an empty stack. Always check <code>isEmpty()</code> before popping.</li>
</ul>

<blockquote><strong>Real-world analogy:</strong> Your browser's Back button is a stack. Each page you visit is pushed. Clicking Back pops the most recent page.</blockquote>
