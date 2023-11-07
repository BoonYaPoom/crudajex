  <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- End Required meta tags -->
      <!-- Begin SEO tag -->
      <title>Administrator Management System</title>
      <meta property="og:title" content="">
      <meta name="author" content="Anti-corruption Education">
      <meta property="og:locale" content="th_TH">
      <meta name="description" content="">
      <meta property="og:description" content="">
      <link rel="canonical" href="">
      <meta property="og:url" content="">
      <meta property="og:site_name" content="">
      <script type="application/ld+json">
    {
      "name": $this->config->item('webname'),
        "description": $this->config->item('description'),
        "author":
        {
          "@type": "Anti-corruption Education",
          "name": "Anti-corruption Education"
        },
        "@type": "WebSite",
        "url": "",
        "headline": $this->config->item('webname'),
        "@context": ""
    }
    </script>
      <meta name="theme-color" content="#3063A0">

      <link href="{{ asset('/stylesheets/theme/stylesheets/theme.min.css') }}" rel="stylesheet" data-skin="default">
      <link href="{{ asset('/stylesheets/theme/stylesheets/theme-dark.min.css') }}" rel="stylesheet" data-skin="dark">
      <link rel="stylesheet" href="{{ asset('/stylesheets/theme/stylesheets/custom.css') }}">
      <style>
          @font-face {
              font-family: 'DB-Heavent';
              src: url('{{ asset('fonts/DB-Heavent-v3.2.1.woff2') }}') format('woff2');

          }

          body,
          h1,
          h2,
          h3,
          h4,
          h5,
          h6 {
              font-family: "DB-Heavent", sans-serif;
              font-size: 1.45rem;
          }

          .bg-infohead {
              background-color: #F04A23;
              color: rgba(255, 255, 255, 0.8);
          }

          .nav-link {
              font-size: 1.45rem;
          }

          .auth-footer {
              max-width: 520px;
          }
      </style>
      <script>
          var skin = localStorage.getItem('skin');
          var unusedLink = document.querySelector('link[data-skin]:not([data-skin="' + skin + '"])');
          unusedLink.setAttribute('rel', '');
          unusedLink.setAttribute('disabled', true);
      </script>


      <link rel="stylesheet" href="{{ asset('/stylesheets/logincss/logincss.css') }}">

  </head>
  <div class="wrapper fadeInDown">
      <div id="formContent">
          <!-- Tabs Titles -->
          <h2 class="inactive underlineHover">
              <a class="navbar-brand" href="{{ route('homelogin') }}">Sign In</a>
          </h2>
          <h2 class="active">
              <a class="navbar-brand" href="{{ route('homeregis') }}">Sign Up </a>
          </h2>

          <!-- Icon -->
          <div class="fadeIn first">
              <img src="{{ asset('logo/1690433379.png') }}" id="icon" alt="User Icon" />
          </div>

          <!-- Login Form -->
          <form action="{{ route('register-user') }}" enctype="multipart/form-data" method="post"
              accept-charset="utf-8">
              @csrf
              <span class="text-danger">
                  @error('usertype')
                      {{ $fail }}
                  @enderror
              </span>

              <input required="" type="text" class="form-control form-control-sm inputuname " id="username"
                  name="username" placeholder="Username" value="" minlength="5" maxlength="20">
              <small class="form-text text-muted">อีเมลตัวหรืออักษรอังกฤษความยาว 3-20 ตัวอักษร</small>
              <span class="text-danger">
                  @error('username')
                      {{ $message }}
                  @enderror
              </span>

              <input required="" type="password" class="form-control form-control-sm" id="password" name="password"
                  value="" placeholder="รหัสผ่าน" minlength="1" maxlength="20"><small
                  class="form-text text-muted">ตัวอักษรอังกฤษและตัวเลขความยาว
                  3-20 ตัวอักษร</small>


              <span class="text-danger">
                  @error('password')
                      {{ $message }}
                  @enderror
              </span>
              <input required="" type="password" class="form-control form-control-sm" value=""
                  id="confirm_password" name="confirm_password" placeholder="ยืนยันรหัสผ่าน" minlength="1">
              <span class="err"></span>

              <input type="submit" class="fadeIn fourth" value="Sign In">
      </div>
  </div>
  <!-- /form row -->
  <span class="text-danger">
      @error('password')
          {{ $message }}
      @enderror
  </span>







  </form>
