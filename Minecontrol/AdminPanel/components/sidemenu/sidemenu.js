import { getUser } from "../../js/providers/users.js"
import { menu } from "./settings.js"

/*STUFF TO CHANGE LANGUAGE + GET AND SET */
var language = 'EN'
export function getLanguage(){
    return language
}

function setLanguage(lang){
    language = lang
    console.log(lang)
}
/* LANGUAGE GETS CHANGED ONCE EVENT GETS CALLED :^) */
function changeLanguage(){
    if(language === 'EN'){
        setLanguage('ES')
    }else{
        setLanguage('EN')
    }
    document.getElementById('label-language').textContent = language
    drawMenu(language, true)
}

export const init = () => {
    console.log('Initialazing sidemenu...') // just for visual purposes lol
    //CHANGING LANGUAGE ON CLICK
    document.getElementById('icon-language').addEventListener('click', () => {
        changeLanguage()
    })
    drawMenu('EN')// STARTS with EN
}



//draws each div from settings.js
function drawMenu(language, value ){
    console.log(menu);
    //linking a stylesheet
    if(value){
        var parent = document.getElementById('sidemenu')
        parent.innerHTML = '<link rel="stylesheet" href="components/sidemenu/sidemenu.css">'
    }
    menu.forEach(option => {
        drawMenuOption(language, option)
    })
}

function drawMenuOption(language, option) {
    // Parent
    var parent = document.getElementById('sidemenu');
    
    // Option div
    var divOption = document.createElement('div');
    divOption.className = 'sidemenu-option';
    parent.appendChild(divOption);
    
    // Icon div
    var divIcon = document.createElement('div');
    divIcon.className = 'sidemenu-icon';
    divIcon.style.background = 'var(--' + option.module + ')';
    divOption.appendChild(divIcon);

    // Icon
    var icon = document.createElement('i');
    icon.className = 'fas fa-' + option.icon;
    divIcon.appendChild(icon);

    // Text
    var divText = document.createElement('div');
    divText.className = 'sidemenu-text';
    divOption.appendChild(divText);

    // Label
    var labelText = document.createElement('label');
    labelText.id = 'label-sidemenu-' + option.module;
    labelText.textContent = language === 'EN' ? option.title[1] : option.title[0];
    divText.appendChild(labelText);

    // Arrow icon
    if (option.submenu) {
        var arrowIcon = document.createElement('i');
        arrowIcon.className = 'fas fa-chevron-down';
        divText.appendChild(arrowIcon);
    }

    // Submenu
    if (option.submenu) {
        // Create submenu container
        var submenuContainer = document.createElement('div');
        submenuContainer.className = 'submenu-container';
        parent.appendChild(submenuContainer);
        
        // Submenu options
        option.submenu.forEach(submenuOption => {
            var submenuOptionDiv = document.createElement('div');
            submenuOptionDiv.className = 'submenu-option';
            submenuContainer.appendChild(submenuOptionDiv);

            var submenuOptionLabel = document.createElement('label');
            submenuOptionLabel.textContent = language === 'EN' ? submenuOption.title[1] : submenuOption.title[0];
            submenuOptionDiv.appendChild(submenuOptionLabel);
        });

        // Event listener to toggle submenu visibility >>><<<
        divText.addEventListener('click', function() {
            submenuContainer.classList.toggle('submenu-visible');
            arrowIcon.classList.toggle('rotate-arrow');
        });
    }
}