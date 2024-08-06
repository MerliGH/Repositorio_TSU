console.log('lista');
document.addEventListener('DOMContentLoaded', async () => {
    document.querySelector("#minas-list").addEventListener('DOMContentLoaded', async () => {
        console.log('lista loaded');
        document.querySelector("#minas-list").innerHTML = 'something';
    });
});