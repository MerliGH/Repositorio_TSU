// js/app.js

document.addEventListener('DOMContentLoaded', () => {
    fetch('URL_DE_TU_API')
      .then(response => response.json())
      .then(data => {
        if (Array.isArray(data)) {
          // Aquí puedes manejar los datos, por ejemplo, mostrando la lista de usuarios
          console.log('Datos de la API:', data);
          // Actualiza el DOM o realiza otras acciones necesarias
        } else {
          throw new Error('La respuesta del servidor no es una lista de usuarios.');
        }
      })
      .catch(error => {
        console.error('Error:', error);
      });
  });
  