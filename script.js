const lesson = document.getElementById('lesson');
const nav = document.getElementById('moduleNav');
const topBtn = document.getElementById('topBtn');

// The list of your Markdown files
const modules = [
  { "title": "Introduction", "file": "modules/00-introduction.md" },
  { "title": "1: Linear Structures", "file": "modules/01-introduction-to-linear-data-structures.md" },
  { "title": "2: Stacks Theory", "file": "modules/02-stacks-concept-and-theory.md" },
  { "title": "3: Stack (Array-Based)", "file": "modules/03-stack-implementation-in-c-array-based.md" },
  { "title": "4: Stack (Linked List)", "file": "modules/04-stack-implementation-in-c-linked-list-based.md" },
  { "title": "5: Stack Applications", "file": "modules/05-stack-applications.md" },
  { "title": "6: Queues Theory", "file": "modules/06-queues-concept-and-theory.md" },
  { "title": "7: Queue (Array-Based)", "file": "modules/07-queue-implementation-in-c-array-based.md" },
  { "title": "8: Queue (Linked List)", "file": "modules/08-queue-implementation-in-c-linked-list-based.md" },
  { "title": "9: Circular Queue", "file": "modules/09-circular-queue.md" },
  { "title": "10: Deque", "file": "modules/10-double-ended-queue-deque.md" },
  { "title": "11: Queue Applications", "file": "modules/11-queue-applications.md" },
  { "title": "12: Exercises", "file": "modules/12-exercises-and-challenges.md" }
];

marked.setOptions({ breaks: true, gfm: true });

async function loadModule(file, linkElement) {
  lesson.innerHTML = '<p>Loading lesson content...</p>';
  
  try {
    const response = await fetch(file);
    if (!response.ok) throw new Error('File not found');
    const markdown = await response.text();
    
    lesson.innerHTML = marked.parse(markdown);

    // Apply syntax highlighting to any code blocks found
    document.querySelectorAll('pre code').forEach((el) => {
      hljs.highlightElement(el);
    });

    // Update active link UI
    document.querySelectorAll('#moduleNav a').forEach(a => a.classList.remove('active'));
    if (linkElement) linkElement.classList.add('active');

    window.scrollTo({ top: 0, behavior: 'smooth' });
  } catch (err) {
    lesson.innerHTML = `<div style="color:red; padding:20px; border:1px solid red; border-radius:8px;">
      <b>Error:</b> Could not find <code>${file}</code>. <br>
      Make sure the file name matches exactly (case-sensitive) and is inside the <code>modules/</code> folder.
    </div>`;
  }
}

function init() {
  modules.forEach((module, index) => {
    const a = document.createElement('a');
    a.href = "#";
    a.textContent = module.title;
    a.addEventListener('click', (e) => {
      e.preventDefault();
      loadModule(module.file, a);
    });
    nav.appendChild(a);
    
    // Load first module by default
    if (index === 0) loadModule(module.file, a);
  });
}

// Top button behavior
window.onscroll = () => {
  topBtn.style.display = (window.scrollY > 300) ? "block" : "none";
};
topBtn.onclick = () => window.scrollTo({ top: 0, behavior: 'smooth' });

init();
