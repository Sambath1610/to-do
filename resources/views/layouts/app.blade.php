<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Task Lists</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
  <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>

  <h1>@yield('title')</h1>

  <div class="container">
    @if (session()->has('success'))
      <div class="session-alert session-alert--success" role="status" aria-live="polite" id="sessionSuccess">
        <div class="session-alert__icon" aria-hidden="true">
          <!-- simple check SVG -->
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" focusable="false">
            <path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </div>

        <div class="session-alert__content">
          <strong class="session-alert__title">Success</strong>
          <div class="session-alert__message">
           {{ session('success') }}
          </div>
        </div>

        <button class="session-alert__close" aria-label="Dismiss message" id="sessionSuccessClose">
          &times;
        </button>
      </div>
    @endif
    @yield('content')
  </div>

</body>
</html>
