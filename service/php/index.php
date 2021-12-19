<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title>Service app</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <h2 style="margin-left:20px;">Service App - keycloak integration</h2>
            </div>
            <div class="list-group">
                <button onclick="logout()" class="btn btn-danger">Logout</button>
                <div class="list-group-item">
                      <div class="media">
                          <div class="media-body" style="border-bottom: 0.5px solid #9999;">
                              <pre id="token"></pre>
                          </div>
                      </div>
                    <br>
                </div>
            </div>
        </div>
        <script src="http://localhost/auth/js/keycloak.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/js-cookie@beta/dist/js.cookie.min.js"></script>
        <script type="text/javascript">
            const keycloak = Keycloak('http://localhost/keycloak.json')
            const initOptions = {
                responseMode: 'fragment',
                flow: 'standard',
                onLoad: 'login-required'
            };
            function logout(){
                Cookies.remove('token');
                keycloak.logout();
            }
            keycloak.init(initOptions).success(function(authenticated) {
                Cookies.set('token', keycloak.token);
                document.getElementById("token").textContent = JSON.stringify(keycloak.tokenParsed, undefined, 2);
                console.log('Init Success (' + (authenticated ? 'Authenticated token : '+JSON.stringify(keycloak) : 'Not Authenticated') + ')');
            }).error(function() {
                console.log('Init Error');
            });
        </script>
    </body>
</html>
