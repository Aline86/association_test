
document.getElementById("refresh").addEventListener('click', function(e){
 
    
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "models/refresh.php", true);
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var message = this.responseText;
      console.log(message)
        location.reload()
    }
}

    
  
xhttp.send();



})

