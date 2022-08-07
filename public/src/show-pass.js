var state = false;
var states = false;

function toggle(){
    if(state){
        document.getElementById("showpass").setAttribute("type","password")
        document.getElementById("eye-show-pass").style.color='#333';
        state = false;
    }
    else{

        document.getElementById("showpass").setAttribute("type","text")
        document.getElementById("eye-show-pass").style.color='#5887ef';
        state = true;
        
    }
}


function toggles(){
    if(state){
        document.getElementById("showpwd").setAttribute("type","password")
        document.getElementById("eye-show-pwd").style.color='#333';
        state = false;
    }
    else{

        document.getElementById("showpwd").setAttribute("type","text")
        document.getElementById("eye-show-pwd").style.color='#5887ef';
        state = true;
        
    }
}

