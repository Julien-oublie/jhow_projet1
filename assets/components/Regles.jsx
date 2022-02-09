import React, { Component, useState } from 'react';
import {render} from 'react-dom';


function Regles(){
    return(
        <div className='regles-container'>
            <div className='fond-1'>

            </div>

            <div className='history-container'>
                <div className='container-header'>
                    <h2> l'histoire commence ici.... </h2>
                    <p>C’est ici que tout commence (récap de l’histoire et de l’environnement) </p>
                    <br />
                    <br />
                    <div className='history-resume'>
                        <p>  Lorem, ipsum dolor sit amet consectetur adipisicing elit. In optio qui vero mollitia aliquam quaerat accusamus tempore doloribus iusto reprehenderit iste saepe fugit amet laboriosam, repellat molestias. Labore maiores aperiam eos quasi eligendi exercitationem maxime, dignissimos ex enim consectetur nobis 
                            quia consequuntur debitis qui, alias dolorum tempore. Cum minus repudiandae mollitia aliquam magni ab magnam numquam minima veritatis inventore dignissimos sunt earum hic, eum doloremque. Exercitationem quo quaerat amet dicta. 
                            Illo, ea autem, iste soluta adipisci at tempore itaque optio tempora iure rem qui. Velit aliquam optio voluptate necessitatibus illum. 
                        </p>
                    </div>


                    <div className='history-place'>
                        <div className='left'>
                            <div className='img'>

                            </div>
                        </div>
                        <div className='right'>
                            <h2> Environnement Lieu </h2>
                            <br />
                            <br />
                            <br />
                            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste excepturi eius quos illum nisi nihil sequi illo dignissimos possimus? Nobis ex placeat minima est. Voluptatum esse voluptate eligendi maiores nesciunt.</p>
                        </div>
                    </div>
                </div>
            </div>
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