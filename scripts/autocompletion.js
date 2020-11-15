document.querySelectorAll(".student").forEach(elem =>{

document.getElementById("student_name").addEventListener('keyup', function(){
  
    student_name=document.getElementById("student_name").value
    console.log(student_name)
   
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "models/autocompletion.php?id="+student_name, true);
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var myArr = JSON.parse(this.responseText);

      for(i=0; i<myArr.length; i++){    
         
        if(myArr[i].nom_eleve.substring(0, document.getElementById("student_name").value.length)!=elem.innerHTML.substring(0, document.getElementById("student_name").value.length)){
          
          elem.parentNode.parentNode.style.display="none"

          } else{
            elem.parentNode.parentNode.style.display=""
          }        
      } 
    }
    
  }  
xhttp.send();
})
 
})


