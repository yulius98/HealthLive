<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Redirect ke WhatsApp</title>
</head>
<body>
  <p>Mohon tunggu, Anda sedang diarahkan ke WhatsApp...</p>
  
  <script>
    window.onload = function() {
      var noreg = @json($noreg);
      var message = encodeURIComponent("#" + noreg + "#\nMohon dikirimkan hasil cek mandiri");
      // Open WhatsApp link in a new tab/window
      window.location.href = "https://wa.me/6282141609391?text=" + message;
      window.open("{{ url('/') }}", "_blank");
      // Open home page in a new tab after 3 minutes (180000 ms)
      //setTimeout(function() {
      //  window.open("{{ url('www.kompas.com') }}", "_blank");
      //}, 10000 );
    };
  </script>

</body>
</html>
