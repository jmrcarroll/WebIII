
function basketAdd(str) {

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert("Item Added to cart!");
        }
    };
    xmlhttp.open("GET","../resources/basketAdd.php?id="+str,true);
    xmlhttp.send();
}

function showbooks(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("shoptbl").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","../resources/queries.php?order="+str,true);
        xmlhttp.send();
        //console.log(str);
    }
}

function login() {
    location.replace("../login")
}
