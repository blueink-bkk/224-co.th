<!DOCTYPE html>
<html lang="en">
   <head>
      <title> Blue Ink Co.Ltd bangkok </title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

	  <?php include('head.php'); ?>

   </head>
   <body>

	  <?php include('header.php'); ?>

      <div class="container-fluid top-space">
         <div class="container">
            <div class="row reverse-mob">
               <div class="col-lg-12 col-md-12 order-des pb-3">
                  <div>
                     <h1 class="pb-2"> Contact Us </h1>
                     <div class=" mb-3">
                        <p>Valued Customer,<br>
                           The Increase in SPAM emails obligned us to take some prevention measures so we can keep offering you the shortest answering time and best services,
                        </p>

                        <p> <b> Please email your question and we will respond within 24 hours.</b> </p>

                        <p id="mail-success" class="form-msg no-display">
								             The email has been successfully sent, thank you.
                        </p>
                        <p id="mail-error" class="form-msg no-display">
								             mail not send - try again.
                        </p>


                           <form id="forward-message"
                           method="post"
                           enctype="multipart/form-data"
                           class="email-form"
                           action="/api/email-forward"
                           >

                                 <div class="row">
                                    <div class="col-md-6">
                                       <input type="text" id="uname" class="form-control"  name="uname" placeholder="Your name"><label id="dis"></label>
                                    </div>
                                    <div class="col-md-6">
                                       <input type="text" id="email" class="form-control" name="email" placeholder="Your E-mail"><label id="dis1"></label>
                                    </div>
                                    <div class="col-md-12">
                                       <input type="text" id="phone" class="form-control" name="phone" placeholder="Your Phone"><label id="dis2"></label>
                                    </div>
                                    <div class="col-md-12">
                                       <input type="text" id="subject" class="form-control" name="subject" placeholder="Subject"><label id="dis3"></label>
                                    </div>
                                    <div class="col-md-12">
                                      <textarea rows="5" id="message" class="form-control" name="message" placeholder="Your message:(Maximum 4000 characters)" ></textarea><label id="dis4"></label>
                                    </div>
                                   <div class="col-md-12">
                                       <div class="g-recaptcha" id="captcha" data-sitekey="6LeleLoUAAAAAHD7JJqJ7UWgFo-lDvOz4J0YQ5Vn"></div> <label id="dis5"></label>
                                    </div>
                                    <div class="col-md-12">
                                       <input type="submit" name="submit" id="submit" class="form-control" value="submit">
                                    </div>
                                 </div>

                           </form>



                     </div>
                  </div>


               </div>
            </div>
         </div>
      </div>

	<?php include('footer.php'); ?>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<script type="text/javascript">
function ValidateEmail(email) {
      var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
      return expr.test(email);
}
function ValidateUsername(uname){
 var expr=/^[a-zA-Z0-9_ ]{3,30}$/;
 return expr.test(uname);
}
function ValidateMobile(phone){
 var expr=/^[0-9 -.\s?]{10,19}$/;
 return expr.test(phone);
}
</script>




<script type="text/javascript">
function validate_Email() {
  var username=$('#uname').val();
  var email=$('#email').val();
  var mobile=$('#phone').val();
  var subject=$('#subject').val();
  var message=$('#message').val();

    //User name validate...
    if (false) {
      if(username==""){
       $('#dis').fadeIn().html('<span id="error">Name cannot be empty.</span>');
       return false;
      }else if(!ValidateUsername(username)){
       $('#dis').fadeIn().html('<span id="error">Please check and re-enter.</span>');
       return false;
      }else{
       $('#dis').fadeOut();
      }

    }

  //E-mail validate..
  if(email==""){
   $('#dis1').fadeIn().html('<span id="error">Email address cannot be empty.</span>');
   return false;
  }else if (!ValidateEmail(email)) {
           //alert("Invalid email address.");
     $('#dis1').fadeIn().html('<span id="error">Please check and re-enter.</span>');
   return false;
  }else{
   $('#dis1').fadeOut();
  }


  /********************
  //Mobile validate
  if(mobile==""){
   $('#dis2').fadeIn().html('<span id="error">Telephone number cannot be empty.</span>');
   return false;
  }else if(!ValidateMobile(mobile)){
   $('#dis2').fadeIn().html('<span id="error">Wrong number, start again.</span>');
   return false;
  }else{
   $('#dis2').fadeOut();
  }
  ***************/

  //Subject validate
  if(subject==""){
   $('#dis3').fadeIn().html('<span id="error">Subject cannot be empty, please check and re-enter. </span>');
   return false;
  }else{
   $('#dis3').fadeOut();
  }

  //Message validate
  if(message==""){
   $('#dis4').fadeIn().html('<span id="error">Text cannot be empty, please check and re-enter.</span>');
   return false;
  }else{
   $('#dis4').fadeOut();
  }

  //Captcha validate
  if(grecaptcha.getResponse() == "") {
    $('#dis5').fadeIn().html('<span id="error">Captcha is required.</span>');
  return false;
  } else {
    $('#dis5').fadeOut();
  }

  return true;
}; // validate_Email


document.addEventListener("DOMContentLoaded", function(event) {
  console.log('DOMContentLoaded.')
  document.forms['forward-message'].addEventListener('submit', (event) => {
    event.preventDefault();
    console.log('Entering submit function.')
    // TODO do something here to show user that form is being submitted
//      const action = event.target.action;
//      const action = 'http://localhost:3000/'

    $('p#mail-error').addClass('no-display')

    if (!validate_Email()) {
      return;
    }

//      const action = '/email-forward' ; //event.target.action;
    const fdata = new FormData(event.target);
    for(var pair of fdata.entries()) {
      console.log(pair[0]+ ', '+ pair[1]);
    }

    const _uname = fdata.get('uname')
    const _email = fdata.get('email')
    const _phone = fdata.get('phone')
    const _subject = fdata.get('subject')
    const _msg1 = fdata.get('message')

    const msg2 = `
    <br>
    <div>
    <b>From :</b> ${_uname}
    </div>

    <br>
    <div>
    <b>email address :</b>
    <a href="mailto:${_email}?subject=RE: ${_subject}">
    ${_email}
    </a>
    </div>

    <br>
    <div>
    <b>phone :</b> ${_phone}
    </div>

    <br>
    <div>
    <b>subject :</b> ${_subject}
    </div>

    <br>
    <div>
    <p style="margin:20px; background-color:rgb(230,250,230); max-width:600px; padding:10px; min-height:100px;">
    ${_msg1.replace(/\n/g,'<br>\n')}
    </p>
    </div>
    `;


    fdata.set('message', msg2)

    fetch(event.target.action, {
      method: 'POST',
      body: new URLSearchParams(fdata) // event.target is the form
    }).then((resp) => {
      console.log({resp})
      return resp.json(); // or resp.text() or whatever the server sends
    }).then((retv) => {
      console.log({retv})
      if (retv.error) {
        $('p#mail-error').removeClass('no-display')
      } else {
        $('p#mail-success').removeClass('no-display')
        $('input#submit').addClass('no-display')
      }
    // TODO handle body
    }).catch((error) => {
      console.log({error})
      //error(error)
    // TODO handle error
    });
    return false;
  });

});


</script>





    </body>
</html>
