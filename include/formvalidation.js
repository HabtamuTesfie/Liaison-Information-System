
function formValidation()
{
var MRN = document.registration.MRN;
var phone = document.registration.phone;

if(MRN_validation(MRN,5,7))
{
if(allLetter(name))
{
if(phone_validation(phone,10,14))
{
}
} 
}

return false;
}
 
function phone_validation(phone,mx,my)
{
var phone_len = phone.value.length;
if (phone_len == 0 || phone_len >= my || phone_len < mx)
{
alert("Phone number  should not be empty / length be between "+mx+" to "+my);
phone.focus();
return false;
}
return true;
}

function MRN_validation(MRN,mx,my)
{
var MRN_len = MRN.value.length;
if (MRN_len == 0 || MRN_len >= my || MRN_len < mx)
{
alert("MRN  should not be empty / length be between "+mx+" to "+my);
MRN.focus();
return false;
}
return true;
}


function ageValidation() 
{
     var x = document.getElementById("age").value;
     if (x < 1 || x > 100)
     {
            alert("You inserted an extreme or invalid age value.Are you sure this the correct age?")
     }
}


$(document).on('keypress', '#Name', function (event) {
    var regex = new RegExp("^[a-zA-Z ]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
        event.preventDefault();
        return false;
    }
});



var specialKeys = new Array();
        specialKeys.push(8); //Backspace
        function IsNumeric(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
            document.getElementById("error").style.display = ret ? "none" : "inline";
            return ret;
        }

