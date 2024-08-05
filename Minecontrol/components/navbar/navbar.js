document.addEventListener('DOMContentLoaded', async () => {
    const result = await fetch('components/navbar/navbar.html');
    const navbar = await result.text();
    document.querySelector('#navbar').outerHTML = navbar;
});