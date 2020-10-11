
   document.getElementById("checkmark_domicilio").onclick = function() 
   {
      /*se è a 0 lo porto a 1*/
      if(document.getElementById("filtri_checkbox_domicilio").value == 0)
      {
         console.log("sto cambiando in valore di filtri_checkbox_domicilio da 0 a 1");
         document.getElementById("filtri_checkbox_domicilio").value = 1;               
      }
      /*se è già a 1 lo porto a 0*/
      else
      {
         console.log("sto cambiando un valore di filtri_checkbox_domicilio da 1 a 0");
         document.getElementById("filtri_checkbox_domicilio").value = 0;
      }
   }
   
   document.getElementById("checkmark_asporto").onclick = function() 
   {
      /*se è a 0 lo porto a 1*/
      if(document.getElementById("filtri_checkbox_asporto").value == 0)
      {
         console.log("sto cambiando in valore di filtri_checkbox_asporto da 0 a 1");
         document.getElementById("filtri_checkbox_asporto").value = 1;               
      }
      /*se è già a 1 lo porto a 0*/
      else
      {
         console.log("sto cambiando un valore da filtri_checkbox_asporto da 1 a 0");
         document.getElementById("filtri_checkbox_asporto").value = 0;
      }
   }
