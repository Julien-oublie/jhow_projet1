import React, { Component } from 'react';
import {render} from 'react-dom';

function PersonnagesPage(){
    return <div className='main-div-personnages'>
       <div className='background-personnages'></div>
       <div className='div-navigation-slide-left'></div>
       <div className='div-navigation-slide-right'></div>
    </div>
}

class Personnages extends HTMLElement {
    connectedCallback(){
        render(<PersonnagesPage/>,this)
    }
}

customElements.define('personnages-page' , Personnages)