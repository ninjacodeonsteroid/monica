<!DOCTYPE html>
<html lang="{{ \App::getLocale() }}" dir="{{ htmldir() }}">
  <head>
    <base href="{{ url('/') }}/" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>@yield('title', trans('app.application_title'))</title>
    <link rel="manifest" href="manifest.webmanifest">

    <link rel="stylesheet" href="{{ asset(mix('css/app-'.htmldir().'.css')) }}">
    {{-- Required only for the Upgrade account page --}}
    @if (Route::currentRouteName() == 'settings.subscriptions.upgrade' || Route::currentRouteName() == 'settings.subscriptions.confirm')
      <link rel="stylesheet" href="{{ asset(mix('css/stripe.css')) }}">
    @endif

    <link rel="shortcut icon" href="img/favicon.png">

    <meta name="apple-mobile-web-app-title" content="Monica">
    <link rel="apple-touch-icon" href="img/icons/touch-icon-iphone.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/icons/touch-icon-ipad.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/icons/touch-icon-iphone-retina.png">
    <link rel="apple-touch-icon" sizes="167x167" href="img/icons/touch-icon-ipad-retina.png">

    <meta name="application-name" content="Monica">
    <link rel="shortcut icon" sizes="196x196" href="img/icons/favicon-196.png">

    <script>
      window.Laravel = {!! \Safe\json_encode([
          'locale' => \App::getLocale(),
          'htmldir' => htmldir(),
          'profileDefaultView' => auth()->user()->profile_active_tab,
          'timezone' => auth()->user()->timezone,
          'env' => \App::environment(),
      ]); !!}
    </script>
    @if(!empty(auth()->user()))
    <script>
(function(apiKey){
    (function(p,e,n,d,o){var v,w,x,y,z;o=p[d]=p[d]||{};o._q=o._q||[];
    v=['initialize','identify','updateOptions','pageLoad','track'];for(w=0,x=v.length;w<x;++w)(function(m){
        o[m]=o[m]||function(){o._q[m===v[0]?'unshift':'push']([m].concat([].slice.call(arguments,0)));};})(v[w]);
        y=e.createElement(n);y.async=!0;y.src='https://cdn.pendo.io/agent/static/'+apiKey+'/pendo.js';
        z=e.getElementsByTagName(n)[0];z.parentNode.insertBefore(y,z);})(window,document,'script','pendo');

        // Call this whenever information about your visitors becomes available
        // Please use Strings, Numbers, or Bools for value types.
        pendo.initialize({
            visitor: {
                id:              "{{ auth()->user()->id }}",
                email:        "{{ auth()->user()->email }}"
            }
        });
})('bfa439b6-ec51-4cdc-408f-68d8cd70ebe0');
</script>
    @endif
  </head>
  <body data-account-id="{{ auth()->user()->account_id }}" class="bg-gray-monica min-vh-100 flex flex-column">

    <div id="app" class="flex-grow-1">
      @if (Route::currentRouteName() != 'settings.subscriptions.confirm')
        @include('partials.header')
        @include('partials.subscription')
      @endif
      @yield('content')
    </div>

    @if (Route::currentRouteName() != 'settings.subscriptions.confirm')
      @include('partials.footer')
    @endif

    {{-- THE JS FILE OF THE APP --}}
    @push('scripts')
      <script src="{{ asset(mix('js/manifest.js')) }}"></script>
      <script src="{{ asset(mix('js/vendor.js')) }}"></script>
    @endpush

    {{-- Load everywhere except on the Upgrade account page --}}
    @if (Route::currentRouteName() != 'settings.subscriptions.upgrade' && Route::currentRouteName() != 'settings.subscriptions.confirm')
      @push('scripts')
        <script src="{{ asset(mix('js/app.js')) }}"></script>
      @endpush
    @endif

    @stack('scripts')

  </body>
</html>
