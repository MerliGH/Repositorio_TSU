document.addEventListener('DOMContentLoaded', function() {
    function getQueryParam(param) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(param);
    }

    const userId = getQueryParam('id');
    console.log('User ID from URL:', userId); // Mensaje de depuración

    if (userId) {
        localStorage.setItem('userId', userId);
    } else {
        console.log('No user ID found in URL');
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const userId = localStorage.getItem('userId');
    console.log('Stored User ID:', userId); // Mensaje de depuración

    if (userId) {
        const monthlyPlanBtn = document.getElementById('monthly-plan-btn');
        if (monthlyPlanBtn) {
            monthlyPlanBtn.onclick = function() {
                localStorage.setItem('userId', userId); 
                window.location.href = 'index2.html?id=' + encodeURIComponent(userId);
            };
        } else {
            console.log('Botón con ID "monthly-plan-btn" no encontrado.');
        }
    } else {
        console.log('No user ID found in localStorage');
    }
});
