import React, { Component } from 'react';
import {render} from 'react-dom';

function MenuNavigation(){
    return <div className='navbar'>
        <ul>
            <li> <a href='/regles'> Règles </a></li>
            <li> <a href='/personnage'>Personnages</a> </li>
            <li> <a href="/fiche">Fiche</a> </li>
        </ul>
    </div>
}

class Navbar extends HTMLElement {
    connectedCallback(){
        render(<MenuNavigation/>,this)
    }
}

customElements.define('barre-navigation' , Navbar)