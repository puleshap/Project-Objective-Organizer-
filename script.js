function changeView(){
    var signup = document.getElementById("signUpBox");
    var signin = document.getElementById("signInBox");

    signin.classList.toggle("d-none");
    signup.classList.toggle("d-none");

}
var int = 0;
function signup(){
    
    if(int==0){
        if(confirm("Please save your Security code with you as it will not be shown to you by our system.")){
            int = int +1;
        }
    }
    
  
        if(int ==1){   
    var f = document.getElementById("f");
    var l = document.getElementById("l");
    var u = document.getElementById("u");
    var p = document.getElementById("p");
    var s = document.getElementById("s");
    var b = document.getElementById("b");

    var form = new FormData;
    form.append("fn",f.value);
    form.append("ln",l.value);
    form.append("u",u.value);
    form.append("p",p.value);
    form.append("b",b.value);
    form.append("s",s.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function(){

        if (request.readyState == 4){
            var r =request.responseText;
            if (r == "success") {
                document.getElementById("msg").innerHTML = "Account sucessfully created!";
                document.getElementById("msg").className = "bi bi-check2-circle fs-5";
                document.getElementById("alertdiv").className ="alert alert-success";
                document.getElementById("msgdiv").className = "d-block";
               
                
            }else{
                document.getElementById("msg").innerHTML = r;
                document.getElementById("msgdiv").className = "d-block";
            }
        }
    }

request.open("POST","signupprocess.php",true);
request.send(form);
    }

}

function signIn(){
var u = document.getElementById("username");
var p= document.getElementById("password");
var rememberme= document.getElementById("rememberme");
    
var form = new FormData;

form.append("u",u.value);
form.append("p",p.value);
form.append("r",rememberme.checked);

    var request= new XMLHttpRequest();
    request.onreadystatechange = function(){
            if (request.readyState == 4){
                var rq = request.responseText;
               
                     if(rq =="success"){
                        window.location = "home.php";
                     }else{
                        alert(rq);
                     }
            }
}
request.open("POST","signInProcess.php",true);
request.send(form);

}

function signout() {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if (r.readyState == 4){
            var t = r.responseText;
            if(t == "success"){

                window.location.reload();
                
            }else{
                alert(t);
            }
        }
    };

    r.open("GET","signoutProcess.php",true);
    r.send();
}

function forgotPassword() {
var e=document.getElementById("forgotPasswordModal");
var bm=new bootstrap.Modal(e);
bm.show();
}
function resetpw(){
    var u=document.getElementById("un").value;
    var p=document.getElementById("np").value;
    var s=document.getElementById("sc").value;

    var request = new XMLHttpRequest();
    request.onreadystatechange = function(){
        if(request.readyState==4){
            var r= request.responseText;
            
            if(r =="1"){
                alert("password successfully updated!");
                window.location.reload();
            }else{
                alert(r);
            }
        }

    }
    request.open("GET","resetpassword.php?u="+u+"&pw="+p+"&sc="+s);
    request.send();

}

var o_id="";
function changestatus(send,s){
   
var modal = document.getElementById("modal");
var list = document.getElementById("es");
list.value  =send;
o_id=s;
bm = new bootstrap.Modal(modal);
bm.show();



}
function del(x){
if (confirm("Are you sure you want to delete this objective?")){
    var request= new XMLHttpRequest();
    request.onreadystatechange = function(){
            if (request.readyState == 4){
                var rq = request.responseText;
              
                     if(rq =="success"){
                        alert("Objective has been deleted successfully");
                       window.location.reload();
                     }else{
                        alert(rq);
                     }
            }
}
request.open("GET","delete.php?id="+x,true);
request.send();
}

}
var val="";
function m(r){

val= r ;

}
var xd="";
function x(r){

    xd= r ;
    var form = new FormData;
    form.append("xd",xd);



    var request= new XMLHttpRequest();
    request.onreadystatechange = function(){
            if (request.readyState == 4){
                var rq = request.responseText;
              
                     if(rq =="success"){
                        window.location = "home.php";
                     }else{
                        alert(rq);
                     }
            }
}
request.open("POST","updateobjective.php",true);
request.send(form);
    
    }

function changem(){
if(val==""){
    alert("Please Select a new Status");
}
    var form = new FormData;
    form.append("val",val);
    form.append("id",o_id);


    var request= new XMLHttpRequest();
    request.onreadystatechange = function(){
            if (request.readyState == 4){
                var rq = request.responseText;
              
                     if(rq =="success"){
                        window.location = "home.php";
                     }else{
                        alert(rq);
                     }
            }
}
request.open("POST","changestatus.php",true);
request.send(form);

}

function addobj(){
   var category= document.getElementById("category").value;
   var title = document.getElementById("title").value;
   var sd = document.getElementById("sd").value;
   var ed = document.getElementById("ed").value;
   var desc = document.getElementById("desc").value;

   var form = new FormData;
   form.append("cat",category);
   form.append("title",title);
   form.append("sd",sd);
   form.append("ed",ed);
   form.append("desc",desc);

   var request = new XMLHttpRequest();

   request.onreadystatechange = function(){
   if( request.readyState==4){
   var r= request.responseText;

   if(r == "success"){
    alert("New objective has been created!");
    window.location.reload();
   }else{   
    alert(r);
   }

   }
   }
   request.open("POST","addobjective.php",true);
   request.send(form);
}


function viewdescription(Descript){
    var des = Descript;
    var reciver = document.getElementById("desp");
   reciver.innerText = des;
  
    var desc = document.getElementById("desriptionmodal");
    bm = new bootstrap.Modal(desc);
    bm.show();
}
function editobjective(sd){
    var request = new XMLHttpRequest();
    request.onreadystatechange = function(){
        if(request.readyState==4){
           var r= request.responseText;
           alert(r);
        }
    }
    request.open("GET","updateobjective.php?e="+sd,true);
    request.send();
}

function updateobj(id){
    var priority = document.getElementById("category").value;
    var title = document.getElementById("title").value;
    var sd = document.getElementById("sd").value;
    var ed = document.getElementById("ed").value;
    var desc = document.getElementById("desc").value;
  

    var form = new FormData;
    form.append("id",id);
    form.append("p",priority);
    form.append("t",title);
    form.append("s",sd);
    form.append("e",ed);
    form.append("d",desc);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function(){
        if (request.readyState ==4 ){
          var r =  request.responseText;
          if(r=="success"){
            alert("objective has been updated");
            window.location.reload();
          }else{
            alert(r);}

        }
    }
    request.open("POST","updateobjectiveprocess.php",true);
    request.send(form);
}

function change(){

    var text = document.getElementById("password");
    var eye = document.getElementById("eye");

 if(text.type=="password"){
   
    text.type = "text";
    eye.className = "bi bi-eye-fill";

 }else{
    
    text.type = "password";
    eye.className = "bi-eye-slash-fill";
    }


    
}
function updateProfile(){

    var f= document.getElementById("fname");
    var l= document.getElementById("lname");
    var u= document.getElementById("username");
    if(confirm("Confirm the profile change")){

        var form = new FormData;
        form.append("f",f.value);
        form.append("l",l.value);
        form.append("u",u.value);
    
        var request = new XMLHttpRequest();
        request.onreadystatechange = function(){
            if(request.readyState==4){
                var r = request.responseText;
              
                if(r=="1"){
                    window.location.reload();
                }
            }
        }
    request.open("POST","updateProfileprocess.php",true);
    request.send(form);
    }

    
}
