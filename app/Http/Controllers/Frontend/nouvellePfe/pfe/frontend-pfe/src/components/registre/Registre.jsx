import {useState , useEffect} from "react"
import './registre.css';
import 'bootstrap/dist/css/bootstrap.min.css';
import { Await, useNavigate } from "react-router-dom";
import axios from "axios"
import swal from 'sweetalert';

const Registre = () => {


  const navigate = useNavigate();
  const[name, setName] =useState("");
  const[lastname, setLastName] =useState("");
  const[email, setEmail] =useState("");
  const[phone, setPhone] =useState("");
  const[password, setPassword] =useState("");
  const[role, setRole] =useState("");
  const[identifiant_eleve, setIdentifiant_eleve] =useState("");
  const[identifiant_enseignant, setIdentifiant_enseignant] =useState("");
  const[identifiant_parent, setIdentifiant_parent] =useState("");
  const[naissance, setNaissance] =useState("");
  
 

  const handleRegister = async (e) =>{
    e.preventDefault();

    try{
      axios.get('/sanctum/csrf-cookie').then(response => {
         axios.post(`/api/register`, { name,lastname,email,phone,password,role,identifiant_eleve,identifiant_parent,identifiant_enseignant,naissance }).then(res => {
            if(res.data.status === 200){
                    localStorage.setItem('auth_token',res.data.token);
                    localStorage.setItem('auth_name',res.data.username);
                    setName("");
                    setLastName("");
                    setEmail("");
                    setPhone("");
                    setPassword("");
                    setRole("");
                    swal("Success",res.data.message,"success");
                    navigate('/connexion');

                  }
               });  
          
          });

    } catch(e){
                   console.log(e)
                  }



  }
  return (
   <div className="dby">
     <div className=" wrapper">
      <h1>Sign Up</h1>
      <form  onSubmit={handleRegister}>
        <input 
           type="text" 
           placeholder="name"
           value={name}
           onChange={(e)=>setName(e.target.value)}
           />
           
        <input 
           type="text" 
           placeholder="lastName"
           value={lastname}
           onChange={(e)=>setLastName(e.target.value)}
           />


        <input 
           type="email" 
           placeholder="Email"
           value={email}
           onChange={(e)=>setEmail(e.target.value)}
           />
        
        <input 
           type="phone" 
           placeholder="Phone"
           value={phone}
           onChange={(e)=>setPhone(e.target.value)}
           />
        <input 
           type="password" 
           placeholder="Password"
           value={password}
           onChange={(e)=>setPassword(e.target.value)}
           />

          <div className="input-group mb-3">
            <label className="input-group-text" >Role</label>
            <select  value={role} onChange={(e)=>setRole(e.target.value)} className="formSelect" >
              <option  >Choose...</option>
              <option value="Eleves">Eleves</option>
              <option value="Parent">Parent</option>
            </select>
          </div>
          { role ==="Eleves" && (
            <>
             <input 
             type="text" 
             placeholder="Identifiant Eleve"
             value={identifiant_eleve}
             onChange={(e)=>setIdentifiant_eleve(e.target.value)}
             />
             <input 
             type="date" 
             placeholder="Date de Naissance"
             value={naissance}
             onChange={(e)=>setNaissance(e.target.value)}
             />
            </>
            
            )

            }
              { role ==="Parent" && (
            <>
             <input 
             type="text" 
             placeholder="identifiant de voter eleve"
             value={identifiant_parent}
             onChange={(e)=>setIdentifiant_parent(e.target.value)}
             />
            </>
            
            )

            }

          <div className="terms">
                <input type="checkbox" id="checkbox"/>
                <label >I agree to these <a href="#">Terms & Conditions</a></label>
          </div>

          <button type="Submit">Sign Up</button>

      </form>
    
      <div className="member">
         Already a member ? <a href="/connexion">Logni Here</a>
      </div>

     </div>
     
  </div>
  )
}

export default Registre