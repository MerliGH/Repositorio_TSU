document.addEventListener('DOMContentLoaded', async () => {
    const result = await fetch('components/content/content.html');
    const content = await result.text();
    document.querySelector('#content').outerHTML = content;
});