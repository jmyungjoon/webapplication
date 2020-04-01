function checkLoginStatus(){
    var loginBtn = document.querySelector('#loginBtn');
    if(gauth.isSignedIn.get()){
      console.log('logined');
      loginBtn.value = 'Logout';
    } else {
      console.log('logouted');
      loginBtn.value = 'Login';
    }
  }
function init(){
    console.log('init');
    gapi.load('auth2', function() {
      console.log('auth2');
      gauth = gapi.auth2.init({
          client_id:'721638147870-mf9nstb3krm944g543099vf32vl8jro3.apps.googleusercontent.com'
      })
      gauth.then(function(){
        console.log('googleAuth success');
        checkLoginStatus();
      }, function(){
        console.log('googleAuth fail');
      });
    });
}