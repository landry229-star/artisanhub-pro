<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<style>
  body{margin:0;padding:0;background:#F8F9FA;font-family:'Helvetica Neue',Arial,sans-serif;color:#0B2545}
  .wrapper{max-width:580px;margin:32px auto;background:#FFFFFF;border-radius:16px;overflow:hidden;box-shadow:0 4px 24px rgba(11,37,69,.08)}
  .header{background:linear-gradient(135deg,#0B2545,#0B2545);padding:28px 32px;text-align:center}
  .logo img{display:block;width:112px;height:112px;object-fit:contain;border-radius:12px;margin:0 auto}
  .logo span{color:#0B2545}
  .body{padding:32px}
  .title{font-size:20px;font-weight:bold;margin:0 0 8px;color:#0B2545}
  .subtitle{font-size:14px;color:#64748B;margin:0 0 24px}
  .info-box{background:#F8F9FA;border-radius:10px;padding:16px 20px;margin:20px 0}
  .info-row{display:flex;justify-content:space-between;margin-bottom:6px;font-size:13px}
  .info-label{color:#64748B}
  .info-value{font-weight:600;color:#0B2545;text-align:right;max-width:60%}
  .amount{font-size:24px;font-weight:bold;color:#0B2545;text-align:center;margin:16px 0 4px}
  .amount-label{text-align:center;font-size:12px;color:#64748B;margin-bottom:16px}
  .btn{display:block;width:fit-content;margin:24px auto;padding:12px 32px;background:#FF6B35;color:#0B2545!important;text-decoration:none;border-radius:8px;font-weight:700;font-size:14px;text-align:center}
  .divider{border:none;border-top:1px solid #DDE3EA;margin:24px 0}
  .footer{background:#F8F9FA;padding:20px 32px;text-align:center;font-size:12px;color:#64748B}
  .footer a{color:#0B2545;text-decoration:none}
  p{font-size:14px;line-height:1.7;margin:0 0 14px;color:#294361}
  .badge{display:inline-block;padding:3px 10px;border-radius:100px;font-size:12px;font-weight:600}
  .badge-pending{background:#FFF3CD;color:#856404}
  .badge-success{background:#E6F7F5;color:#0B2545}
  .badge-danger{background:#FCE7EA;color:#E71D36}
</style>
</head>
<body>
<div class="wrapper">
  <div class="header">
    <div class="logo"><img src="{{ asset('images/artisanhub-pro-logo.jpg') }}" alt="ArtisanHub Pro"></div>
    <div style="color:#CBD5E1;font-size:12px;margin-top:4px">Plateforme artisans Bénin 🇧🇯</div>
  </div>
  <div class="body">
    @yield('content')
  </div>
  <div class="footer">
    <p style="margin:0 0 6px">© 2026 ArtisanHub Pro · Bénin</p>
    <p style="margin:0">
      <a href="{{ config('app.url') }}">artisanhub.bj</a> ·
      <a href="{{ route('support') }}">Support</a>
    </p>
  </div>
</div>
</body>
</html>
