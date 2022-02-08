import React, { Component, useState } from 'react';
import {render} from 'react-dom';


function Regles(){
    return(
        <div className='fond-1'>

        </div>
    )
}

class regles extends HTMLElement {
    connectedCallback(){
        render(<Regles/>,this)
    }
}

export default Regles;

customElements.define('page-rules' , regles)