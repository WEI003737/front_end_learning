<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fblogin</title>
</head>
<body>
    <script>
      window.fbAsyncInit = function() {
          FB.init({
          appId      : '{app_id}',
          cookie     : true,
          xfbml      : true,
          version    : 'v7.0'
          });
          
          // FB.AppEvents.logPageView();

          FB.getLoginStatus(function(response) {
              console.log(response);
              var access_token = "";
              if (response.authResponse) {
                  access_token = response.authResponse.accessToken;
                  FB.api('/me', {fields: 'id, name, email, token_for_business'}, function(response) {
                  // FB.api('/me',  {fields: 'id, name, email'}, function(response) {
                      fb_valid(response, access_token);
                  });
              }
          }, true);
      };
      (function(d, s, id){
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) {return;}
          js = d.createElement(s); js.id = id;
          js.src = "https://connect.facebook.net/zh_TW/sdk.js";
          fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
  </script>
  <!--fb:login-button scope="public_profile,email" onlogin="checkLoginState();"></fb:login-button-->
  <input type="button" id="FBLOGIN" value="FB_LOGIN">
  <div id="status"></div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script>
      function fb_chk() {
          FB.getLoginStatus(function(response) {
              var access_token = "";
              console.log(response);
              if (response.authResponse) {
                  access_token = response.authResponse.accessToken;
                  FB.api('/me', {fields: 'id, name, email, token_for_business'}, function(response) {
                  // FB.api('/me',  {fields: 'id, name, email'}, function(response) {
                      fb_valid(response, access_token);
                  });
              } else {
                  fb_login();
              }
          }, true);
      };
      function fb_login() {
          var locationStr = "https://www.facebook.com/v7.0/dialog/oauth?response_type=code,token&client_id={app_id}&redirect_uri={導向url}&scope=email";
          top.location = locationStr;
      };
      function fb_valid(response, accessToken) {
          var id = response.id;
          var token_for_business = "";
          if (response.token_for_business) {
              token_for_business = response.token_for_business;
          }
          var name = "";
          if (response.name) {
              name = response.name;
          }
          var email = "";
          if (response.email) {
              email = response.email;
          }
          var birth = "";
          if (response.birthday) {
              birth = response.birthday;
          }
          var location = "";
          if (response.location) {
              location = response.location.name;
          }
          var gender = "";
          if (response.gender) {
              gender = (response.gender=='male')?'M':'F';
          }
          var imageUrl = 'http://graph.facebook.com/' + response.id + '/picture';
          $.ajax({
              url: "/{api.php}?code="+accessToken,
              type: "GET",
              error: function() {
                  alert('系統忙碌中');
              },
              success: function() {
                  alert('系統健康中');
              }
          });
      };
      $(function() {
          $("input#FBLOGIN").on("click", function() {
              fb_chk();
          })
      });

  </script>
</body>
</body>
</html>