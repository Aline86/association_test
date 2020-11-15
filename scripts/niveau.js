
document.querySelectorAll(".niveau1").forEach(elem =>{
        niveau1=elem.value
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "models/getniveau1.php?option1="+niveau1, true);
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var myArr = JSON.parse(this.responseText);
            for(i=0; i<myArr.length; i++){ 
            elem.innerHTML=myArr[i].libelle_niveau
            }
    }
      }  
    xhttp.send();
    })
     
   document.querySelectorAll(".niveau2").forEach(elem =>{
        niveau2=elem.value
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "models/getniveau2.php?option2="+niveau2, true);
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var myArr = JSON.parse(this.responseText);
            for(i=0; i<myArr.length; i++){ 
            elem.innerHTML=myArr[i].libelle_niveau
            }
    }
      }  
    xhttp.send();
    })
    document.querySelectorAll(".moins").forEach(elem =>{
      elem.addEventListener('click', function(e){
        e.preventDefault();
        moins=elem.value
        id=elem.nextElementSibling.value
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "models/cours_en_plus.php?moins="+moins+"&id="+id, true);
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            
    }
      }  
    xhttp.send();
    })
      })
     
      document.querySelectorAll(".plus").forEach(elem =>{
        elem.addEventListener('click', function(e){
          e.preventDefault();
          plus=elem.value
          id=elem.nextElementSibling.value
          var xhttp = new XMLHttpRequest();
          xhttp.open("GET", "models/cours_en_plus.php?plus="+plus+"&id="+id, true);
          xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              
      }
        }  
      xhttp.send();
      })
        })

      document.querySelectorAll(".reste").forEach(elem =>{
        
          function Update(){
          id=elem.nextElementSibling.value
          var xhttp = new XMLHttpRequest();
          xhttp.open("GET", "models/cours_restant.php?id="+id, true);
          xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            var myArr = JSON.parse(this.responseText);
            for(i=0; i<myArr.length; i++){ 
            elem.innerHTML=myArr[i].nb_cours
            }        
      }
    }  
    xhttp.send();
        }
        $('document').ready(function(){
          setInterval(Update,500);
          });
    })
       