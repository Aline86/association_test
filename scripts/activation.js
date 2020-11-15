var visible1=()=>{
    var oeil2=visible2("pass2", "oeil2")
}
var visible=()=>{
    var oeil1=visible2("pass1", "oeil1")
    
}

var visible2=(password, oeil)=>{
    var password=document.getElementById(password)
    var oeil=document.getElementById(oeil)
    if(password.type==="password"){
        password.type="text"
        oeil.innerHTML="<i class='fas fa-eye-slash'></i>"
      return true
    }else{
        password.type="password"
        oeil.innerHTML='<i class="fas fa-eye"></i>'
        return true
}
}
var identique =(idInput1, idInput2, inputMessage, circle)=>{
    var input1=document.getElementById(idInput1).value
    var input2=document.getElementById(idInput2).value
    var message=document.getElementById(inputMessage)
    var circle=document.getElementById(circle)
    if(input1!=input2 || input1==""|| input2==""){
     
        message.innerHTML="non identiques"
        message.style.color="red"
        circle.style.color="red"
    
    }else{
        message.innerHTML="identiques"
        message.style.color="green"
        circle.style.color="green"
    }
}
var vide=(idInput, circleInput, messageInput)=>{
    var resultvide=document.getElementById(idInput).value
    var messagevide=document.getElementById(messageInput)
    var circle=document.getElementById(circleInput)
   
    if(resultvide==""){
        messagevide.innerHTML="Vous n'avez pas rempli le champ";
        messagevide.style.color="red"
        circle.style.color="red"
      
    }else{
        messagevide.innerHTML="email accepté";
        messagevide.style.color="green"
        circle.style.color="green"
     
    }
}


var pass=(passInput, longueur, circle)=>{
    var inputpass=document.getElementById(passInput).value
    var longueur=document.getElementById(longueur)
    var circle=document.getElementById(circle)
    if(inputpass.length<7 || inputpass.length >=16){
        longueur.innerHTML="La longueur n'est pas respectée (7 à 16 caractères)"
        longueur.style.color="red"
        circle.style.color="red"
    }else{
        longueur.innerHTML="Le mot de passe possède la longueur correcte";
        longueur.style.color="green"
        circle.style.color="green"
    }
}



var traitement =()=>{
    
       
    var error4=pass("pass1", "pass1result", "pass1circle")
    var error5=identique("pass1", "pass2", "pass2result", "pass2circle")
    var error6=vide("mail", "circlemail", "mailmessage")
    var error7=vide("mailconfirmation", "circlemailconfirmation", "mailmessageconfirmation")
    var error8=identique("mail", "mailconfirmation", "mailmessageconfirmation", "circlemailconfirmation")
    var error10=visible("pass1", "oeil1")
    var error11=visible("pass2", "oeil2")
    if( error4 || error5 || error6 || error7 ||error8 || error10 || error11){
        return false
    }else{
        return true
    }

}
