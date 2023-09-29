import { useNavigate} from "react-router-dom";
import Heading from "../common/heading/Heading"
import "./Hero.css"
import TrendingFlatIcon from '@mui/icons-material/TrendingFlat';

const Hero = () => {

    const navigate = useNavigate();
    const login = ()=>{
     navigate('/connexion');
    }
    const registre = ()=>{
     navigate('/inscription');
    }
  return (
    <>
    
      <section className='hero'>
        <div className='container'>
          <div className='row'>
            <Heading subtitle='Qui sommes-nous plateforme d’apprentissage' title='' />
            <p>
                Notre module de vie scolaire propose une interface intuitive capable de gérer l’ensemble des
                processus de la vie scolaire, quels que soient le nombre des élèves, des enseignants et la pluralité
                des niveaux et des disciplines. Notre module de vie scolaire est un véritable outil de travail performant
                qui offre les outils et les fonctionnalités nécessaires pour une bonne gestion totale de vos démarches 
                quotidiennes.
            </p>
            
          </div>
          <div className='button'>
              <button onClick={()=>{login()}} className='primary-btn'>
                 Connexion  <TrendingFlatIcon/>
              </button>
              <button onClick={()=>{registre()}}>
              Inscription <TrendingFlatIcon/>
              </button>
            </div>
        </div>
      </section>
      <div className='margin'></div>
    </>
  )
}

export default Hero