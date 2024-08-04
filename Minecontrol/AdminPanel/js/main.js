/* IMPORTING */
import { settings } from './settings.js'
import { loadComponent } from './providers/components.js'

/* FOR SIDE MENU */
var sideMenuVisible = true;
// Getters and setters
export function getSideMenuVisible(){ return sideMenuVisible }
//this changes its visibility > if its true then it becomes false, if its false it becomes true
export function toggleSideMenuVisible(){ sideMenuVisible = !sideMenuVisible }

window.addEventListener('load', load)

/* LOADING COMPONENTS */
function load(){
    console.log('Loading Main...')
    // loadComponent({
    //     parent: 'header',
    //     url: 'components/header'
    // })
    settings.load.components.forEach(c => {
        loadComponent(c)
    });
}

