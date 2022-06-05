var postalcodes;

// this function will be called by our JSON callback
// the parameter jData will contain an array with postalcode objects
function getLocation(jData) {
  if (jData == null) {
    // There was a problem parsing search results
    return;
  }

  // save place array in 'postalcodes' to make it accessible from mouse event handlers
  postalcodes = jData.postalcodes;

  //postalcodes[0].postalcode = parseInt(postalcodes[0].postalcode);

  if (postalcodes.length >= 1) {
    // we got several places for the postalcode
    // make suggest box visible
    document.getElementById('suggestBoxElement').style.visibility = 'visible';
    var suggestBoxHTML  = '';
    // iterate over places and build suggest box content
    for (i=0;i< jData.postalcodes.length;i++) {
      // for every postalcode record we create a html div
      // each div gets an id using the array index for later retrieval
      // define mouse event handlers to highlight places on mouseover
      // and to select a place on click
      // all events receive the postalcode array index as input parameter
      suggestBoxHTML += "<div class='suggestions' id=pcId" + i + " onmousedown='suggestBoxMouseDown(" + i +")' onmouseover='suggestBoxMouseOver(" +  i +")' onmouseout='suggestBoxMouseOut(" + i +")'> " + postalcodes[i].countryCode + ' ' + postalcodes[i].postalcode + ' - ' + postalcodes[i].placeName  +'</div>';
    }
    // display suggest box
    
    document.getElementById('suggestBoxElement').innerHTML = suggestBoxHTML;


  } else {
    document.getElementById('billing_edo').value = "";
    document.getElementById('billing_ciudad').value = "";
    document.getElementById('billing_colonia').value = "";

    closeSuggestBox();
  }
}



function closeSuggestBox() {
  document.getElementById('suggestBoxElement').innerHTML = '';
  document.getElementById('suggestBoxElement').style.visibility = 'hidden';
}

// remove highlight on mouse out event
function suggestBoxMouseOut(obj) {
  document.getElementById('pcId'+ obj).className = 'suggestions';
}

// the user has selected a place name from the suggest box
function suggestBoxMouseDown(obj) {
  closeSuggestBox();
  var comp1 = postalcodes[obj].adminName1;
  var comp2 = postalcodes[obj].adminName2;

  document.getElementById('billing_colonia').value = postalcodes[obj].placeName;

  document.getElementById('billing_edo').value = comp1;

  document.getElementById('billing_ciudad').value = comp2;

}

// function to highlight places on mouse over event
function suggestBoxMouseOver(obj) {
  document.getElementById('pcId'+ obj).className = 'suggestionMouseOver';
}

// this function is called when the user leaves the postal code input field
// it call the geonames.org JSON webservice to fetch an array of places
// for the given postal code
function postalCodeLookup() {

      var country = document.getElementById('billing_country').value;


  if (geonamesPostalCodeCountries.toString().search(country) == -1) {
     return; // selected country not supported by geonames
  }
  // display 'loading' in suggest box
  document.getElementById('suggestBoxElement').style.visibility = 'visible';
  document.getElementById('suggestBoxElement').innerHTML = '<img src="/images/progress_arrow.gif" border="0"><small><i>Cargando...</i></small>';

  var postalcode = document.getElementById('billing_cp').value;

  request = 'https://www.geonames.org/postalCodeLookupJSON?postalcode=' + postalcode  + '&country=' + country  + '&callback=getLocation';

  //alert("request: "+request);

  // Create a new script object
  aObj = new JSONscriptRequest(request);
  //alert("JSONrequest: "+aObj);
  // Build the script tag
  aObj.buildScriptTag();
  // Execute (add) the script tag
  aObj.addScriptTag();

}



// set the country of the user's ip (included in geonamesData.js) as selected country
// in the country select box of the address form
function setDefaultCountry() {
  var countrytheSelect = document.getElementById('billing_country');
  for (i=0;i< countrytheSelect.length;i++) {
    // the javascript geonamesData.js contains the countrycode
    // of the userIp in the variable 'geonamesUserIpCountryCode'
    if (countrytheSelect[i].value == geonamesUserIpCountryCode) {
      // set the country selectionfield
      //alert(countrytheSelect[i].value);
      countrytheSelect.selectedIndex = countrytheSelect[i].value;
    }
  }
}

 // ********************************* FACTURACION ****************************************************

 function postalCodeLookupfac() {

      var country = document.getElementById('fac_country').value;


  if (geonamesPostalCodeCountries.toString().search(country) == -1) {
     return; // selected country not supported by geonames
  }
  // display 'loading' in suggest box
  document.getElementById('suggestBoxElementfac').style.visibility = 'visible';
  document.getElementById('suggestBoxElementfac').innerHTML = '<img src="/images/progress_arrow.gif" border="0"><small><i>Cargando...</i></small>';

  var postalcode = document.getElementById('fac_cp').value;

  request = 'https://www.geonames.org/postalCodeLookupJSON?postalcode=' + postalcode  + '&country=' + country  + '&callback=getLocationfac';

  //alert("request: "+request);

  // Create a new script object
  aObj = new JSONscriptRequest(request);
  //alert("JSONrequest: "+aObj);
  // Build the script tag
  aObj.buildScriptTag();
  // Execute (add) the script tag
  aObj.addScriptTag();

}

// function to highlight places on mouse over event
function suggestBoxMouseOverfac(obj) {
  document.getElementById('pcIdfac'+ obj).className = 'suggestionMouseOver';
}

// the user has selected a place name from the suggest box
function suggestBoxMouseDownfac(obj) {
  closeSuggestBoxfac();
  var comp1 = postalcodes[obj].adminName1;
  var comp2 = postalcodes[obj].adminName2;

  document.getElementById('fac_colonia').value = postalcodes[obj].placeName;

  document.getElementById('fac_edo').value = comp1;

  document.getElementById('fac_ciudad').value = comp2;

}

// remove highlight on mouse out event
function suggestBoxMouseOutfac(obj) {
  document.getElementById('pcIdfac'+ obj).className = 'suggestions';
}

function closeSuggestBoxfac() {
  document.getElementById('suggestBoxElementfac').innerHTML = '';
  document.getElementById('suggestBoxElementfac').style.visibility = 'hidden';
}


function getLocationfac(jData) {
  if (jData == null) {
    // There was a problem parsing search results
    return;
  }

  // save place array in 'postalcodes' to make it accessible from mouse event handlers
  postalcodes = jData.postalcodes;

  //postalcodes[0].postalcode = parseInt(postalcodes[0].postalcode);

  if (postalcodes.length >= 1) {
    // we got several places for the postalcode
    // make suggest box visible
    document.getElementById('suggestBoxElementfac').style.visibility = 'visible';
    var suggestBoxHTML  = '';
    // iterate over places and build suggest box content
    for (i=0;i< jData.postalcodes.length;i++) {
      // for every postalcode record we create a html div
      // each div gets an id using the array index for later retrieval
      // define mouse event handlers to highlight places on mouseover
      // and to select a place on click
      // all events receive the postalcode array index as input parameter
      suggestBoxHTML += "<div class='suggestions' id=pcIdfac" + i + " onmousedown='suggestBoxMouseDownfac(" + i +")' onmouseover='suggestBoxMouseOverfac(" +  i +")' onmouseout='suggestBoxMouseOutfac(" + i +")'> " + postalcodes[i].countryCode + ' ' + postalcodes[i].postalcode + ' - ' + postalcodes[i].placeName  +'</div>';
    }
    // display suggest box
    
    document.getElementById('suggestBoxElementfac').innerHTML = suggestBoxHTML;


  } else {
    document.getElementById('fac_edo').value = "";
    document.getElementById('fac_ciudad').value = "";
    document.getElementById('fac_colonia').value = "";

    closeSuggestBoxfac();
  }
}