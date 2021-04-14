/*
    function emptyQuartierDiv()
    {
        let divToEmpty = document.getElementById('quartierContainer');
        divToEmpty.style.display = 'none';
        divToEmpty.innerHTML = '';
    }
*/
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

function buildMap(latVar,lngVar,quartierName)
    {
        let quartierNameInFunction = quartierName;
       let xhr = new XMLHttpRequest();
       xhr.open("GET","service?quartier="+quartierNameInFunction, true)
       xhr.onload = function()
        {
            if(xhr.status == 200)
                {
                    var placeHolder = this.responseText;
                    var servicesPermanence = new Map([this.responseText]);
                }
        } 
        xhr.send();
        var servicesPermanence = new Map([placeHolder]);
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

        const googleMap = new google.maps.Map(document.getElementById('map'),
            {
                center: {lat: latVar, lng: lngVar},
                zoom: 16,
            }
        )

        googleMap.set('styles',mapStyle);

        for (let coordinates of servicesPermanence.values())
            {
                var marker = new google.maps.Marker(
                    {
                        position: coordinates,
                        map: googleMap,
                    }
                )
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
    docStuff.style.display = 'block';
    docJustificatif.required = true;
}
function hideDocStuff()
{
    let docStuff = document.getElementById('docStuff');
    let docJustificatif = document.getElementById('docJustificatif');
    docStuff.style.display = 'none';
    docJustificatif.removeAttribute('required');
}