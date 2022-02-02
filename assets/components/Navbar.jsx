import React, { Component } from 'react';
import {render} from 'react-dom';

function MenuNavigation(){
    return <div className='navbar'>
        <ul>
            <li> Règles</li>
            <li> Personnages</li>
            <li> Fiche</li>
        </ul>
    </div>
}

class Navbar extends HTMLElement {
    connectedCallback(){
        render(<MenuNavigation/>,this)
    }
}

customElements.define('barre-navigation' , Navbar)