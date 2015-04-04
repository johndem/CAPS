

function checkpass() {
    var elpass =  document.getElementById("password");
    var elconf = document.getElementById('con-pass');
    var span = document.getElementById('pass-span');
    var pass = elpass.value;
    var conf = elconf.value;
    console.log(pass + " " + conf);
    
    if (conf != pass) {
        elconf.style.border = "solid 2px red";
        span.innerHTML = "<img src='X.jpg'>";
        
    }
    else {
        elconf.style.border = "solid 2px green";
        span.innerHTML = "<img src='check.jpg'>";
    }
}