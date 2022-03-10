function sendEmail() {
    console.log('sending....');

    var name = $('#name');
    //var email = $('#email');
    var subject = $('#subject');
    var body = $('#body');
    var file = $('#file');

    if(isNotEmpty(name) && isNotEmpty(file) && isNotEmpty(subject) && isNotEmpty(body)){
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
               file: file.val()
           },
           success: function (response) {
               console.log(response );
               if (response.status == "success"){
                   alert('email has been sent');
               }
               else{
                   alert('please try again');
               }
               
           }
       })
    }
}


