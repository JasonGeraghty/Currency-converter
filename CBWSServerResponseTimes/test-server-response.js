let URL = '../CBWSAuthServer';

// TEST AUTH REGISTER 10, 100 AND 100 TIMES
let totalResponseTimeRegister = 0;

let quantity = 10;

for(let i = 0; i < quantity; i++) {
    let dateToSend = (new Date()).getTime();

    $.ajax
        ({
            type: "POST",
            //the url where you want to sent the userName and password to
            url: URL + "/auth/register/",
            dataType: 'json',
            async: false,
            //json object to sent to the authentication url
            data: JSON.stringify({"fname":"GenByTest","lname":"GenByTest","email":"GenByTest@gmail.com"}),
            success: function () {
                let dateTimeFinished = (new Date()).getTime();

                let responseTime = dateTimeFinished - dateToSend ;
                totalResponseTimeRegister = totalResponseTimeRegister + responseTime;
            }
        })
}
let averageRegister = totalResponseTimeRegister / quantity;
console.log("Register " + quantity + " times average: " + averageRegister);

totalResponseTimeRegister = 0;

quantity = 100;

for(let i = 0; i < quantity; i++) {
    let dateToSend = (new Date()).getTime();

    $.ajax
        ({
            type: "POST",
            //the url where you want to sent the userName and password to
            url: URL + "/auth/register/",
            dataType: 'json',
            async: false,
            //json object to sent to the authentication url
            data: JSON.stringify({"fname":"GenByTest","lname":"GenByTest","email":"GenByTest@gmail.com"}),
            success: function () {
                let dateTimeFinished = (new Date()).getTime();

                let responseTime = dateTimeFinished - dateToSend ;
                totalResponseTimeRegister = totalResponseTimeRegister + responseTime;
            }
        })
}
averageRegister = totalResponseTimeRegister / quantity;
console.log("Register " + quantity + " times average: " + averageRegister);

totalResponseTimeRegister = 0;

quantity = 1000;

for(let i = 0; i < quantity; i++) {
    let dateToSend = (new Date()).getTime();

    $.ajax
        ({
            type: "POST",
            //the url where you want to sent the userName and password to
            url: URL + "/auth/register/",
            dataType: 'json',
            async: false,
            //json object to sent to the authentication url
            data: JSON.stringify({"fname":"GenByTest","lname":"GenByTest","email":"GenByTest@gmail.com"}),
            success: function () {
                let dateTimeFinished = (new Date()).getTime();

                let responseTime = dateTimeFinished - dateToSend ;
                totalResponseTimeRegister = totalResponseTimeRegister + responseTime;
            }
        })
}
averageRegister = totalResponseTimeRegister / quantity;
console.log("Register " + quantity + " times average: " + averageRegister);

// TEST AUTH VALIDATE 10, 100 AND 100 TIMES
totalResponseTimeRegister = 0;

quantity = 10;

let test = 'Validate';

let jwt = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1NzAwODk0LCJuYmYiOjE1NTU3MDE4OTQsImRhdGEiOnsiZmlyc3RuYW1lIjoiUGV0ZXIiLCJsYXN0bmFtZSI6Ik1jRmVlIiwiZW1haWwiOiJQZXRlckBnbWFpbC5jb20ifX0.cN2m26QBeVav0BROK1mkJv1zFaSdYGyBlAcALx7-34I';

for(let i = 0; i < quantity; i++) {
    let dateToSend = (new Date()).getTime();

    $.ajax
        ({
            type: "POST",
            //the url where you want to sent the userName and password to
            url: URL + "/auth/validate/",
            dataType: 'json',
            async: false,
            //json object to sent to the authentication url
            data: JSON.stringify({"jwt": jwt}),
            success: function () {
                let dateTimeFinished = (new Date()).getTime();

                let responseTime = dateTimeFinished - dateToSend ;
                totalResponseTimeRegister = totalResponseTimeRegister + responseTime;
            }
        })
}
averageRegister = totalResponseTimeRegister / quantity;
console.log(test + ' ' + quantity + " times average: " + averageRegister);

totalResponseTimeRegister = 0;

quantity = 100;

for(let i = 0; i < quantity; i++) {
    let dateToSend = (new Date()).getTime();

    $.ajax
        ({
            type: "POST",
            //the url where you want to sent the userName and password to
            url: URL + "/auth/validate/",
            dataType: 'json',
            async: false,
            //json object to sent to the authentication url
            data: JSON.stringify({"jwt": jwt}),
            success: function () {
                let dateTimeFinished = (new Date()).getTime();

                let responseTime = dateTimeFinished - dateToSend ;
                totalResponseTimeRegister = totalResponseTimeRegister + responseTime;
            }
        })
}
averageRegister = totalResponseTimeRegister / quantity;
console.log(test + ' ' + quantity + " times average: " + averageRegister);

totalResponseTimeRegister = 0;

quantity = 1000;

for(let i = 0; i < quantity; i++) {
    let dateToSend = (new Date()).getTime();

    $.ajax
        ({
            type: "POST",
            //the url where you want to sent the userName and password to
            url: URL + "/auth/validate/",
            dataType: 'json',
            async: false,
            //json object to sent to the authentication url
            data: JSON.stringify({"jwt": jwt}),
            success: function () {
                let dateTimeFinished = (new Date()).getTime();

                let responseTime = dateTimeFinished - dateToSend ;
                totalResponseTimeRegister = totalResponseTimeRegister + responseTime;
            }
        })
}
averageRegister = totalResponseTimeRegister / quantity;
console.log(test + ' ' + quantity + " times average: " + averageRegister);


// TEST AUTH getId 10, 100 AND 100 TIMES

totalResponseTimeRegister = 0;

quantity = 10;

test = 'GetId';

jwt = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1NzAwODk0LCJuYmYiOjE1NTU3MDE4OTQsImRhdGEiOnsiZmlyc3RuYW1lIjoiUGV0ZXIiLCJsYXN0bmFtZSI6Ik1jRmVlIiwiZW1haWwiOiJQZXRlckBnbWFpbC5jb20ifX0.cN2m26QBeVav0BROK1mkJv1zFaSdYGyBlAcALx7-34I';

for(let i = 0; i < quantity; i++) {
    let dateToSend = (new Date()).getTime();

    $.ajax
        ({
            type: "POST",
            //the url where you want to sent the userName and password to
            url: URL + "/auth/getId/",
            dataType: 'json',
            async: false,
            //json object to sent to the authentication url
            data: JSON.stringify({"jwt": jwt}),
            success: function () {
                let dateTimeFinished = (new Date()).getTime();

                let responseTime = dateTimeFinished - dateToSend ;
                totalResponseTimeRegister = totalResponseTimeRegister + responseTime;
            }
        })
}
averageRegister = totalResponseTimeRegister / quantity;
console.log(test + ' ' + quantity + " times average: " + averageRegister);

totalResponseTimeRegister = 0;

quantity = 100;

for(let i = 0; i < quantity; i++) {
    let dateToSend = (new Date()).getTime();

    $.ajax
        ({
            type: "POST",
            //the url where you want to sent the userName and password to
            url: URL + "/auth/getId/",
            dataType: 'json',
            async: false,
            //json object to sent to the authentication url
            data: JSON.stringify({"jwt": jwt}),
            success: function () {
                let dateTimeFinished = (new Date()).getTime();

                let responseTime = dateTimeFinished - dateToSend ;
                totalResponseTimeRegister = totalResponseTimeRegister + responseTime;
            }
        })
}
averageRegister = totalResponseTimeRegister / quantity;
console.log(test + ' ' + quantity + " times average: " + averageRegister);

totalResponseTimeRegister = 0;

quantity = 1000;

for(let i = 0; i < quantity; i++) {
    let dateToSend = (new Date()).getTime();

    $.ajax
        ({
            type: "POST",
            //the url where you want to sent the userName and password to
            url: URL + "/auth/getId/",
            dataType: 'json',
            async: false,
            //json object to sent to the authentication url
            data: JSON.stringify({"jwt": jwt}),
            success: function () {
                let dateTimeFinished = (new Date()).getTime();

                let responseTime = dateTimeFinished - dateToSend ;
                totalResponseTimeRegister = totalResponseTimeRegister + responseTime;
            }
        })
}
averageRegister = totalResponseTimeRegister / quantity;
console.log(test + ' ' + quantity + " times average: " + averageRegister);

// TEST PRINCIPAL SERVER Currencies 10, 100 AND 100 TIMES

URL = 'http://localhost:8888/CBWSCA2/CBWSPrincipalServer';

totalResponseTimeRegister = 0;

quantity = 10;

test = 'currencies';

jwt = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1NzAwODk0LCJuYmYiOjE1NTU3MDE4OTQsImRhdGEiOnsiZmlyc3RuYW1lIjoiUGV0ZXIiLCJsYXN0bmFtZSI6Ik1jRmVlIiwiZW1haWwiOiJQZXRlckBnbWFpbC5jb20ifX0.cN2m26QBeVav0BROK1mkJv1zFaSdYGyBlAcALx7-34I';

for(let i = 0; i < quantity; i++) {
    let dateToSend = (new Date()).getTime();

    $.ajax
        ({
            type: "GET",
            //the url where you want to sent the userName and password to
            url: URL + "/currencies/",
            dataType: 'json',
            async: false,
            success: function () {
                let dateTimeFinished = (new Date()).getTime();

                let responseTime = dateTimeFinished - dateToSend ;
                totalResponseTimeRegister = totalResponseTimeRegister + responseTime;
            }
        })
}
averageRegister = totalResponseTimeRegister / quantity;
console.log(test + ' ' + quantity + " times average: " + averageRegister);

totalResponseTimeRegister = 0;

quantity = 100;

for(let i = 0; i < quantity; i++) {
    let dateToSend = (new Date()).getTime();

    $.ajax
        ({
            type: "GET",
            //the url where you want to sent the userName and password to
            url: URL + "/currencies/",
            dataType: 'json',
            async: false,
            success: function () {
                let dateTimeFinished = (new Date()).getTime();

                let responseTime = dateTimeFinished - dateToSend ;
                totalResponseTimeRegister = totalResponseTimeRegister + responseTime;
            }
        })
}
averageRegister = totalResponseTimeRegister / quantity;
console.log(test + ' ' + quantity + " times average: " + averageRegister);

totalResponseTimeRegister = 0;

quantity = 1000;

for(let i = 0; i < quantity; i++) {
    let dateToSend = (new Date()).getTime();

    $.ajax
        ({
            type: "GET",
            //the url where you want to sent the userName and password to
            url: URL + "/currencies/",
            dataType: 'json',
            async: false,
            success: function () {
                let dateTimeFinished = (new Date()).getTime();

                let responseTime = dateTimeFinished - dateToSend ;
                totalResponseTimeRegister = totalResponseTimeRegister + responseTime;
            }
        })
}
averageRegister = totalResponseTimeRegister / quantity;
console.log(test + ' ' + quantity + " times average: " + averageRegister);

// TEST PRINCIPAL SERVER LOGS 10, 100 AND 100 TIMES

URL = 'http://localhost:8888/CBWSCA2/CBWSPrincipalServer';

totalResponseTimeRegister = 0;

quantity = 10;

test = 'logs';

for(let i = 0; i < quantity; i++) {
    let dateToSend = (new Date()).getTime();

    $.ajax
        ({
            type: "POST",
            //the url where you want to sent the userName and password to
            url: URL + "/logs/",
            dataType: 'json',
            async: false,
            success: function () {
                let dateTimeFinished = (new Date()).getTime();

                let responseTime = dateTimeFinished - dateToSend ;
                totalResponseTimeRegister = totalResponseTimeRegister + responseTime;
            }
        })
}
averageRegister = totalResponseTimeRegister / quantity;
console.log(test + ' ' + quantity + " times average: " + averageRegister);

totalResponseTimeRegister = 0;

quantity = 100;

for(let i = 0; i < quantity; i++) {
    let dateToSend = (new Date()).getTime();

    $.ajax
        ({
            type: "POST",
            //the url where you want to sent the userName and password to
            url: URL + "/logs/",
            dataType: 'json',
            async: false,
            success: function () {
                let dateTimeFinished = (new Date()).getTime();

                let responseTime = dateTimeFinished - dateToSend ;
                totalResponseTimeRegister = totalResponseTimeRegister + responseTime;
            }
        })
}
averageRegister = totalResponseTimeRegister / quantity;
console.log(test + ' ' + quantity + " times average: " + averageRegister);

totalResponseTimeRegister = 0;

quantity = 1000;

for(let i = 0; i < quantity; i++) {
    let dateToSend = (new Date()).getTime();

    $.ajax
        ({
            type: "POST",
            //the url where you want to sent the userName and password to
            url: URL + "/logs/",
            dataType: 'json',
            async: false,
            success: function () {
                let dateTimeFinished = (new Date()).getTime();

                let responseTime = dateTimeFinished - dateToSend ;
                totalResponseTimeRegister = totalResponseTimeRegister + responseTime;
            }
        })
}
averageRegister = totalResponseTimeRegister / quantity;
console.log(test + ' ' + quantity + " times average: " + averageRegister);