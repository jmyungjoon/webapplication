document.cookie = "safeCookie1=foo; SameSite=Lax";
    document.cookie = "safeCookie2=foo";
    document.cookie = "crossCookie=bar; SameSite=None; Secure";
    function onSignIn(googleUser) {
      var profile = googleUser.getBasicProfile();
      // console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
      // console.log('Name: ' + profile.getName());
      // console.log('Image URL: ' + profile.getImageUrl());
      // console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
      // console.log(profile.getId());
      log_id = profile.getId();
      if(log_id != "") { 
        func_confirm();
        } else { }
      }
      function func_confirm(){
                if(confirm('You are loged in Google Account. Do you want use it?')){
                  window.location.href = "index.php";
                } else {
                }
            }