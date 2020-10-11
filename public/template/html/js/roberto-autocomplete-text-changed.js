var pronto_per_invio = 0;
$(document).ready(function()
{
   /*cerco di intercettare il submit del form della home*/
   $('#form_home_1_top_search').on('submit', function(e)
   {
      intercetta_submit(e, '#form_home_1_top_search');
   });   
   
   /*funzione identica per intercettare il submit del form della ricerca*/
   $('#form_ricerca').on('submit', function(e)
   {
      intercetta_submit(e, '#form_ricerca'); 
   });   
}
);

function intercetta_submit(e, id_form_da_intercettare)
{
   /*ricevo in ingresso un evento e l'id del form che sto intercettando*/
   console.log("sono dentro l'intercettazione del submit, pronto_per_invio = " + pronto_per_invio);
   if(!pronto_per_invio && ($('#autocomplete').val()!='' || $('#autocomplete_hidden').val()!='46.0619+13.2378'))
   {
      /*blocco il comportamento di default*/
      e.preventDefault();
      
      console.log('ho bloccato il submit');
      var risultato_autocomplete = 0;
      console.log('risultato_autocomplete pre chiamata a autocomplete_text_changed() = ' + risultato_autocomplete);
      risultato_autocomplete = autocomplete_text_changed();
      console.log('risultato_autocomplete post chiamata a autocomplete_text_changed() = ' + risultato_autocomplete);
      
      if(risultato_autocomplete)
      {
         console.log("ho eseguito autocomplete_text_changed(), pronto_per_invio = " + pronto_per_invio);
         pronto_per_invio=1;
         //$(id_form_da_intercettare).submit;     
      }  
   }
}


function autocomplete_text_changed()
   {
      //rimetto pronto per invio = 0
      pronto_per_invio = 0;
      var displaySuggestions = function(predictions, status) 
      {
         console.log("sono dentro autocomplete_text_changed()");
         if (status != google.maps.places.PlacesServiceStatus.OK) 
         {
               alert("Non ci sono risultati per l'indirizzo richiesto");
               console.log("sono nell'if status != google.maps.places.PlacesServiceStatus.OK");
               return 0;
         }
         console.log("sono dentro autocomplete_text_changed() e ho superato il primo if");
         var i=0;
         predictions.forEach(function(prediction) 
         {
            if(i==0)
            {

               document.getElementById('autocomplete').value = prediction.description;
               var circle = new google.maps.Circle({center: new google.maps.LatLng(46.0619, 13.2378), radius: 80000})
               var geocoder = new google.maps.Geocoder();
               
               console.log("ho creato la variabile geocoder");
               geocoder.geocode({'address': prediction.description, bounds: circle.getBounds()}, function(results, status) 
               {
                if (status === 'OK') {
                  console.log("ora loggo " + results[0].geometry.location);
                  document.getElementById('autocomplete_hidden').value = results[0].geometry.location.lat() + ' ' + results[0].geometry.location.lng();
                  pronto_per_invio = 1;
                } 
                else 
                {
                  alert('Geocode was not successful for the following reason: ' + status);
                  return 0;
                }
               });

               // console.log("definisco circle");
               // var circle = new google.maps.Circle({center: new google.maps.LatLng(46.0619, 13.2378), radius: 80000 })

               // document.getElementById("input_di_sto_cazzo").value = prediction.description;
               // console.log("definisco autocomplete");
               // var autocomplete = new google.maps.places.Autocomplete(document.getElementById("input_di_sto_cazzo"), { types: [ 'geocode' ], bounds: circle.getBounds(), strictbounds: true });

               // console.log("definisco place");
               // var place = autocomplete.getPlace();
               // console.log(place.geometry.location.lat() + " " + place.geometry.location.lng());

               // var li2 = document.createElement('li2');
               // li2.appendChild(document.createTextNode(place.geometry.location.lat()));
               // document.getElementById('results').appendChild(li2);

            }
            i++;
         }
         );
      };

      var service = new google.maps.places.AutocompleteService();
      
      var circle = new google.maps.Circle({center: new google.maps.LatLng(46.0619, 13.2378), radius: 80000 })
      
      service.getQueryPredictions({ input: document.getElementById('autocomplete').value, bounds: circle.getBounds(), strictBounds: true}, displaySuggestions);
      //pronto_per_invio = 1;   
      console.log("sono dentro autocomplete_text_changed() e sto per restituire 1");
      return 1;
   }