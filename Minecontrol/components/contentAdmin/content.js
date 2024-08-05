document.addEventListener('DOMContentLoaded', async () => {
    const result = await fetch('components/contentAdmin/content.html');
    const content = await result.text();
    document.querySelector('#content').outerHTML = content;
});  