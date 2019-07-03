//* Contact form submission
$("#form-submit").click(function () {
   var name = $("#form-name").val();
   var email = $("#form-email").val();
   var phone = $("#form-phone").val();
   var company = $("#form-company").val();
   var message = $("#form-message").val();
   $("#returnmessage").empty(); // To empty previous error/success message.
   // Checking for blank fields.
   if (name == '' || email == '' || message == '') {
      alert("Please Fill Required Fields");
   } else {
      // Returns successful data submission message when the entered information is stored in database.
      $.post("contact_form.php", {
         name1: name,
         email1: email,
         phone1: phone,
         company1: company,
         message1: message
      }, function (data) {
         $("#form-return-message").append(data); // Append returned message to message paragraph.
         if (data == "Your Query has been received, We will contact you soon.") {
            $("#form").val(''); // To reset form fields on success.
         }
      });
   }
});