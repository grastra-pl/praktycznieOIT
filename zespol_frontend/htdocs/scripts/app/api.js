"use strict";




async function checkNumbers(){
    const value = document.getElementById("ourNumber").value;
    var codedvalue = parseInt(value);
    if(Number.isInteger(codedvalue)){
        var data = {
            rawValue : codedvalue
        }
    
        var responseJSON = await postData('/api.php', data);
        var myValue = responseJSON['myValue'];
        var yourValue = responseJSON['yourValue'];
        console.log(responseJSON);
        if(myValue===yourValue && myValue!= undefined){
            print('tak, to prawidłowa odpowiedź!');
        }if(!myValue){
            print('nie, w bazie była mniejsza wartość! Twoja wartość została zapisana');
        }if(myValue>yourValue){
            print('nie, w bazie jest większa wartość!');
        }

    }else {
        print("wystapil blad");
    }


}
