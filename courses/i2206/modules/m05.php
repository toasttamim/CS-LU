<?php /* Module M05 — Stack Applications */ ?>

<h2>Real-World Uses of Stacks</h2>
<p>Stacks are not just academic exercises — they power core features in real software every day.</p>

<h2>5.1 — Balanced Parentheses Checker</h2>
<p>A classic stack problem: check whether an expression has balanced brackets using a stack to match openers and closers.</p>
<pre><code>#include &lt;stdio.h&gt;
#include &lt;string.h&gt;
#define MAX 100

char stack[MAX];
int top = -1;

void push(char c)  { stack[++top] = c; }
char pop()         { return stack[top--]; }
int  isEmpty()     { return top == -1; }

int isBalanced(const char *expr) {
    for (int i = 0; expr[i] != '\0'; i++) {
        char c = expr[i];
        if (c == '(' || c == '{' || c == '[') {
            push(c);
        } else if (c == ')' || c == '}' || c == ']') {
            if (isEmpty()) return 0;
            char t = pop();
            if ((c == ')' &amp;&amp; t != '(') ||
                (c == '}' &amp;&amp; t != '{') ||
                (c == ']' &amp;&amp; t != '['))
                return 0;
        }
    }
    return isEmpty();
}

int main() {
    const char *tests[] = { "{[()]}", "{[(])}", "(((" };
    for (int i = 0; i &lt; 3; i++) {
        printf("\"%s\" → %s\n", tests[i],
               isBalanced(tests[i]) ? "Balanced" : "Not Balanced");
        top = -1; // reset stack
    }
    return 0;
}</code></pre>
<pre><code>"{[()]}" → Balanced
"{[(])}" → Not Balanced
"((("    → Not Balanced</code></pre>

<h2>5.2 — Reverse a String</h2>
<p>Push all characters onto a stack, then pop them off in reverse order.</p>
<pre><code>#include &lt;stdio.h&gt;
#include &lt;string.h&gt;
#define MAX 100

char stack[MAX];
int top = -1;
void push(char c) { stack[++top] = c; }
char pop()        { return stack[top--]; }
int isEmpty()     { return top == -1; }

void reverseString(char *str) {
    int len = strlen(str);
    for (int i = 0; i &lt; len; i++) push(str[i]);
    for (int i = 0; i &lt; len; i++) str[i] = pop();
}

int main() {
    char str[] = "Hello, World!";
    printf("Original:  %s\n", str);
    reverseString(str);
    printf("Reversed:  %s\n", str);
    return 0;
}</code></pre>

<h2>5.3 — Function Call Stack (Conceptual)</h2>
<p>Every time a function is called in C, the CPU pushes a <strong>stack frame</strong> containing the return address, parameters, and local variables. When the function returns, the frame is popped. Recursion works entirely because of this mechanism.</p>
<pre><code>main() calls foo()
foo() calls bar()

CALL STACK:
┌────────────┐  ← TOP
│  bar()     │
├────────────┤
│  foo()     │
├────────────┤
│  main()    │
└────────────┘

bar() returns → popped
foo() returns → popped
main() returns → program ends</code></pre>

<blockquote><strong>Insight:</strong> A stack overflow error (like in infinite recursion) literally means the call stack grew until it ran out of memory.</blockquote>
