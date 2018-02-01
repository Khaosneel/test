
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="chat.css">
    <title>Document</title>
</head>
<body>

<div id = "chatWindow">

    <h1>PSPS Chat</h1>
    <span>Welcome to the support chat, *Insert user name here*</span>
    <div id="chat" style="overflow-y:scroll;height: 250px;background: white"></div>
    <BR>
    <form id="input">
        <div class = "inputDiv">
            <input type="text" name="text" id="text">
            <input type="submit" value="Send" id="send">
        </div>
    </form>    

<script>
    document.getElementById('input').addEventListener('submit',sendmsg);

    function sendmsg(e) {
        e.preventDefault();

        var msg = document.getElementById('text').value;
        var par = "message="+msg;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'chatlog.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhr.onload = function () {
            console.log(this.responseText);
        }

        xhr.send(par);
        document.getElementById('text').value = "";
        
    }
   
    var old;
    function loadLog() {
        
        var par = "load";
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'chatlog.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhr.onload = function () {
            

            if(this.status == 200){
                var msg = JSON.parse(this.responseText);
          
                var output = '';
          
            for(var i in msg){
                output += '<b>'+msg[i].message+'</b><br><i>'+msg[i].time+'</i><br><br>';
                }   
                document.getElementById('chat').innerHTML = output;
            }   
        }

        xhr.send(par);
        var newH = document.getElementById('chat').scrollHeight - 20;
        if (newH > old || old == null) {
            old = document.getElementById('chat').scrollHeight - 20;
            console.log(newH+' '+old);
            document.getElementById('chat').scrollTop = newH;
        }
       
    }
    setInterval(loadLog,500);
   

   
</script>

</div>
</body>

</html>