const lesson=document.getElementById('lesson');const nav=document.getElementById('moduleNav');const topBtn=document.getElementById('topBtn');
marked.setOptions({breaks:true,gfm:true});
async function loadManifest(){const response=await fetch('manifest.json');return response.json()}
async function loadModule(file,link){const response=await fetch(file);const markdown=await response.text();lesson.innerHTML=marked.parse(markdown);document.querySelectorAll('nav a').forEach(a=>a.classList.remove('active'));if(link)link.classList.add('active');window.scrollTo({top:0,behavior:'smooth'})}
async function init(){const modules=await loadManifest();modules.forEach((module,index)=>{const a=document.createElement('a');a.href='#';a.textContent=module.title;a.addEventListener('click',event=>{event.preventDefault();loadModule(module.file,a)});nav.appendChild(a);if(index===0)loadModule(module.file,a)})}
topBtn.addEventListener('click',()=>window.scrollTo({top:0,behavior:'smooth'}));init();