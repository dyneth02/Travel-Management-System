document.getElementById('pay').addEventListener('click', function() {
  if (
    !(document.getElementById('fname').value == '') &&
    !(document.getElementById('email').value == '') &&
    !(document.getElementById('cname').value == '') &&
    !(document.getElementById('ccnum').value == '') &&
    !(document.getElementById('expmonth').value == '') &&
    !(document.getElementById('expyear').value == '') &&
    !(document.getElementById('cvv').value == '')
  ) {
    var x = document.getElementById("snackbar");
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 2000);
  }
});

document.getElementById('getdetails').addEventListener('click', function() {

  var email = document.getElementById('email').value;
  
  // AJAX request 
  var xhr = new XMLHttpRequest();
  xhr.open('GET', 'getData.php?email=' + encodeURIComponent(email), true);

  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        // Process the response
        var responseData = JSON.parse(xhr.responseText);
        
        // Loop through the data and access the ID and name values
        responseData.forEach(function(row) {
          var cardname = row.cardname;
          var cardnumber = row.cardnumber;
          var expmonth = row.expmonth;
          var expyear = row.expyear;
          var cvv = row.cvv;
          document.getElementById('cname').value = cardname;
          document.getElementById('ccnum').value = cardnumber;
          document.getElementById('expmonth').value = expmonth;
          document.getElementById('expyear').value = expyear;
          document.getElementById('cvv').value = cvv;
        });
      } else {
        console.log('Error: ' + xhr.status);
      }
    }
  };

  xhr.send();
});
