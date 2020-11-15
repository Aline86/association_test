
class Calendar
      {
          constructor(domTarget, variable) 
      {
          // On récupère l'élément DOM passé en paramètre
          domTarget = domTarget || '.calendar';
          this.domElement = document.querySelector(domTarget);
          // Renvoit une erreur si l'élément n'éxiste pas
          if(!this.domElement) throw "Calendar - L'élément spécifié est introuvable";
          // Liste des mois
          this.monthList = new Array('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'aôut', 'septembre', 'octobre', 'novembre', 'décembre');
          // Liste des jours de la semaine
          this.dayList = new Array('dimanche', 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi');
          // Date actuelle
          this.today = new Date();
          this.today.setHours(0,0,0,0);
          // Mois actuel
          this.currentMonth = new Date(this.today.getFullYear(), this.today.getMonth(), 1);
          // On créé le div qui contiendra l'entête de notre calendrier
          let header = document.createElement('div');
          header.classList.add('header');
       
          this.domElement.appendChild(header);
          // On créé le div qui contiendra les jours de notre calendrier
          this.content = document.createElement('div');
          this.domElement.appendChild(this.content);
          // Bouton "précédent"
          let previousButton = document.createElement('button');
      
          previousButton.setAttribute('data-action', '-1');
          previousButton.textContent = '\u003c';
          header.appendChild(previousButton);
          // Div qui contiendra le mois/année affiché
          this.monthDiv = document.createElement('div');
          this.monthDiv.classList.add('month');
          header.appendChild(this.monthDiv);
          // Bouton "suivant"
          let nextButton = document.createElement('button');
  
          nextButton.setAttribute('data-action', '1');
          nextButton.textContent = '\u003e';
          header.appendChild(nextButton);
          // Action des boutons "précédent" et "suivant"
          this.domElement.querySelectorAll('button').forEach(element =>
          {
              element.addEventListener('click', () =>
              {     
                  // On multiplie par 1 les valeurs pour forcer leur convertion en "int"
                  this.currentMonth.setMonth(this.currentMonth.getMonth() * 1 + element.getAttribute('data-action') * 1);          
                  this.loadMonth(this.currentMonth);
              });
          });
          // On charge le mois actuel
          this.loadMonth(this.currentMonth);
          }
         loadMonth(date, variable, longueur)
                {
                    console.log(date)
          // On vide notre calendrier  
          this.content.textContent = '';
          // On ajoute le mois/année affiché
          this.monthDiv.textContent = this.monthList[date.getMonth()].toUpperCase() + ' ' + date.getFullYear();
          // Création des cellules contenant le jour de la semaine
          for(let i=0; i<this.dayList.length; i++)
          {       
              let cell = document.createElement('span');
              cell.classList.add('cell');
              cell.classList.add('day');
              cell.textContent = this.dayList[i].substring(0, 3).toUpperCase();
              this.content.appendChild(cell);
          }
          // Création des cellules vides si nécessaire
          for(let i=0; i<date.getDay(); i++)
          {
              let cell = document.createElement('span');
              cell.classList.add('cell');
              cell.classList.add('empty');
              this.content.appendChild(cell);
          }
          // Nombre de jour dans le mois affiché
          let monthLength = new Date(date.getFullYear(), date.getMonth()+1, 0).getDate();
          // Création des cellules contenant les jours du mois affiché
          for(let i=1; i<=monthLength; i++)
          {
              let cell = document.createElement('span');
              
              cell.classList.add('cell');
              cell.textContent = i;
              this.content.appendChild(cell);
              // Timestamp de la cellule
              let timestamp = new Date(date.getFullYear(), date.getMonth(), i).getTime();      
              // Ajoute une classe spéciale pour aujourd'hui
              if(timestamp === this.today.getTime())
              {
                  cell.classList.add('today');
              }
          }
          
          //COLORATION DES DATES DU CALENDRIER ET CHANGEMENT DE ELEM.INNERHTML
          //Je récupère les dates stockées dans l'input type="hidden" id="variable"  du php de professeur
              variable=document.getElementById('variable').value 

              // Je les mets dans un tableau nommé longueur
              longueur=variable.split(' ')
              var date=[]

                // Je crée une nouvelle variable pour stocker la date survolée après que l'ajax renvoie un résultat vide
              var les_dates=longueur

                // Je boucle sur les dates stockées dan le tableau longueur
              for(let i=0; i<longueur.length; i++){
                date[i]= new Date(longueur[i])
              
                console.log(les_dates)
                // Je déclare une fonction colorize stockée dans une variable pour que la variable puisse récupérer les valeurs de longueur dans la boucle soit les date[i]
                
                var colorize=(currentMonth)=>{
                    //Je boucle sur toutes les cellules du tableau
                    
                    document.querySelectorAll(".cell").forEach(elem =>{
                        for(i=0; i<date.length; i++){ 
                        
                            //Je vérifie si les valeurs des cellules du tableau sont égales aus date[i]
                            if(currentMonth.getMonth()==date[i].getMonth() && elem.innerHTML==date[i].getDate()){
                               
                                //si elles sont bien égales je les colore en jaune
                                elem.style.backgroundColor='yellow';
                                var month=date[i].getMonth()+1
                                
                                //Je souhaite stocker les date[i] avant l'évènement pour pouvoir les récupérer dans l'évènement une fois qu'elem.innerHTML sera vide
                             
                                var tooltip= null
                               
                                //Apparemment les valeurs qui passent par date_du_jour sont filtrées par elem.addEventListener, c'est pourquoi la date du jour sélectionnée correspond bien à la date du jour survolée
                                    elem.addEventListener('mouseenter', function(e){
                                        e.preventDefault();
                                                    var date = new Date()
                                                    if(month==date.getMonth()+1){
                                                    console.log(date)
                                                    var date=date.getFullYear()+'-'+0+parseInt(date.getMonth()+1)+'-'+elem.innerHTML
                                                    console.log(date)
                                                    var xhttp = new XMLHttpRequest();
                                                    xhttp.open("GET", "models/ajax.php?cours="+date, true);
                                                    xhttp.onreadystatechange = function () {
                                                        if (this.readyState == 4 && this.status == 200) {
                                                            var myArr = JSON.parse(this.responseText);
                                                            console.log(myArr)
                                                          
                                                            var date = new Date()
                                                            tooltip=document.createElement('div')
                                                            
                                                            tooltip.innerHTML=' Le '+elem.innerHTML+'/'+month+'/'+date.getFullYear()+' : <br />'
                                                            for(var i in myArr) {
                                                               tooltip.innerHTML+='Cours à '+myArr[i].horaire+'<br />'
                                                               tooltip.classList.add('tool')
                                                               var width = tooltip.offsetWidth
                                                               var height = tooltip.offsetHeight
                                                               var left = elem.offsetWidth /2 + elem.getBoundingClientRect().left +60
                                                               var top =  elem.getBoundingClientRect().top - height +16
                                                               tooltip.style.left = left + "px"
                                                               tooltip.style.top = top + "px"
                                                            } 
                                                            document.body.appendChild(tooltip)
                                                           
                                                        }
                                                       
                                                    }
                                                    xhttp.send();
                                                }   
                                                elem.addEventListener('mouseout', function(){
                                                                
                                                    document.querySelectorAll(".tool").forEach(eleme =>{
                                                    console.log(eleme)
                                                                document.body.removeChild(eleme)
                                                        
                                                        
                                                    })
                                                   
                                                })   
                                           
                                        }   
                                                                          
                                )}
                            }
                        })
                    }
                } 
        colorize(this.currentMonth)
            }
        }
      const calendar = new Calendar('#calendar'); 
      /*const calendar2 = new Calendar('#calendar2'); */

      