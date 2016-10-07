var googleUser = {};

 var startApp = function() {
  	console.log("Startin app");
    gapi.load('auth2', function(){
      // Retrieve the singleton for the GoogleAuth library and set up the client.
      auth2 = gapi.auth2.init({
        client_id: '833122714001-dpnlqanm3n5pkeqme6q0tl6pppo5uq67.apps.googleusercontent.com',
        cookiepolicy: 'single_host_origin',
        scope: 'profile'
      });
      attachSignin(document.getElementById('googleplus'));
    });
  };

  function attachSignin(element) {
    console.log(element.id);
    auth2.attachClickHandler(element, {},
        function(googleUser) {
          $.ajax( {
			type: "POST",
			url: "../back-end/set-session-var.php",
			data: "name=" + googleUser.getBasicProfile().getName(),
			success: function(msg) {
				 window.location = "http://localhost/CAPS/";
			},
			error: function(msg) {
				alert("There was a problem loading a page.");
				window.location = "http://localhost/CAPS/";
			}
		});
        }, function(error) {
          alert(JSON.stringify(error, undefined, 2));
        });
  };