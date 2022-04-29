import React, { useRef, useState } from 'react';
import {render} from 'react-dom';
import { useEffect } from 'react/cjs/react.development';

function MenuNavigation(props){
    const [component, setComponent] = useState(null)
    const rulesRef = useRef()
    const charactersRef = useRef()

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

        ref.current.classList.add('link-active')
    }

    let url_profil = `http://127.0.0.1:8000/user/${isConnected}`
    let url_amis = `http://127.0.0.1:8000/user/amis/show/${isConnected}`


    return( 
    <div className='navbar-essai'>
        <div className='logo-navbar'>
        </div>

        <div className='items-navbar'>
          <ul>
            <li  onClick={() => changeEtat(rulesRef)} ref={rulesRef}>  <a href="http://127.0.0.1:8000">Règles</a> </li>
            <li  onClick={() => changeEtat(charactersRef)} ref={charactersRef}> <a href="http://127.0.0.1:8000/personnages">Personnages</a> </li>
            {isConnected  && <li><a href="http://127.0.0.1:8000/partie/new"> Créer une partie  </a></li> }
          
            
           
           
           
        </ul>  
        </div>
           
        {isConnected  && 
        <div className='user'>
            <a href={url_amis}>Mes amis </a>
            <a href={url_profil}> Mon profil </a>
            <a href="http://127.0.0.1:8000/logout"> Logout </a>
        </div>}
        {!isConnected  && 
        <div className='user'>
            
            <a href="http://127.0.0.1:8000/login"> Se connecter </a>
            <a href="http://127.0.0.1:8000/register"> S'inscrire  </a>
        </div>}    
        
    </div>)
}

class Navbar extends HTMLElement {
    connectedCallback(){
        render(<MenuNavigation/>,this)
    }
}

customElements.define('barre-navigation' , Navbar)