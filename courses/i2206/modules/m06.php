<?php /* Module M06 — Queues: Concept and Theory */ ?>

<h2>What is a Queue?</h2>
<p>A queue is a linear data structure that follows the <strong>FIFO</strong> principle — <strong>First In, First Out</strong>. Think of a line at a bank: the first person to arrive is the first to be served. New people join at the back, and service happens at the front.</p>

<h2>Core Operations</h2>
<div class="table-wrap"><table>
<tr><th>Operation</th><th>Description</th><th>Complexity</th></tr>
<tr><td><code>enqueue(x)</code></td><td>Insert element <code>x</code> at the rear of the queue</td><td>O(1)</td></tr>
<tr><td><code>dequeue()</code></td><td>Remove and return the element at the front</td><td>O(1)</td></tr>
<tr><td><code>front()</code></td><td>Return the front element without removing it</td><td>O(1)</td></tr>
<tr><td><code>isEmpty()</code></td><td>Return true if the queue has no elements</td><td>O(1)</td></tr>
<tr><td><code>isFull()</code></td><td>Return true if the queue is at capacity</td><td>O(1)</td></tr>
</table></div>

<h2>Visualization</h2>
<pre><code>enqueue(10) → enqueue(20) → enqueue(30)

FRONT → | 10 | 20 | 30 | ← REAR

dequeue() returns 10

FRONT → | 20 | 30 | ← REAR</code></pre>

<h2>Stack vs Queue</h2>
<div class="table-wrap"><table>
<tr><th>Property</th><th>Stack</th><th>Queue</th></tr>
<tr><td>Principle</td><td>LIFO — Last In, First Out</td><td>FIFO — First In, First Out</td></tr>
<tr><td>Insert at</td><td>Top</td><td>Rear</td></tr>
<tr><td>Remove from</td><td>Top</td><td>Front</td></tr>
<tr><td>Real-world</td><td>Plates, browser history</td><td>Bank line, print jobs</td></tr>
</table></div>

<blockquote><strong>Memory trick:</strong> Queue = people in a <strong>Q</strong>ueue (line). The first person in line is the first served. Stack = stack of plates, last plate placed is first removed.</blockquote>
