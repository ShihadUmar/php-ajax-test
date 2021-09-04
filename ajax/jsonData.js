function writeData(fileName,dataObject){
    $.ajax({
        type: "POST",
        url: "php/writeData.php",
        dataType: "html",
        data: {json: fileName, data: JSON.stringify(dataObject)}
    });
}

function readData(fileName,callback){
    $.ajax({
        type: "POST",
        url: "php/readData.php",
        dataType: "html",
        data: {json: fileName},
        success: function(data){
            callback(JSON.parse(data));
        }
    });
}