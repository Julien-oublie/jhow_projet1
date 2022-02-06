import React, { Component, useState } from 'react';
import {render} from 'react-dom';
import { useEffect } from 'react/cjs/react.development';

function MenuNavigation(){


    const [etat , setEtat] = useState('link-active')



    


    const changeEtat  = (e) =>{
        const element = e.target
        
        if(element.className == etat){
            element.classList.remove(etat)
        }else{
            
            element.classList.add(etat)
            const link = document.getElementsByClassName(etat)
            const link0 = document.getElementsByClassName(etat)[0]
            const link1 = document.getElementsByClassName(etat)[1]
            console.log(link)
            console.log(link0)
            console.log(link1)
            
            if(link1 != undefined){
                link1.classList.remove(etat)


            }    
            
        }
        
        
    }
    
    return <div className='navbar'>
        <ul>
            <li onClick={changeEtat }>  Règles </li>
            <li  onClick={changeEtat}> Personnages </li>
            <li onClick={changeEtat}>   Fiche </li>
        </ul>
    </div>
}

class Navbar extends HTMLElement {
    connectedCallback(){
        render(<MenuNavigation/>,this)
    }
}

customElements.define('barre-navigation' , Navbar)