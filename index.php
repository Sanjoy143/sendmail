<form method="POST" id="myForm" action="sendmail.php">
  <input type="text" name="sender_name" placeholder="Name" required=""><br>
  <input type="text" name="sender_email" placeholder="Email" required=""><br>
  <input type="text" name="subject" placeholder="Subject" required=""><br>
  <textarea placeholder="Message" name="message" required=""></textarea><br>
  <input type="submit" id="sendMail" name="send" value="SEND">
  <center><span id="feedback" style="color:red; size: 2px;"></span></center>
</form>

<script type="text/javascript">
	
	/*$(document).ready(function() {
    $("#myForm").on('submit', function(event) {
        event.preventDefault(); 
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: 'sendmail.php',
            dataType: "json",
            data: formData,
            success: function(response) { 
                alert(response.success); 
            },
            error: function(xhr, status, error){
                console.log(xhr); 
            }

        });
    });
});*/


$(document).ready(function () {
//send button click
$('#sendMail').on('click', function (e) {
    e.preventDefault();
    $.post('sendmail.php', $('#myForm').serialize(), function (data) {
        //show the results if the mail was sent or not
        var res = $.parseJSON(data);

        if (res.success === true) {
           $('#feedback').html('your mail was sent');
        }
        else 
        {
           $('#feedback').html('your mail was not sent');
        }
    });
});
});
</script>