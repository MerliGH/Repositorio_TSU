export async function loadComponent(options){
    var urlParts = options.component.split('/') 
    var fileName = urlParts[urlParts.length - 1]
    var now = new Date()
    var componentUrl = window.location.href + options.component + '/' + fileName
    var requestUrl = componentUrl + '.html' + '?a=' + now.getTime()
    var moduleUrl = componentUrl + '.js'
    console.log('Loading Component ' + requestUrl)
    return await fetch(requestUrl, {
        headers: {
            'pragma': 'no-cache',
            'Cache-Control': 'no-cache',
            'cache': 'no-store'
        }
    })
    .then((response) => response.text())
    .then((html) => {
        document.getElementById(options.parent).innerHTML = html
    })
    .then(() => { importModule(moduleUrl) })
}

async function importModule(moduleUrl){
    console.log('Importing Module ' + moduleUrl)
    let {init} = await import (moduleUrl)
    init()
}

/* NOTES *
    Async, normalmente tenemos dos funciones, una que consume el api, u otra funciones
    que lo que hace es desplegar datos de alguna manera, normalemnte si tengo una despues de 
    otra pero en js se invocan al mismo tiempo. No puedo desplegar algo que no tengo aun,

    CODEBACK HELL, cuando tengo funcion A, ahi le digo que invoque la funcion B. Una cosa 
    que se hacees utilizar la clausula AWAIT > esperar hasta que termine, cuando vamos a 
    cargar los datos, nos esperamos y cuando esten listos, invocamos la siguiente funcion, 
    por eso fetch tiene un THEN, then se encarga de cargar lo que le sigue. Cuando manejemos 
    fetch manejaremos asyncronas las funciones.

    ---------------------------
    El metodo recibira dos cosas, si tengo un metodo que recibe dos metodos, un string y un 
    entero, entonces utilizamos sobrecarga de operadores, en JS podemos recibir diferentes 
    argumentos y validar que si lo obtuvimos, en vez de utilizar muchas comas para los argumentos
    hacemos un objeto de JSON y desde ahi lo manejamos > en esta casi OPTIONS es un JSON object
    donde traemos un JSON URL 

    options:{
        url: 'component/header';
        puente: 'header';

    }

    utilizamos SPLIT, split separa un arrglo de acuerdo con un caracter, cada parte de ese
    string quiero que se separe en base a comas en base a elementos, aqui tomaremos el 
    url, generamos un split y divide la seccion en dos >  split('/') > 

    SPLIT: tengo un string, qiuero separarlos de acuerdo con un caracter, en este caso tengo 
    un url separado con diagonales,, quiero el ultimo elemento segun el numero de componentes, 
    el split, . . .  TODO LO QUE TENGA QUE VER CON IMPORTAR COSAS, CALIDAR IPs, puedes separar 
    por puntos y lo divide en un array? something like that. Importar un archivo de texto con 
    comas se puede separar con split(','); 

    window.location.href > obtiene el root <

    filename;

    * * AWAIT DESCRIPTION * *
 https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Operators/await
await is usually used to unwrap promises by passing a Promise as the expression. Using await
pauses the execution of its surrounding async function until the promise is settled (that is, 
fulfilled or rejected). When execution resumes, the value of the await expression becomes that 
of the fulfilled promise.


INVESTIGATE MORE ABOUT --SPA--
*/
