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
                window.location.href = 'index2.html?id=' + encodeURIComponent(userId); 
            };
        } else {
            console.log('Botón con ID "monthly-plan-btn" no encontrado.');
        }
    } else {
        console.log('No user ID found in localStorage');
    }
});


document.addEventListener('DOMContentLoaded', function() {
    const userId = localStorage.getItem('userId');
    console.log('Stored User ID:', userId); // Mensaje de depuración

    if (userId) {
        const monthlyPlanBtn = document.getElementById('semestral-plan-btn');
        if (monthlyPlanBtn) {
            monthlyPlanBtn.onclick = function() {
                window.location.href = 'index2.html?id=' + encodeURIComponent(userId);
            };
        } else {
            console.log('Botón con ID "semestral-plan-btn" no encontrado.');
        }
    } else {
        console.log('No user ID found in localStorage');
    }
});






document.addEventListener('DOMContentLoaded', function() {
    const userId = localStorage.getItem('userId');
    console.log('Stored User ID:', userId); // Mensaje de depuración

    if (userId) {
        const monthlyPlanBtn = document.getElementById('anual-plan-btn');
        if (monthlyPlanBtn) {
            monthlyPlanBtn.onclick = function() {
                window.location.href = 'index2.html?id=' + encodeURIComponent(userId);
            };
        } else {
            console.log('Botón con ID "anual-plan-btn" no encontrado.');
        }
    } else {
        console.log('No user ID found in localStorage');
    }
});










// URL base de la API
const apiUrl = 'http://127.0.0.1:8000/minas/';

// Obtener todas las minas
function getMinas() {
    fetch(apiUrl, {headers:{Accept:'application/json'}})
        .then(response => response.text())
        .then(data => {
            console.log(data);
            // Mostrar las minas en la sección de Minas
            const minasList = document.getElementById('minas-list');
            minasList.innerHTML = '<h4>Lista de Minas:</h4>';
            data.forEach(mina => {
                minasList.innerHTML += `<p>ID: ${mina.id}, Nombre: ${mina.nombre}</p>`;
            });
        })
        .catch(error => console.error('Error:', error)); 
}





$(document).ready(function() {
    $('#obtenerMinasBtn').click(function() {
        fetch('https://polliwog-desired-egret.ngrok-free.app/minas/')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                }
                return response.json();
            })
            .then(data => {
                const listaMinas = $('#minas-list');
                listaMinas.empty(); 

                if (Array.isArray(data)) {
                    data.forEach(mina => {
                        const listItem = $('<li>').text(`ID: ${mina.id}, Nombre: ${mina.nombre}`);
                        listaMinas.append(listItem);
                    });
                } else {
                    console.error('Data is not an array:', data);
                }
            })
            .catch(error => console.error('Error fetching data:', error));
    });
});







// Añadir una nueva mina
function addMina() {
    const name = document.getElementById('mina-name').value;
    fetch(apiUrl, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ name }),
    })
    .then(response => response.json())
    .then(data => {
        console.log('Mina añadida:', data);
        getMinas(); // Actualizar la lista de minas
    })
    .catch(error => console.error('Error:', error));
}

// Actualizar una mina existente
function updateMina() {
    const id = document.getElementById('update-mina-id').value;
    const name = document.getElementById('update-mina-name').value;
    fetch(`${apiUrl}/${id}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ name }),
    })
    .then(response => response.json())
    .then(data => {
        console.log('Mina actualizada:', data);
        getMinas(); // Actualizar la lista de minas
    })
    .catch(error => console.error('Error:', error));
}

// Eliminar una mina existente
function deleteMina() {
    const id = document.getElementById('delete-mina-id').value;
    fetch(`${apiUrl}/${id}`, {
        method: 'DELETE',
    })
    .then(response => response.json())
    .then(data => {
        console.log('Mina eliminada:', data);
        getMinas(); // Actualizar la lista de minas
    })
    .catch(error => console.error('Error:', error));
}

