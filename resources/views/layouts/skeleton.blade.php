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
    <script type="text/javascript">
      window.heap=window.heap||[],heap.load=function(e,t){window.heap.appid=e,window.heap.config=t=t||{};var r=document.createElement("script");r.type="text/javascript",r.async=!0,r.src="https://cdn.heapanalytics.com/js/heap-"+e+".js";var a=document.getElementsByTagName("script")[0];a.parentNode.insertBefore(r,a);for(var n=function(e){return function(){heap.push([e].concat(Array.prototype.slice.call(arguments,0)))}},p=["addEventProperties","addUserProperties","clearEventProperties","identify","resetIdentity","removeEventProperty","setEventProperties","track","unsetEventProperty"],o=0;o<p.length;o++)heap[p[o]]=n(p[o])};
      heap.load("2276171536");
    </script>
    <script type="text/javascript">
      (function(e,t){var n=e.amplitude||{_q:[],_iq:{}};var r=t.createElement("script")
      ;r.type="text/javascript"
      ;r.integrity="sha384-tzcaaCH5+KXD4sGaDozev6oElQhsVfbJvdi3//c2YvbY02LrNlbpGdt3Wq4rWonS"
      ;r.crossOrigin="anonymous";r.async=true
      ;r.src="https://cdn.amplitude.com/libs/amplitude-8.5.0-min.gz.js"
      ;r.onload=function(){if(!e.amplitude.runQueuedFunctions){
      console.log("[Amplitude] Error: could not load SDK")}}
      ;var i=t.getElementsByTagName("script")[0];i.parentNode.insertBefore(r,i)
      ;function s(e,t){e.prototype[t]=function(){
      this._q.push([t].concat(Array.prototype.slice.call(arguments,0)));return this}}
      var o=function(){this._q=[];return this}
      ;var a=["add","append","clearAll","prepend","set","setOnce","unset","preInsert","postInsert","remove"]
      ;for(var c=0;c<a.length;c++){s(o,a[c])}n.Identify=o;var u=function(){this._q=[]
      ;return this}
      ;var l=["setProductId","setQuantity","setPrice","setRevenueType","setEventProperties"]
      ;for(var p=0;p<l.length;p++){s(u,l[p])}n.Revenue=u
      ;var d=["init","logEvent","logRevenue","setUserId","setUserProperties","setOptOut","setVersionName","setDomain","setDeviceId","enableTracking","setGlobalUserProperties","identify","clearUserProperties","setGroup","logRevenueV2","regenerateDeviceId","groupIdentify","onInit","logEventWithTimestamp","logEventWithGroups","setSessionId","resetSessionId"]
      ;function v(e){function t(t){e[t]=function(){
      e._q.push([t].concat(Array.prototype.slice.call(arguments,0)))}}
      for(var n=0;n<d.length;n++){t(d[n])}}v(n);n.getInstance=function(e){
      e=(!e||e.length===0?"$default_instance":e).toLowerCase()
      ;if(!Object.prototype.hasOwnProperty.call(n._iq,e)){n._iq[e]={_q:[]};v(n._iq[e])
      }return n._iq[e]};e.amplitude=n})(window,document);
      amplitude.getInstance().init("2eb52f0b0d9614ce348b98fae8d6e3e4");
    </script>
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
