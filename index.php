<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>file insert mail </title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- add  php files -->
    <?php require_once 'sendEmail.php'; ?>

    <!-- form1 -->
    <div class="container">
        <h1> fill the form to send mail </h1>
        <div class="box1" id ="box_one">
            
            <input type="text" name="name" id="name" placeholder="enter your name">

            <!-- <input type="email" name="email" id="email"  placeholder="enter your email"> -->

            <input type="text" name="subject" id="subject"  placeholder="enter your subject">

            <textarea name="body" id="body" cols="30" rows="10"  placeholder="enter the msg"></textarea>
           
            <input type = " button" onclick="sendEmail()" value="send an email" class="btn">

            <input type="file" class="classfile" name="file"  id="file" accept = ".csv">

            <input type="submit" id ="file" value="Submit" placeholder="submit"  onclick="convert()" />
            
        </div>
        <div class="box2">
            </div>
        </div>
    </div>

    <!-- script -->
    <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>

  <!-- <script src="sendto.js"></script>  -->

    <script type="text/javascript">
      function sendEmail() {
         console.log('sending....');
         var name = $('#name');
         //var email = $('#email');
         var subject = $('#subject');
         var body = $('#body');
         //var file = $('#file');

         if(isNotEmpty(name) 
        // && isNotEmpty(email) 
         && isNotEmpty(subject) && isNotEmpty(body)){
            console.log('passed condition');

            $.ajax({
                url: 'sendEmail.php',
                method: 'POST',
                dataType: 'json',
                data:{
                    name: name.val(),
                    //email: email.val(),
                    subject: subject.val(),
                    body: body.val(),
                    //file: file.val()
                }
               
            })
         }
     }

     function isNotEmpty(caller) {
         if(caller.val() ==""){
             caller.css('border', '1px solid red');
             return false;
         }
         else
            caller.css('border', '');
            return true;
     }
    </script>

  <script src="csvreader.js"></script>


  
</body>
</html>