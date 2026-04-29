const lesson = document.getElementById('lesson');
const nav = document.getElementById('moduleNav');
const topBtn = document.getElementById('topBtn');

// Define your modules directly here to avoid extra fetch requests
const modules = [
  { "title": "Introduction", "file": "modules/00-introduction.md" },
  { "title": "1: Linear Data Structures", "file": "modules/01-introduction-to-linear-data-structures.md" },
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

// Modern Marked.js setup
marked.setOptions({
  breaks: true,
  gfm: true
});

async function loadModule(file, link) {
  lesson.innerHTML = '<div class="loading">Loading lesson content...</div>';
  
  try {
    const response = await fetch(file);
    if (!response.ok) throw new Error(`Could not load ${file}`);
    
    const markdown = await response.text();
    lesson.innerHTML = marked.parse(markdown);
    
    // Update Active Link UI
    document.querySelectorAll('#moduleNav a').forEach(a => a.classList.remove('active'));
    if (link) link.classList.add('active');
    
    window.scrollTo({ top: 0, behavior: 'smooth' });
  } catch (error) {
    lesson.innerHTML = `<div class="error">Error: ${error.message}. Make sure the file exists in your /modules folder.</div>`;
  }
}

function init() {
  modules.forEach((module, index) => {
    const a = document.createElement('a');
    a.href = '#';
    a.textContent = module.title;
    a.className = 'nav-link'; // Added for easier CSS styling
    
    a.addEventListener('click', (event) => {
      event.preventDefault();
      loadModule(module.file, a);
    });
    
    nav.appendChild(a);
    
    // Load the first module automatically on start
    if (index === 0) loadModule(module.file, a);
  });
}

// Back to top logic
window.onscroll = () => {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    topBtn.style.display = "block";
  } else {
    topBtn.style.display = "none";
  }
};

topBtn.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));

init();
