var   OurRequest= new XMLHttpRequest();
OurRequest.open('GET','https://learnwebcode.github.io/json-example/animals-1.json');

OurRequest.onload=function () {
    Console.log(OurRequest.responseText);
}
