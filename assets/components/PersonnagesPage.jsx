import React, { Component } from 'react';
import {render} from 'react-dom';

function PersonnagesPage(){

    const data = [
        {class: "Barde", 
        "description": "Sed sed convallis dui, eu consectetur enim. Quisque tincidunt nunc nec faucibus mattis. Quisque semper nisl nec ipsum rutrum dictum. Etiam gravida, massa quis vehicula iaculis, enim risus maximus nisl, at interdum nibh arcu non ante. Curabitur ultricies leo et purus convallis pellentesque in ut erat.",
        "caractéristiques_1_title": "Barding",
        "caractéristiques_1_content": "Sed sed convallis dui, eu consectetur enim. Quisque tincidunt nunc nec faucibus mattis.",
        "caractéristiques_2_title": "Barding",
        "caractéristiques_2_content": "Sed sed convallis dui, eu consectetur enim. Quisque tincidunt nunc nec faucibus mattis.",
        "caractéristiques_3_title": "Barding",
        "caractéristiques_3_content": "Sed sed convallis dui, eu consectetur enim. Quisque tincidunt nunc nec faucibus mattis." }, 
        {class:"Nain", 
        "description": "Sed sed convallis dui, eu consectetur enim. Quisque tincidunt nunc nec faucibus mattis. Quisque semper nisl nec ipsum rutrum dictum. Etiam gravida, massa quis vehicula iaculis, enim risus maximus nisl, at interdum nibh arcu non ante. Curabitur ultricies leo et purus convallis pellentesque in ut erat.",
        "caractéristiques_1_title": "Barding",
        "caractéristiques_1_content": "Sed sed convallis dui, eu consectetur enim. Quisque tincidunt nunc nec faucibus mattis.",
        "caractéristiques_2_title": "Barding",
        "caractéristiques_2_content": "Sed sed convallis dui, eu consectetur enim. Quisque tincidunt nunc nec faucibus mattis.",
        "caractéristiques_3_title": "Barding",
        "caractéristiques_3_content": "Sed sed convallis dui, eu consectetur enim. Quisque tincidunt nunc nec faucibus mattis."}]

    return <div className='main-div-personnages'>
       <div className='background-personnages'></div>

       <div className='div-navigation-slide-left'></div>
       <span class="swipe-div">Swipe de classes</span>
       <div className='div-navigation-slide-right'></div>
       
       {data.map(person => <div key={person.class}>{`${person.class} ${person.description}`}</div>)}
    </div>
}

class Personnages extends HTMLElement {
    connectedCallback(){
        render(<PersonnagesPage/>,this)
    }
}

customElements.define('personnages-page' , Personnages)