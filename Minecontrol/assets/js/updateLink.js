document.addEventListener('DOMContentLoaded', function() {
    const userId = localStorage.getItem('userId');
    
    if (userId) {
        const monthlyPlanBtn = document.getElementById('monthly-plan-btn');
        if (monthlyPlanBtn) {
            monthlyPlanBtn.onclick = function() {
                // Guarda el ID en localStorage (esto ya debería estar hecho en el registro)
                localStorage.setItem('userId', userId); 
                // Redirige con el ID en el parámetro de consulta
                window.location.href = 'index2.html?id=' + encodeURIComponent(userId);
            };
        } else {
            console.log('Botón con ID "monthly-plan-btn" no encontrado.');
        }
    } else {
        console.log('No user ID found in localStorage');
    }
});
