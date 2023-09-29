import "./App.css"
import { BrowserRouter as Router,Routes, Route, RouterProvider, createBrowserRouter, createRoutesFromElements } from "react-router-dom"
import About from "./components/home/about/About"
import CourseHome from "./components/home/allcourses/CourseHome"
import Team from "./components/home/team/Team"
import Contact from "./components/home/contact/Contact"
import Home from "./components/home/Home"
import Login from "./components/login/Login"
import Registre from "./components/registre/Registre"

import EnseignantPrivateRoutes  from "../src/users/Enseignant/EnseignantPrivateRoutes"
import MasterLayout from "./users/Enseignant/MasterLayout/MasterLayout"
import Dashboard from "../src/users/Enseignant/componets/Dashboard"
import Profile from "../src/users/Enseignant/componets/Profile"
import PublicCours from "./users/Enseignant/componets/publicCours/Cours"
import PublicMatieres from "./users/Enseignant/componets/publicCours/PublicMatiéres/PublicMatiéres"
import PublicMatieresCategories from "./users/Enseignant/componets/publicCours/PublicMatiéres/Categories"
import AjouterPublicCours from "./users/Enseignant/componets/publicCours/AjouterPublicCours"
import MonCours from "./users/Enseignant/componets/monMatieres/ListeDeCours"
import MonMatieres from "./users/Enseignant/componets/monMatieres/Modules"
import AjouterMatiéres from "./users/Enseignant/componets/monMatieres/AjouteCoure"



import AdminPrivateRoutes from "./users/Admin/AdminPrivateRoutes"
import AdminMasterLayout from "./users/Admin/MasterLayout/MasterLayout"
import AdminDashboard from "./users/Admin/components/dashboard/Dashboard"
import AnneeScolaire from "./users/Admin/components/AnnéeScolaire/AnneeScolaire"
import AjouterAnneeScolaire from "./users/Admin/components/AnnéeScolaire/AjouterAnneeScolaire"
import Niveaux from "./users/Admin/components/niveaux/Niveaux"
import AjouterNiveaux from "./users/Admin/components/niveaux/AjouterNiveaux"
import Classe from "./users/Admin/components/Class/Classe"
import ClasseNiveaux from "./users/Admin/components/Class/ClasseNiveaux"
import AjouterClasse from "./users/Admin/components/Class/AjouterClasse"
import ListeEleve from "./users/Admin/components/Class/ListeEleves"
import Inscription from "./users/Admin/components/Inscription/Inscription"
import InscriptionEleve from "./users/Admin/components/Inscription/InscriptionEleves"
import InscriptionEnseignant from "./users/Admin/components/Inscription/InscriptionEnseignant"
import NouvelleInscriptionEleve from "./users/Admin/components/Inscription/NouvelleInscription"
import NouvelleInscriptionEnseignant from "./users/Admin/components/Inscription/NouvelleInscriptionEnseignant"
import Index from "./users/Admin/components/emploiDeTemps/index"
import EmploiEnseignant from "./users/Admin/components/emploiDeTemps/emploiDuTempsEnseignants/ListeDeEmplois"
import NouvelleEmploiEnseignant from "./users/Admin/components/emploiDeTemps/emploiDuTempsEnseignants/NouvelleEmploi"
import EmploiEleve from "./users/Admin/components/emploiDeTemps/emploiDuTempsEleves/ListeDeEmplois"
import NouvelleEmploiEleve from "./users/Admin/components/emploiDeTemps/emploiDuTempsEleves/NouvelleEmploi"





import AdminProfile from "./users/Admin/components/profil/Profile"
import AdminCalendrier from "./users/Admin/components/calendrier/Calendrier"
import AdminMessage from "./users/Admin/components/message/Message"
import AdminUserEleve from "./users/Admin/components/eleve/Eleve"
import AdminUserParent from "./users/Admin/components/parent/Parent"
import AdminUserEnseignant from "./users/Admin/components/enseignant/Enseignant"
import AjouterUtilisateur from "./users/Admin/components/AjouterUtilisateur/AjouterUtilisateur"
import ElevePrivateRoutes from "./users/Eleve/ElevePrivateRoutes"
import EleveMasterLayout from "./users/Eleve/MasterLayout/EleveMasterLayout"

import ParentPrivateRoutes from "./users/Parent/ParentPrivateRoutes"
import ParentMasterLayout from "./users/Parent/MasterLayout/ParentMasterLayout"
import axios from 'axios';

axios.defaults.baseURL = "http://localhost:8000/";
axios.defaults.headers.post['Content-Type'] = 'application/json';
axios.defaults.headers.post['Accept'] = 'application/json';

axios.defaults.withCredentials = true;

axios.interceptors.request.use(function (config){
  const token =   localStorage.getItem('auth_token');
  config.headers.Authorization = token ? `Bearer ${token}` : '';
  return config;
});

const router = createBrowserRouter(
    createRoutesFromElements(
        <>
          <Route path="/" element={<Home />}/ >
          <Route exact path="/propos" element={<About />} />
          <Route exact path="/cours" element={<CourseHome />} />
          <Route exact path="/equipe" element={<Team />} />
          <Route exact path="/contact" element={<Contact />} />
          <Route exact path="/connexion" element={<Login />} />
          <Route exact path="/inscription" element={<Registre />} />

          <Route element={<AdminPrivateRoutes/>}>
            <Route path="/admin" element={<AdminMasterLayout />}>
                <Route path="/admin/dashboard" element={<AdminDashboard />} />
                <Route path="/admin/annee_scolaire" element={<AnneeScolaire/>} />
                <Route path="/admin/ajouter_Annee_Scolaire" element={<AjouterAnneeScolaire/>} />
                <Route path="/admin/niveaux" element={<Niveaux/>} />
                <Route path="/admin/ajouter_niveaux" element={<AjouterNiveaux/>} />
                <Route path="/admin/classes" element={<Classe/>} />
                <Route path="/admin/ajouter_classe" element={<AjouterClasse/>} />
                <Route path="/admin/classes/:name/:id" element={<ClasseNiveaux />}/>
                <Route path="/admin/classes/:name/:id/eleves" element={<ListeEleve/>}/>
                <Route path="/admin/inscription" element={<Inscription/>} />
                <Route path="/admin/inscription_enseignant" element={<InscriptionEnseignant/>} />
                <Route path="/admin/inscription_eleves" element={<InscriptionEleve/>} />
                <Route path="/admin/nouvelle_inscription_enseignant" element={<NouvelleInscriptionEnseignant/>} />
                <Route path="/admin/nouvelle_inscription_eleve" element={<NouvelleInscriptionEleve/>} />
                <Route path="/admin/emploi_du_temps" element={<Index/>} />
                <Route path="/admin/emploi_du_temps_enseignant" element={<EmploiEnseignant/>} />
                <Route path="/admin/nouvelle_enseignant_emploi" element={<NouvelleEmploiEnseignant/>} />
                <Route path="/admin/emploi_du_temps_classe" element={<EmploiEleve/>} />
                <Route path="/admin/nouvelle_classe_emploi" element={<NouvelleEmploiEleve/>} />

  
                <Route path="/admin/profile" element={<AdminProfile/>} />
                <Route path="/admin/calendrier" element={<AdminCalendrier />} />
                <Route path="/admin/message" element={<AdminMessage />} />
                <Route path="/admin/Ajouter_utilisateur" element={<AjouterUtilisateur />} />
                <Route path="/admin/enseignant" element={<AdminUserEnseignant />} />
                <Route path="/admin/eleve" element={<AdminUserEleve />} />
                <Route path="/admin/parent" element={<AdminUserParent />} />
              

            </Route>
           </Route>

           <Route element={<EnseignantPrivateRoutes/>}>
            <Route path="/enseignant" element={<MasterLayout />}>
                <Route path="/enseignant/dashboard" element={<Dashboard />} />
                <Route path="/enseignant/profile" element={<Profile />} />
                <Route path="/enseignant/Public_cours" element={<PublicCours />}/>
                <Route path="/enseignant/ajouter_public_cours" element={<AjouterPublicCours />}/>
                <Route path="/enseignant/public_matieres" element={<PublicMatieres />}/>
                <Route path="/enseignant/Matiére_categories" element={<PublicMatieresCategories />}/>

                
                <Route path="/enseignant/Matiéres" element={<MonCours />}/>
                <Route path="/enseignant/Matiére/:id/:name" element={<MonMatieres />}/>
                <Route path="/enseignant/ajouter_Matiéres" element={<AjouterMatiéres />}/>

                
            </Route>
           </Route>

           <Route element={<ElevePrivateRoutes/>}>
            <Route path="/eleve" element={<EleveMasterLayout />}/>
           </Route>

           <Route element={<ParentPrivateRoutes/>}>
                <Route path="/parent" element={<ParentMasterLayout />}/>
           </Route>
           </>
    )
)

function App() {
  return (
    <>
      
      <RouterProvider router ={router} />

    </>
  );
}

export default App;