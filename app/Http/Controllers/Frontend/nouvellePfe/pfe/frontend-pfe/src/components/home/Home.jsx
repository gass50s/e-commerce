import React from "react"
import "./home.css"
import Hero from "../hero/Hero";
import Header from "../../components/header/Header"
import PourquoiHome from "./pourquoi/PourquoiHome";
import AboutCard from "./about/AboutCard";
import Testimonal from "./testimonal/Testimonal"
import Footer from "../common/footer/Footer"
import SimplifiezVotreTravail from "./about/SimplifiezVotreTravail";
const Home = () => {
   return (
    <>
      <Header />
      <Hero/>
      <PourquoiHome/>
      <AboutCard/>
      <Testimonal />
      <SimplifiezVotreTravail/>
      <Footer/>

    </>
  )
}

export default Home