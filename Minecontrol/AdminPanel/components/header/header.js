import { getUser } from "../../js/providers/users.js"
import { getSideMenuVisible, toggleSideMenuVisible } from "../../js/main.js";


// //language stuff - - Discarted, keeping in case something messes up tho
// var language = 'EN'
// export function getLanguage(){
//     return language
// }

// function setLanguage(lang){
//     language = lang
//     console.log(lang)
// }

export const init = () => {
    console.log('Initialazing header...') // <<< THIS CLEARS SCREEN 
    loadUser();
    // EVENTS
    document.getElementById('i-header-menu').addEventListener('click', () => {
        toggleSideMenu()
    })
}
//load user data
function loadUser(){
    // console.log(response); 
    getUser().then( (response) => { 
        if(response.status === 0){
            showUser(response.user)
        }
    })
}

function showUser(user) {
    console.log(user);
    document.getElementById('img-user-photo')   .src         = user.photo; //muestra la imagen de user
    document.getElementById('label-user-name')  .textContent = user.name; //generar user name
    document.getElementById('label-user-role')  .textContent = user.role.name;
    document.getElementById('label-language')   .textContent = user.preferences.language.id;
    document.getElementById('icon-theme')       .textContent = user.preferences.theme;
}

function toggleSideMenu(){
    if(!getSideMenuVisible()){
        document.getElementById('sidemenu') .style.display = 'block'
        document.getElementById('home')     .style.width = 'calc(100% - 300px'
    } else {
        document.getElementById('sidemenu') .style.display = 'none'
        document.getElementById('home')     .style.width = '100%'
    }
    toggleSideMenuVisible()
}