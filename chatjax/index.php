<<<<<<< HEAD:chatjax/index.php
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
    <div id="chat" style="overflow-y:scroll;height: 300px;"></div>
    
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
=======
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
    <script src="chat.js"></script>

<div id = "chatWindow">

    <h1>PSPS Chat</h1>
    <div id="messages" style="overflow-y:scroll;height: 300px;"></div>
    
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
                output += '<div class = "message"><b>'+msg[i].message+'</b><br><i>'+msg[i].time+'</i><br><br></div>';
                }   
<<<<<<< HEAD

                document.getElementById('messages').innerHTML = output;
=======
                document.getElementById('chat').innerHTML = output;
>>>>>>> acf4d024df82cde3e5700062f554339d8c793cc1
            }   
        }

        xhr.send(par);
<<<<<<< HEAD
        var elem = document.getElementById('messages');
        elem.scrollTop = elem.scrollHeight;
=======
        var newH = document.getElementById('chat').scrollHeight - 20;
        if (newH > old || old == null) {
            old = document.getElementById('chat').scrollHeight - 20;
            console.log(newH+' '+old);
            document.getElementById('chat').scrollTop = newH;
        }
       
>>>>>>> acf4d024df82cde3e5700062f554339d8c793cc1
    }
    setInterval(loadLog,500);
   

   
</script>

</div>

</body>
>>>>>>> 780d50c34dd83450e1339448770bce81a68a10f7:chatjax/index.html
</html>