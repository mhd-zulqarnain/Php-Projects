$(function () {

    console.log("test");
    $.ajax({
        type:'GET',
        url:'api/back.json',
        success: function (data) {
            console.log(data.address);
            
        }
    });
})