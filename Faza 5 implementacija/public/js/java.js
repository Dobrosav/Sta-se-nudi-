//Dobrosav 
var count;
function result(){
  let rate=parseFloat(document.getElementById("rate").innerHTML)
  let cnt=parseFloat(count)
  let avg=(rate+cnt)/2
  document.getElementById("rate").innerHTML=avg
}
function starmark(item){
  count=item.id[0];
  sessionStorage.starRating = count;
  var subid= item.id.substring(1);
  for(var i=0;i<5;i++){
    if(i<count)
      document.getElementById((i+1)+subid).style.color="orange";
    else
      document.getElementById((i+1)+subid).style.color="black";  
    }
}
function deleteads(){
  document.getElementById("userAds").style.visibility="hidden";
}
function loading(){
  document.getElementById("inputads").style.visibility="hidden"; 
}
function change(){
  document.getElementById("inputads").style.visibility="visible";
  document.getElementById("ad1").value=document.getElementById("ad").innerHTML
}
function change2(){
  document.getElementById("ad").innerHTML=document.getElementById("ad1").value
  loading();
}
function odbaci(){
  loading()
}
function loading2(){
  document.getElementById("alert").style.visibility="hidden";
}
function login(){
  if((document.getElementById("username").value=="") || ((document.getElementById("pass").value=="")))
    document.getElementById("alert").style.visibility="visible";
  else
  window.open("../common/profile.html","_self")
}
function register(){
  if((document.getElementById("ime").value=="") || (document.getElementById("prezime").value=="") || (document.getElementById("username").value=="") || (document.getElementById("email").value=="") || ((document.getElementById("pass").value=="") || (document.getElementById("passr").value=="")))
    document.getElementById("alert").style.visibility="visible";
  else
  window.open("../common/profile.html","_self")
}
function reset(){
  if(document.getElementById("email").value=="")
    document.getElementById("alert").style.visibility="visible";
  else{
    document.getElementById("alert").style.visibility="visible";
    document.getElementById("alert").innerHTML="Link je poslat mail-om";
  }
  
}
function typing(){
  let pass=document.getElementById("pass").value
  let passr=document.getElementById("passr").value
  if (pass==passr){
    document.getElementById("button").disabled=false
    document.getElementById("alert").style.visibility="hidden"
  }
  else {
    document.getElementById("button").disabled=true
    document.getElementById("alert").style.visibility="visible"
  }
}