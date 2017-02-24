(function () {
  var po = document.createElement('script');
  po.type = 'text/javascript';
  po.async = false;
  po.src = 'https://apis.google.com/js/client:plusone.js';
  var s = document.getElementsByTagName('script')[0];
  s.parentNode.insertBefore(po, s);
})();

function oauth2callback(authResult) {
  if (authResult['access_token']) {
    gapi.auth.setToken(authResult);
    // Carga las bibliotecas oauth2 para habilitar los métodos userinfo.
    gapi.client.load('oauth2', 'v2', function () {
      var request = gapi.client.oauth2.userinfo.get();
      request.execute(Get_Callback);
    });
    // Autorizado correctamente
    // Oculta el botón de inicio de sesión ahora que el usuario está autorizado, por ejemplo:
    document.getElementById('signinButton').setAttribute('style', 'display: none');
  } else if (authResult['error']) {
    // Se ha producido un error.
    // Posibles códigos de error:
    //   "access_denied": el usuario ha denegado el acceso a la aplicación.
    //   "immediate_failed": no se ha podido dar acceso al usuario de forma automática.
    console.log('There was an error: ' + authResult['error']);
  }
}

function Get_Callback(obj) {
  console.log("Datos Google",obj);
  localStorage.setItem('session_google', JSON.stringify(obj));
}

function disconnectUser(access_token) {
  var revokeUrl = 'https://accounts.google.com/o/oauth2/revoke?token=' +  access_token;

  // Realiza una solicitud GET asíncrona.
  $.ajax({
    type: 'GET',
    url: revokeUrl,
    async: false,
    contentType: "application/json",
    dataType: 'jsonp',
    success: function (nullResponse) {
      // Lleva a cabo una acción ahora que el usuario está desconectado
      // La respuesta siempre está indefinida.
    },
    error: function (e) {
      // Gestiona el error
      // console.log(e);
      // Puedes indicar a los usuarios que se desconecten de forma manual si se produce un error
      // https://plus.google.com/apps
    }
  });
}
