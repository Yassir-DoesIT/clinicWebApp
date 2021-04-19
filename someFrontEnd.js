/*
    function emptyQuartierDiv()
    {
        let divToEmpty = document.getElementById('quartierContainer');
        divToEmpty.style.display = 'none';
        divToEmpty.innerHTML = '';
    }
*/

function submitUpload()
    {
        document.getElementById("imageForm").submit();
    }

function openSideBar() {
    document.getElementById("Sidebar").style.display = "block";
  }
  
  function closeSideBar() {
    document.getElementById("Sidebar").style.display = "none";
  }

function show(cityName)
    {
        //emptyQuartierDiv();
        //var divToFill = document.getElementById('quartierContainer');
        //divToFill.style.display = 'block';
        var xhr = new XMLHttpRequest();
        // xhr.open("GET","routes.php?city="+cityName,true);
        xhr.open("GET","etab?city="+cityName,true);
        xhr.onload = function() {
            if(xhr.status ==200)
            {
                // divToFill.innerHTML = this.responseText;
                document.getElementById("cities").innerHTML=this.responseText;
            }
        };
        
        xhr.send();
    }


function renderEditable()
    {
        document.getElementById("maleRadio").disabled = false;
        document.getElementById("femaleRadio").disabled = false;
        // document.getElementById("imageChange").style.display = "table-row";
       document.getElementById("submitInput").style.display = "table-cell";
       document.getElementById("password").style.display = "table-row";
       document.getElementById("goBack").style.display = "table-cell";
        var myInputs = document.getElementsByTagName("input");
        console.log(myInputs);
        for(var input of myInputs)
        {
            input.readOnly = false;
        }
    }
function back()
    {
        document.getElementById("maleRadio").disabled = true;
        document.getElementById("femaleRadio").disabled = true;
        // document.getElementById("imageChange").style.display = "none";
       document.getElementById("submitInput").style.display = "none";
       document.getElementById("password").style.display = "none";
       document.getElementById("goBack").style.display = "none";
        var myInputs = document.getElementsByTagName("input");
        console.log(myInputs);
        for(var input of myInputs)
        {
            input.readOnly = true;
            // console.log(input);
        }

    }


    function w3_open() {
        document.getElementById("mainDiv").style.marginLeft = "25%";
        document.getElementById("mySidebar").style.width = "25%";
        document.getElementById("mySidebar").style.display = "block";
        document.getElementById("openNav").style.display = 'none';
      }
      function w3_close() {
        document.getElementById("mainDiv").style.marginLeft = "0%";
        document.getElementById("mySidebar").style.display = "none";
        document.getElementById("openNav").style.display = "inline-block";
      }

function buildMap(latVar,lngVar,quartierId)
    {

       let xhr = new XMLHttpRequest();
      // var placeHolder;
       var jsonObject_services;
       xhr.open("GET","service?quartierId="+quartierId, false)
       xhr.onload = function()
        {
            if(xhr.status == 200)
                {

                    //placeHolder = this.responseText;
                    //console.log(this.responseText);
                    jsonObject_services = JSON.parse(this.responseText);
                    //console.log(jsonObject_services);
                }
        } 
        xhr.send();
       //console.log(jsonObject_services);
      var mapStyle = [
            {
              "featureType": "landscape",
              "elementType": "labels",
              "stylers": [
                {
                  "visibility": "off"
                }
              ]
            },
            {
              "featureType": "poi",
              "elementType": "labels",
              "stylers": [
                {
                  "visibility": "off"
                }
              ]
            },
            {
              "featureType": "poi.medical",
              "elementType": "labels",
              "stylers": [
                {
                  "visibility": "on"
                }
              ]
            },
            {
              "featureType": "transit",
              "elementType": "labels",
              "stylers": [
                {
                  "visibility": "off"
                }
              ]
            }
          ]

          document.getElementById('mapContainer').style.display = "block";

        const googleMap = new google.maps.Map(document.getElementById('map'),
            {
                center: {lat: latVar, lng: lngVar},
                zoom: 15,
            }
        )

        googleMap.set('styles',mapStyle);

        for(var i = 0; i<jsonObject_services.length; i++)
            {
                var currentEtab = jsonObject_services[i];
                var position = new google.maps.LatLng(currentEtab.LAT_SERVICE, currentEtab.LNG_SERVICE);
                var marker = new google.maps.Marker(
                    {
                        map : googleMap,
                        position: position,
                        title: currentEtab.INTITULE_SERVICE
                    }
                );
            }
    }
    



function goToLoginAccordion()
    {
        let y = document.getElementById('loginAnchor');
        let x = document.getElementById('loginAccordion')
        if(x.className.indexOf("w3-show") == -1)
            {
                x.className += " w3-show";
            }
        y.scrollIntoView({behavior: 'smooth'});
    }

function validateForm()
{
    if((document.forms["signUpForm"]["email"].value) !== (document.forms["signUpForm"]["email2"].value))
    {
        alert("Les émails entrés ne sont pas identiques!");
        return false;
    }
    else if((document.forms["signUpForm"]["password"].value) !== (document.forms["signUpForm"]["password2"].value))
    {
        alert("Les mot de passes entrés ne sont pas identiques!");
        return false;
    }
    else return true;
}

// function validDoctor()
//     {
//         let validDoctorModalChild = document.getElementById('validDoctorChild');
//         let validDoctorModal = document.getElementById('validDoctorModal');
//         if(validDoctorModalChild.childElementCount !== 0)
//         {validDoctorModal.style.display = 'block';}
//         console.log(validDoctorModal);
//         console.log(validDoctorModalChild);
//     }

function showErrorOrSuccess()
{
    let errorModalChild = document.getElementById('errorChild');
    let errorModal = document.getElementById('errorModal');
    if(errorModalChild.childElementCount !== 0)
    errorModal.style.display = 'block';
}

function closeErrorModal()
{
    document.getElementById('errorModal').style.display = 'none';
}

function goToEtab()
    {
        window.location.href = "etab";
    }
function goToLogOut()
    {
        window.location.href = "logout";
    }
function goToProfile($role)
    {
        window.location.href = $role;
    }

function goToHome()
{
    window.location.href = "home";
}

function loginFromEtab()
{
    // document.addEventListener('readystatechange', event => { 
    //     // When window loaded ( external resources are loaded too- `css`,`src`, etc...) 
    //     if (event.target.readyState === "complete") {
    //         alert("hi 2");
    //     }
    // });
    window.location.href = "signUpForm#login"
    // document.onload=function(){ 
    //     console.log("document.onload"); 
    // }
    
    // setTimeout(() => {
    //     let y = document.getElementById('loginAccordionButton');
    //     y.click();
    // }, 500);

    // window.addEventListener("load", function(){
    //     var y = document.getElementById('loginAccordionButton');
    //     y.click();
    // });

    

    
    // window.addEventListener('load', function() {
    //     setTimeout(() => {
    //         goToLoginAccordion()
    //     }, 500);
    // });
}

function controlLoginAccordion()
    {
        let y = document.getElementById('loginAnchor');
        let x = document.getElementById('loginAccordion')
        if(x.className.indexOf("w3-show") == -1)
            {
                x.className += " w3-show";
            }
        else
            {
                x.className = x.className.replace(" w3-show", "");
            }
        y.scrollIntoView({behavior: 'smooth'});
    }
function controlPharmacyAccordion()
    {
        let y = document.getElementById('pharmacyAnchor');
        let x = document.getElementById('pharmacyAccordion')
        y.scrollIntoView({behavior: 'smooth'});
        if(x.className.indexOf("w3-show") == -1)
            {
                x.className += " w3-show";
            }
        else
            {
                x.className = x.className.replace(" w3-show", "");
            }
    }

function openSentModal()
    {
        document.getElementById("sentModal").style.display ='block';
    }


function closeSentModal()
    {
        document.getElementById("sentModal").style.display ='none';
    }    

function openLoginP()
    {
        let loginInterface = document.getElementById('loginModalP');
        loginInterface.style.display = 'block';
    }
function openLoginD()
    {
        let loginInterface = document.getElementById('loginModalD');
        loginInterface.style.display = 'block';
    }
function openLoginA()
    {
        let loginInterface = document.getElementById('loginModalA');
        loginInterface.style.display = 'block';
    }
function closeLoginP()
    {
        document.getElementById('loginModalP').style.display='none'
    }
function closeLoginD()
    {
        document.getElementById('loginModalD').style.display='none'
    }
function closeLoginA()
    {
        document.getElementById('loginModalA').style.display='none'
    }

function openSignUpModal()
    {
        let signUpInterface = document.getElementById('SignUpModal');
        signUpInterface.style.display = 'block';
    }

function closeSignUpModal()
    {
        document.getElementById('SignUpModal').style.display='none'
    }
function showDocStuff()
{
    let docStuff = document.getElementById('docStuff');
    let docJustificatif = document.getElementById('docJustificatif');
    let docLieuTravaille = document.getElementById('docLieuTravaille');
    let docSpecialite = document.getElementById('docSpecialite');
    docStuff.style.display = 'block';
    docJustificatif.required = true;
    docLieuTravaille.required = true;
    docSpecialite.required = true;
}
function hideDocStuff()
{
    let docStuff = document.getElementById('docStuff');
    let docJustificatif = document.getElementById('docJustificatif');
    let docLieuTravaille = document.getElementById('docLieuTravaille');
    let docSpecialite = document.getElementById('docSpecialite');
    docStuff.style.display = 'none';
    docJustificatif.removeAttribute('required');
    docLieuTravaille.removeAttribute('required');
    docSpecialite.removeAttribute('required');
}