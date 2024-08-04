import { settings } from '../settings.js';

export async function getUser(){
    var url = settings.apiUrl + "data/users.json"; //gets apiUrl from settings.js 
    console.log(url);//prints the url
    return await fetch(url)
        .then ( (response) => response.text() ) 
        .then ( (data) => {return JSON.parse(data); })
}

/* NOTES *
- FUNCIONES ANONIMAS - 
response es el argumento, lo que recibe del fetch > la variable response y despues se 
trabaja con ella, esto se le manda al siguiente then.
*/