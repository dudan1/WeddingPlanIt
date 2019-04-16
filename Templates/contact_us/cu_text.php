<!-- *** PLease note that javaScript herein was supplied by EmailJS mail handler, http;//www.emailjs.com *** -->
<main>

    <div class = "bg-text3">

        <H1>Contact Us</H1>
        <H2>Please submit a query:</H2>

        <form id="myform" onsubmit="emailjs.sendForm('outlook', 'Outlook_Contact_Us', this); return false;" method="post">
            <p align="left"><textarea rows="4" cols="40" required name="message_html" placeholder="Type your query here..."></textarea></p>
            <p align="left">Your name: <textarea rows="1" cols="23" required name="from_name" maxlength="30"></textarea></p>
            <p align="left">Your email: <input type="email" required name="reply_to" maxlength="60"></p>

            <button type="submit">Submit details</button>

            <button type="button" onclick="location.href='index.php';" class="cancelbtn">Cancel</button>
        </form>
        <hr/>
        <p>Or via email:</p>
        <p><a style="background-color: blanchedalmond" href="mailto:0006664@rgu.ac.uk?subject=Wedding PlanIt Customer Query">Email: WPSupport@rgu.ac.uk</a></p>

    </div>
</main>
<script type="text/javascript" src="https://cdn.emailjs.com/sdk/2.3.2/email.min.js"></script>
<script type="text/javascript">
    (function(){
        emailjs.init("user_LFwLsmo7J3ufzDn6n6g3j");
    })();
</script>