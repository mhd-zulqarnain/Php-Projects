var xmlHttp= creatXmlObject();

function creatXmlObject(){
    var xmlHttp;

    if(window.ActiveXObject){
        try {
            xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
        }catch(e){
                xmlHttp=false;
        }
    }
    else {
        try {
            xmlHttp=new XMLHttpRequest();
        }catch(e){
            xmlHttp=false;
        }

    }
    if(!xmlHttp){
        alert("can't create the xml object");
    }
    else {
        return xmlHttp;
    }
}

function process() {
    if(xmlHttp.readyState==0 || xmlHttp.readyState==4){  //checking if the object is busy in performing other requests
        food=encodeURIComponent(document.getElementById("userInput").value);
        xmlHttp.open("GET","foodstore.php?food="+food,true);
        xmlHttp.onreadystatechange=handleServerResponse;
        xmlHttp.send();  //send null if the method is GET
    }
    else {
        setTimeOut('process()',1000);
    }
    
}

function handleServerResponse() {
    if(xmlHttp.readyState==4){
        if(xmlHttp.status==200){
            xmlResponse = xmlHttp.responseXML;
            xmlDocumentElement = xmlResponse.documentElement;
            console.log(xmlDocumentElement);
            message=xmlDocumentElement.firstChild.data;
            document.getElementById("underInput").innerHTML='<span style="color=blue">'+message+'</span>';
            setTimeout('process()',1000);
        }else {
            alert("something is wrong");
        }

    }

}

