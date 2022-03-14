
$(document).ready(function () {loadnow()})

 function loadApiData(){

    setInterval(async function(){
        var myHeaders = new Headers();
    myHeaders.append("Content-Type", "application/json");

    var requestOptions = {
    method: 'GET',
    headers: myHeaders,
    redirect: 'follow'
    };
    const response = await fetch("http://localhost/sundayApi/api/dashboard", requestOptions)
    const data = await response.json();
    display(data);

    },5000)
}

loadnow()
function loadnow(){

    setInterval(async function(){
    var settings = {
        "url": "https://kreatextreme.com/sundayApi/api/dashboard",
        "method": "GET",
        "headers": {
          "Content-Type": "application/json"
        },
      };
      
      $.ajax(settings).done(function (response) 
      {
        
        display(response);
      });

    },5000)

}

function display(data){

      $('#contribute').text(Number(data.data.contribution.amount));
      $('#members').text(Number(data.data.members.members));
      $('#families').text(Number(data.data.families.total));
      $('#groups').text(Number(data.data.groups.groups));
}