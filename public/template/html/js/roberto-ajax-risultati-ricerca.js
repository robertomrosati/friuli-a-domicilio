   /*provo a fare con una richiesta ajax anche il popolamento della tabella dei gruppi, senza dover cioè ricaricare le viste la pagina*/
$(document).ready(function()
{ 
   console.log("sono in roberto-ajax-risultati-ricerca");
   $('#submit_filtri').click(function()
      {
         console.log("ho fatto il click di $('#submit_filtri')"); 
         var cosa_stai_cercando = $("#cosa_stai_cercando").val();
         var autocomplete = $("#autocomplete").val();
         var autocomplete_hidden = $("#autocomplete_hidden").val();
         var filtri_distanza = $("#filtri_distanza").val();
         var stringa_categorie = "";
         
         /*questa parte è copiata da roberto-checkmark-categorie.js*/
         for(var i = 0; i < 21; i++)
         {
            if(document.getElementById("checkmark_"+i)!=null)
            {
               if(document.getElementById("filtri_categoria_"+i).value == 1)
               {
                  stringa_categorie+="&filtri_categoria_"+i+"=1"
               }
               else
               {
                  stringa_categorie+="&filtri_categoria_"+i+"=0"
               }
            }
         }
         console.log("ho terminato il cliclo for per i filtri delle categorie");
         console.log("stringa_categorie = "+stringa_categorie)
         
         /*ora faccio lo stesso per asporto e domicilio*/
         
         var filtri_checkbox_domicilio = $("#filtri_checkbox_domicilio").val();
         var filtri_checkbox_asporto = $("#filtri_checkbox_asporto").val();
         
         console.log("ecco la stringa che passerò a ricerca/ricerca_ajax'");
         var stringa_per_data = "cosa_stai_cercando=" + encodeURIComponent(cosa_stai_cercando) + "&autocomplete=" + encodeURIComponent(autocomplete) + "&autocomplete_hidden=" + encodeURIComponent(autocomplete_hidden) + stringa_categorie + "&filtri_checkbox_domicilio=" + filtri_checkbox_domicilio + "&filtri_checkbox_asporto=" + filtri_checkbox_asporto + "&filtri_distanza=" + filtri_distanza;
         console.log(stringa_per_data); 
         
         /* soluzioni testate ma scartate
         console.log("window.location.origin = "+window.location.origin);
         console.log("window.location.host = "+window.location.host); 
         */
         var base_url = $('#baseurl_hidden').val();
         console.log("base_url = "+base_url);
         console.log("mi appresto a fare le chiamate ajax");
         /*chiamata al metodo che aggiorna l'header*/
         
         $.ajax
         ({
            type:'POST',
            url:base_url+'/ricerca/ricerca_ajax/header',
            data: stringa_per_data,
            success:function(html)
            {
               console.log("sono nel success di ricerca_ajax/header");
               $('#barra_in_alto_ricerca').html(html);
            },
            error:function(jqXHR, textStatus, errorThrown)
            {
               console.log("sono nell'error di ricerca_ajax/header");
               console.log(textStatus);
               console.log(errorThrown);
            }
         }); 
         
         /*chiamata al metodo che aggiorna i risultati*/
         $.ajax
         ({
            type:'POST',
            url:base_url+'/ricerca/ricerca_ajax/risultati',
            data: stringa_per_data,
            success:function(html)
            {
               console.log("sono nel success di ricerca_ajax/risultati");
               $('#results_list').html(html);
            },
            error:function(jqXHR, textStatus, errorThrown)
            {
               console.log("sono nell'error di ricerca_ajax/risultati.");
               console.log(textStatus);
               console.log(errorThrown);
            }
         }); 
         console.log("ho fatto le chiamate ajax");
      });
   });   
