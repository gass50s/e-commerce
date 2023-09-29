import React from "react"
import {BsFacebook} from 'react-icons/bs';
import {AiFillInstagram} from 'react-icons/ai';
import {AiFillTwitterCircle} from 'react-icons/ai';
import {AiFillYoutube} from 'react-icons/ai';

const Head = () => {
  return (
    <>
      <section className='head'>
        <div className='container flexSB'>
          <div className='logo'>
            <div>
            <h1> <span>MON</span> ÉCOLE</h1>
            <h3>LE SECRET<span> DE VOTER</span> REUSSITE</h3>
            </div>
           
          </div>

          <div className="header_socials">
             <a href='https://Linkedin.com'><BsFacebook/></a>
             <a href='https://githab.com'><AiFillInstagram/></a>
             <a href='https://dribbble.com'><AiFillTwitterCircle/></a>
             <a href='https://dribbble.com'><AiFillYoutube/></a>


       </div>
        </div>
      </section>
    </>
  )
}

export default Head