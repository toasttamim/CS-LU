<?php /* Module M01 — Introduction to Linear Data Structures */ ?>

<h2>What is a Data Structure?</h2>
<p>A <strong>data structure</strong> is a way of organizing data in memory so it can be accessed and modified efficiently. Linear data structures store elements in a sequential order, where each element has a unique predecessor and successor (except the first and last).</p>

<p>Stacks and queues are two of the most fundamental linear data structures. They are <strong>restricted access</strong> structures — meaning you can only insert or remove elements from specific positions, unlike arrays where you can access any index freely.</p>

<h2>Why Do They Matter?</h2>
<p>Understanding them is essential because they appear everywhere in real systems:</p>
<ul>
  <li>Function call management (stack)</li>
  <li>Task scheduling (queue)</li>
  <li>Expression parsing (stack)</li>
  <li>Breadth-first search (queue)</li>
  <li>Undo/redo functionality in editors (stack)</li>
  <li>Network packet buffering (queue)</li>
</ul>

<h2>Linear vs Non-Linear</h2>
<div class="table-wrap"><table>
<tr><th>Type</th><th>Structure</th><th>Examples</th></tr>
<tr><td>Linear</td><td>Sequential — one before the other</td><td>Array, Stack, Queue, Linked List</td></tr>
<tr><td>Non-Linear</td><td>Hierarchical or graph-based</td><td>Tree, Graph, Heap</td></tr>
</table></div>

<h2>Memory Layout</h2>
<p>Linear structures can be implemented in two fundamental ways:</p>
<ul>
  <li><strong>Array-based:</strong> Contiguous memory blocks. Fast, cache-friendly, but fixed size.</li>
  <li><strong>Linked list-based:</strong> Nodes scattered in memory, connected by pointers. Flexible size, but pointer overhead.</li>
</ul>

<blockquote><strong>Key insight:</strong> The choice between array and linked-list implementation is usually a trade-off between <em>speed + simplicity</em> vs <em>flexibility + dynamic sizing</em>.</blockquote>
