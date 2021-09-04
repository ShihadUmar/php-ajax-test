<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="libraries/jquery.min.js"></script>
    <script src="jsonData.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <label class="switch">
        <input name="switch_A" type="checkbox">
        <span class="slider round"></span>
    </label>
    <label class="switch">
        <input name="switch_B" type="checkbox">
        <span class="slider round"></span>
    </label>
    <label class="switch">
        <input name="switch_C" type="checkbox">
        <span class="slider round"></span>
    </label>
    <label class="switch">
        <input name="switch_D" type="checkbox">
        <span class="slider round"></span>
    </label>
    <label class="switch">
        <input name="switch_E" type="checkbox">
        <span class="slider round"></span>
    </label>
    <script>
        $("document").ready(function(){
            function getServerName(){
                serverName = prompt("Enter Server Name\nCancel = Default Server (data)","data");
                if(serverName === null){
                    serverName = 'data';
                }
                readData(serverName,function(data){
                    if(data.error == "file does not exist"){
                        if(confirm("Creating A New Server...")){
                            writeData(serverName,{
                                switch_A: "unchecked",
                                switch_B: "unchecked",
                                switch_C: "unchecked",
                                switch_D: "unchecked",
                                switch_E: "unchecked"
                            });
                        }else{
                            getServerName();
                        }
                    }else{
                        if(confirm("Connecting To This Server...")==false){
                            getServerName();
                        }
                    }
                });
            }
            var serverName = '';
            getServerName();
            if(serverName != null || serverName != ''){
                setInterval(function(){
                    readData(serverName,function(data){
                        let dataObject = data;
                        for(const property in dataObject){
                            var element = $('input[name='+property+']');
                            if(dataObject[property] == "checked"){
                                element.prop('checked', true);
                            }else{
                                element.prop('checked', false);
                            }
                        }
                    });
                }, 100);

                $("input").change(function(){
                    let inputName = $(this).attr("name");
                    readData(serverName,function(data){
                            var dataObject = data;
                            if(dataObject[inputName] == "checked"){
                                dataObject[inputName] = "unchecked";
                                writeData(serverName,dataObject);
                            }else{
                                dataObject[inputName] = "checked";
                                writeData(serverName,dataObject);
                            }
                    });
                });
            }
        });
    </script>
</body>
</html>
