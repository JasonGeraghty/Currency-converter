// Get register form values
$( "#registerForm" ).on( "submit", function( event ) {
  event.preventDefault();
  const firstname = $("input[name=fname]").val();
  const lastname = $("input[name=lname]").val();
  const email = $("input[name=email]").val();
  register(firstname,lastname,email);
});
const currency = ['USD','EUR','GBP','RUB','ILS','PHP','CHF','AUD','JPY','TRY','HKD','MYR','CZK','IDR','DKK','BGN','HUF','NZD','MXN','THB','ISK','ZAR','BRL','SGD','PLN','INR','KRW','RON','CNY','SEK','NOK'];
// Get currency form values
$( "#currencyForm" ).on( "submit", function( event ) {
    event.preventDefault();
    const base = $("select[name=currency]").val();
    let symbols = $("input[name=symbols]").val();
    let validsymbols = [];
    symbols = symbols.split(',');
    symbols.forEach(
        (symbol) => {
            symbol = symbol.trim().toUpperCase();
            if (currency.includes(symbol) && symbol !== base) {
                validsymbols.push(symbol);
            }
        }
    );
    validsymbols = validsymbols.join(',')
    const datatype = $("input[type=radio][name=data_type]:checked").val();
    const startdate = $("input[name=date_start]").val();
    const enddate = $("input[name=date_end]").val();
    if (startdate !== "" && enddate !== "") {
        sendHistoryRequest(base,validsymbols,datatype,startdate,enddate);
    } else {
        sendLatestRequest(base,validsymbols,datatype);
    }
  });

  // When renew button is clicked activate renew function
  $( "#renew" ).on( "click", function( event ) {
    event.preventDefault();
    renewToken();
  });

  // When revoke button is clicked activate revoke function
  $( "#revoke" ).on( "click", function( event ) {
    event.preventDefault();
    revokeToken();
  });

function register(firstname,lastname,email) {
    $.ajax
    ({
        type: "POST",
        //the url where you want to sent the userName and password to
        url: 'http://localhost:8888/CBWSCA2/CBWSAuthServer/auth/register/',
        dataType: 'json',
        async: false,
        //json object to sent to the authentication url
        data: JSON.stringify({"fname":firstname,"lname":lastname,"email":email}),
        success: function (result) {
            if (result.success === 1) {
                const d = new Date(result.expiryDate * 1000);
                const days = ["Sun","Mon","Tues","Wed","Thurs","Fri","Sat"];
                const month = ["Jan","Feb","Mar","Apr","May","June","July","Aug","Sept","Oct","Nov","Dec"];
                const cookieExpires = days[d.getDay()]+', '+d.getUTCDate()+', '+month[d.getUTCMonth()]+', '+d.getUTCFullYear() + ' ' + d.getUTCHours()+ ':' + d.getUTCMinutes()+ ':' + d.getUTCSeconds() + ' UTC';
                document.cookie = 'jwt='+result.jwt+'; expires='+cookieExpires;
                window.href = window.location.replace('./currency.php');
            } else {
                $( "#errorMsg" ).html( result.message );
            }
        }
    })
}

function sendLatestRequest(base,symbols,datatype) {
    $.ajax
    ({
        type: "POST",
        //the url where you want to sent the userName and password to
        url: 'http://localhost:8888/CBWSCA2/CBWSPrincipalServer/latest/',
        dataType: 'json',
        async: false,
        //json object to sent to the authentication url
        data: JSON.stringify({"base":base,"symbols":symbols,"data_type":datatype,"jwt":getCookie('jwt')}),
        success: function (result) {
        if (datatype === 'xml') {
            $( "#target" ).text(result).html();
        } else {
            result = '<pre>' + JSON.stringify(result,null,"   ") + '</pre>';
            $( "#target" ).html( result );
        }
        }
    })
}

function sendHistoryRequest(base,symbols,datatype,startdate,enddate) {
    $.ajax
    ({
        type: "POST",
        //the url where you want to sent the userName and password to
        url: 'http://localhost:8888/CBWSCA2/CBWSPrincipalServer/history/',
        dataType: 'json',
        async: false,
        //json object to sent to the authentication url
        data: JSON.stringify({"base":base,"symbols":symbols,"data_type":datatype,"start_at":startdate,"end_at":enddate,"jwt":getCookie('jwt')}),
        success: function (result) {
        if (datatype === 'xml') {
            $( "#target" ).text(result).html();
        } else {
            result = '<pre>' + JSON.stringify(result,null,"   ") + '</pre>';
            $( "#target" ).html( result );
        }
        }
    })
}

function renewToken() {
    $.ajax
    ({
        type: "POST",
        //the url where you want to sent the userName and password to
        url: 'http://localhost:8888/CBWSCA2/CBWSAuthServer/auth/renew/',
        dataType: 'json',
        async: false,
        //json object to sent to the authentication url
        data: JSON.stringify({"jwt":getCookie('jwt')}),
        success: function (result) {
            const d = new Date();
            const days = ["Sun","Mon","Tues","Wed","Thurs","Fri","Sat"];
            const month = ["Jan","Feb","Mar","Apr","May","June","July","Aug","Sept","Oct","Nov","Dec"];
            const cookieExpires = days[d.getDay()]+', '+d.getUTCDate()+', '+month[d.getUTCMonth()]+', '+(d.getUTCFullYear()+1) + ' ' + d.getUTCHours()+ ':' + d.getUTCMinutes()+ ':' + d.getUTCSeconds() + ' UTC';
            document.cookie = 'jwt='+result.output.newjwt+'; expires='+cookieExpires;
            result = '<pre>' + JSON.stringify(result,null,"   ") + '</pre>';
            $( "#target" ).html( result );
        }
    })
}

function revokeToken() {
    $.ajax
    ({
        type: "POST",
        //the url where you want to sent the userName and password to
        url: 'http://localhost:8888/CBWSCA2/CBWSAuthServer/auth/revoke/',
        dataType: 'json',
        async: false,
        //json object to sent to the authentication url
        data: JSON.stringify({"jwt":getCookie('jwt')}),
        success: function (result) {
            result = '<pre>' + JSON.stringify(result,null,"   ") + '</pre>';
            document.cookie = 'jwt=;';
            $( "#target" ).html( result );
            window.location.replace('./');
        }
    })
}
// obtained from https://www.w3schools.com/js/js_cookies.asp
function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }