document.addEventListener('DOMContentLoaded', async () => {
    const result = await fetch('components/navbarAdmin/navbar.html');
    const navbar = await result.text();
    document.querySelector('#navbar').outerHTML = navbar;
});