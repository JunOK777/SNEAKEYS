$(document).ready(function () {
    $("#contactForm-1").submit(function (event) {
  let name    = $('#name').val();
  let email   = $('#email').val();
  let message = $('#message').val();

    $.ajax({
        url: 'https://docs.google.com/forms/d/e/1FAIpQLSdevTN3k6Vzo4o4EJVRzePpzZmzaYzZEsVGYlg8bVCYf0FOwg/formResponse',
        data: {'entry.746374166': name, 'entry.1558582620': email, 'entry.1679652808': message},
        type: 'POST',
        dataType: 'html',
        statusCode: {
          0: function() {
            alert('success!')

            $('#name').val('');
            $('#email').val('');
            $('#message').val('');

          },
          200: function() {
            alert('success')
          },
          400: function() {
            alert('fail')
          }
        }
    });
    event.preventDefault();
  });
});