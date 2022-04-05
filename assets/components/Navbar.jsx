import React, { useRef, useState } from 'react';
import {render} from 'react-dom';
import { useEffect } from 'react/cjs/react.development';

function MenuNavigation(){
    const [component, setComponent] = useState(null)
    const rulesRef = useRef()
    const charactersRef = useRef()
    const fichesRef = useRef()

    const addElement = () => {
        setComponent(
            <div>
                <h1>Test</h1>
            </div>
        )
    }

    useEffect(() => {
        if(component) {
            console.log('component not empty');
        } else {
            console.log('component empty');
        }
    }, [component])

    const removeElement = () => {
        setComponent(null)
    }

    const changeEtat  = (ref) =>{
        rulesRef.current.classList.remove('link-active')
        charactersRef.current.classList.remove('link-active')
        fichesRef.current.classList.remove('link-active')

        ref.current.classList.add('link-active')
    }
    
    return <div className='navbar'>
        <div className='logo'>

        </div>
        <div className='items-navbar'>
          <ul>
            <li onClick={() => changeEtat(rulesRef)} ref={rulesRef}>  <a href="http://localhost:8000/regles">Règles</a> </li>
            <li  onClick={() => changeEtat(charactersRef)} ref={charactersRef}> <a href="http://localhost:8000/personnages">Personnages</a> </li>
            <li onClick={() => changeEtat(fichesRef)} ref={fichesRef}>   Fiche </li>
        </ul>  
        </div>
        
        <div className='user'>
            <a href="http://localhost:8000/register"> connexion </a>
            <img src="{{ asset('build/img/circle.png') }}" />
        </div>      
    </div>
}

class Navbar extends HTMLElement {
    connectedCallback(){
        render(<MenuNavigation/>,this)
    }
}

customElements.define('barre-navigation' , Navbar)