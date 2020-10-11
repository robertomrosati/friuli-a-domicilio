
//document.getElementById('autocomplete').addEventListener('keypress', autocomplete_text_changed());

function initMap() 
{
   var input = document.getElementById('autocomplete');
   //var autocomplete = new google.maps.places.Autocomplete(input);

   /* definisco un cerchio di 80 km di raggio intorno a Udine*/
   var circle = new google.maps.Circle({center: new google.maps.LatLng(46.0619, 13.2378), radius: 80000 });

   /* creo la variabile autocomplete che contegna il location bias definito in circle */
   var autocomplete = new google.maps.places.Autocomplete(input, { types: [ 'geocode' ], bounds: circle.getBounds(), strictBounds: true });

   /* nota: qui andiamo a definire una funzione dentro autocomplete.addListener, non mi piace molto questo modo di definire le funzioni "al volo" ma sembra che su javascript sia comune...*/
   
   // var selectFirstOnEnter = function(input) 
   // {  // store the original event binding function
       // console.log("sono dentro selectFirstOnEnter");
       // var _addEventListener = (input.addEventListener) ? input.addEventListener : input.attachEvent;
       // console.log("ho creato _addEventListener");
       // function addEventListenerWrapper(type, listener) {  // Simulate a 'down arrow' keypress on hitting 'return' when no pac suggestion is selected, and then trigger the original listener.
           // console.log("sono dentro addEventListenerWrapper");
           // if (type == "keydown") { 
               // console.log("sono dentro l'if di addEventListenerWrapper");
               // var orig_listener = listener;
               // listener = function(event) {
                   // console.log("sono dentro la funzione listener su evento di addEventListenerWrapper");
                   // var suggestion_selected = $("autocomplete").length > 0;
                   // if (event.which == 13 && !suggestion_selected) { 
                       // var simulated_downarrow = $.Event("keydown", {keyCode: 40, which: 40}); 
                       // orig_listener.apply(input, [simulated_downarrow]); 
                       // console.log("sono dentro questo specifico if di selectFirstOnEnter");
                   // }
                   // orig_listener.apply(input, [event]);
               // };
           // }
           // _addEventListener.apply(input, [type, listener]); // add the modified listener
       // }
       // if (input.addEventListener) { 
           // input.addEventListener = addEventListenerWrapper; 
       // } else if (input.attachEvent) { 
           // input.attachEvent = addEventListenerWrapper; 
       // }
   // }
   
   autocomplete.addListener('place_changed', Funzione_del_listener(autocomplete));  
}


function Funzione_del_listener(autocomplete)
{
      console.log("sono dentro funzione del listener");
      //item.keydown();
      var place = autocomplete.getPlace();
      //console.log('Ho fatto il primissimo var place = autocomplete.getPlace(); lat e long di ' + place.address_components[0].short_name + ' = ' + place.geometry.location);
      while(!place.geometry) 
      {
         //var service = new google.maps.places.AutocompleteService();
         autocomplete_text_changed();   
         console.log("sono fuori dalla funzione maledetta");
         //selectFirstOnEnter(input);
         
         //service.getQueryPredictions({input: document.getElementById('autocomplete').value, bounds: circle.getBounds()}, function(predictions, status)
          //{
          //  console.log("sono dentro la funzione maledetta");
            // if (status != google.maps.places.PlacesServiceStatus.OK) 
            // {
                // alert(status);
                // return;
            // }
            // var i=0;
            //// /*my_my_predictions.forEach(function(prediction) */
            // while(i<1)
            // {
               // if(i==0)
               // {
                  // document.getElementById('autocomplete').value = my_my_predictions[0].description;
                  // var geocoder = new google.maps.Geocoder();
                  // console.log("ho creato la variabile geocoder dentro autocomplete.addListener");
                  // geocoder.geocode({'address': my_my_predictions[0].description, bounds: circle.getBounds()}, function(results, status) 
                  // {
                  // if (status == 'OK') 
                  // {
                     // console.log("ora loggo " + results[0].geometry.location);
                     // document.getElementById('autocomplete_hidden').value = results[0].geometry.location.lat() + ' ' + results[0].geometry.location.lng();
                  // } 
                  // else 
                  // {
                     // alert('Geocode was not successful for the following reason: ' + status);
                  // }
                  // });
               // }
               // i++;
            // }
          //});
         /*FINE MY PREDICTION*/
         console.log("ho superato la funzione maledetta");
         Funzione_del_listener(autocomplete);
         //var place = autocomplete.getPlace();
         
         //console.log('lat e long di ' + place.address_components[0].short_name + ' = ' + place.geometry.location);
         //document.getElementById('autocomplete_hidden').value = place.geometry.location.lat() + ' ' + place.geometry.location.lng();
         //window.alert("Autocomplete's returned place contains no geometry");
        
         //window.alert("Autocomplete's returned place contains no geometry");
         //return;
         //console.log("sto per chiamare autocomplete text changed() dentro if (!place.geometry)");
         
         //place = autocomplete.getPlace();
      }
      /* FINE if (!place.geometry) */
      
      var address = '';
      if (place.address_components)
      {
         console.log("sono dentro if(place.address_components)");
         /*definisco quello che vado a visualizzare prendendo i tre componenti dell'elemento 0 ritornato nell'array address_components della response */
         address = 
         [
           (place.address_components[0] && place.address_components[0].short_name || ''),
           (place.address_components[1] && place.address_components[1].short_name || ''),
           (place.address_components[2] && place.address_components[2].short_name || '')
         ].join(' ');
         /*capto le coordinate del posto che ho trovato e le stampo in console, poi capiamo come passarle al form */
         console.log('lat e long di ' + place.address_components[0].short_name + ' = ' + place.geometry.location);
         
         console.log('lat e long di ' + place.geometry.location.lat() + ' ' + place.geometry.location.lng());
         
         /*aggiorno il valore dell'autocomplete_hidden con le coordinate passate come stringa*/
         document.getElementById('autocomplete_hidden').value = place.geometry.location.lat() + ' ' + place.geometry.location.lng();  
      }    
   }