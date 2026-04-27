# Stack and Queue Manipulation in C

A simple GitHub-ready static course website for stacks and queues in C.

## How to upload to GitHub

1. Create a new GitHub repository.
2. Upload all files from this folder.
3. Keep `index.html`, `style.css`, `script.js`, `manifest.json`, and the `modules/` folder in the root.
4. To publish it as a website, enable GitHub Pages from repository settings.

## How to add a new lesson

1. Create a new Markdown file inside `modules/`, for example `modules/13-linked-list-revision.md`.
2. Write your lesson using Markdown.
3. Add it to `manifest.json` like this:

```json
{
  "title": "Module 13: Linked List Revision",
  "file": "modules/13-linked-list-revision.md"
}
```

## How to preview locally

Because the website loads Markdown files using JavaScript, use a local server:

```bash
python -m http.server 8000
```

Then open `http://localhost:8000`.
