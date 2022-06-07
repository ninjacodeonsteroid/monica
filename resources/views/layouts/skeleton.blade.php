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
      amplitude.getInstance().logEvent('Home Page Visited');
    </script>
    <script type="text/javascript">
(function(f,b){if(!b.__SV){var e,g,i,h;window.mixpanel=b;b._i=[];b.init=function(e,f,c){function g(a,d){var b=d.split(".");2==b.length&&(a=a[b[0]],d=b[1]);a[d]=function(){a.push([d].concat(Array.prototype.slice.call(arguments,0)))}}var a=b;"undefined"!==typeof c?a=b[c]=[]:c="mixpanel";a.people=a.people||[];a.toString=function(a){var d="mixpanel";"mixpanel"!==c&&(d+="."+c);a||(d+=" (stub)");return d};a.people.toString=function(){return a.toString(1)+".people (stub)"};i="disable time_event track track_pageview track_links track_forms track_with_groups add_group set_group remove_group register register_once alias unregister identify name_tag set_config reset opt_in_tracking opt_out_tracking has_opted_in_tracking has_opted_out_tracking clear_opt_in_out_tracking start_batch_senders people.set people.set_once people.unset people.increment people.append people.union people.track_charge people.clear_charges people.delete_user people.remove".split(" ");
for(h=0;h<i.length;h++)g(a,i[h]);var j="set set_once union unset remove delete".split(" ");a.get_group=function(){function b(c){d[c]=function(){call2_args=arguments;call2=[c].concat(Array.prototype.slice.call(call2_args,0));a.push([e,call2])}}for(var d={},e=["get_group"].concat(Array.prototype.slice.call(arguments,0)),c=0;c<j.length;c++)b(j[c]);return d};b._i.push([e,f,c])};b.__SV=1.2;e=f.createElement("script");e.type="text/javascript";e.async=!0;e.src="undefined"!==typeof MIXPANEL_CUSTOM_LIB_URL?
MIXPANEL_CUSTOM_LIB_URL:"file:"===f.location.protocol&&"//cdn.mxpnl.com/libs/mixpanel-2-latest.min.js".match(/^\/\//)?"https://cdn.mxpnl.com/libs/mixpanel-2-latest.min.js":"//cdn.mxpnl.com/libs/mixpanel-2-latest.min.js";g=f.getElementsByTagName("script")[0];g.parentNode.insertBefore(e,g)}})(document,window.mixpanel||[]);

// Enabling the debug mode flag is useful during implementation,
// but it's recommended you remove it for production
mixpanel.init('fa088c1c31b00ec2a1df0dea9a8344bb', {debug: true}); 
mixpanel.track('Home Page Visited');
</script>
<script src="//fast.appcues.com/99701.js"></script>
<script type="text/javascript">
Appcues.page();
Appcues.identify("ZQhjWvTRBjZMCr4xecDucKeJY5K5JgWmXRvwbYdC9PfB6UJVWcZKyQjnKTh6MQgmxntkcwMWbD9SpuqWhZxFFtTgbMczt5KBg4L5a9CWqBrpVEa4vjkMB4TpsGzKB9WHNyqPxRnLjDZQTLvZUEC7km7BSwW5vJpU7CkvkxReLGFwjZmPvNyEKvSdQE8Ve7sWAB3wKKmm3RtWtDCMgL4C6LFx2qhRnAEMMxTn75kZxCMPSZcKBRdhdJE6KzMWY3kn", {
    name: "Ninja Buddy",
    "custom_1": "ABC"
});
</script>
<script type="text/javascript">
!function(e){if(!e.navigate){e.navigate={},e.navigate.customerId=null,e.navigate.userId=null,e.navigate.accountId=null,e.navigate.config={pageAutoTrack:!1,eventAutoTrack:!1},e.isScriptLoaded=!1,e.navigate.queue=[],e.navigate.initialize=function(t,n,a,i){e.navigate.customerId=t||e.navigate.customerId,e.navigate.userId=n||e.navigate.userId,e.navigate.accountId=a||e.navigate.accountId,e.navigate.config=i||e.navigate.config},e.navigate.onload=function(t){isScriptLoaded?t():e.navigate.queue.push(t)};var t=function(e){return"UserNavigate script is not loaded yet, Please run "+e+" function in initialize callback."};e.navigate.identifyUser=function(e,n){console.warn(t("identifyUser"))},e.navigate.identifyAccount=function(e,n){console.warn(t("identifyAccount"))},e.navigate.trackPage=function(){console.warn(t("trackPage"))},e.navigate.trackEvent=function(e,n){console.warn(t("trackEvent"))},e.addEventListener("load",(function(){var t=e.document.createElement("script");t.type="text/javascript",t.async=!0,t.src="https://cdn.usernavigate.com/cdn/scripts/navigate.js",t.addEventListener("load",(function(){e.navigate.isScriptLoaded=!0;for(var t=0;t<e.navigate.queue.length;t++){(0,e.navigate.queue[t])()}e.navigate.queue=[]}),!1),e.document.getElementsByTagName("head")[0].appendChild(t)}),!1),e.addEventListener("message",(function(t){var n,a,i,c,o;"http://localhost:3000"===t.origin&&(n="un-studio",a="position:fixed;z-index: 999999;top: 0;left: 0;height: 100vh; box-shadow: 0 3px 6px 0 rgba(8, 15, 52, 0.16);",(i=e.document.createElement("div")).id=n,i.setAttribute("style",a),e.document.getElementsByTagName("body")[0].prepend(i),function(t){var n=e.document.createElement("link");n.rel="stylesheet",n.href=t,e.document.getElementsByTagName("head")[0].appendChild(n)}("https://cdn.usernavigate.com/cdn/scripts/studio.css"),c="https://cdn.usernavigate.com/cdn/scripts/studio.js",(o=e.document.createElement("script")).type="text/javascript",o.async=!0,o.src=c,e.document.getElementsByTagName("head")[0].appendChild(o),console.log(t.data))}))}}(window);
window.navigate.initialize("12408038199656448");
window.navigate.onload(function() {
  window.navigate.identifyUser("User1", {"email": "abc@acme.com"});
});
</script>
<!-- Gainsight PX Tag-->
<script type="text/javascript">
  (function(n,t,a,e,co){var i="aptrinsic";n[i]=n[i]||function(){
      (n[i].q=n[i].q||[]).push(arguments)},n[i].p=e;n[i].c=co;
    var r=t.createElement("script");r.async=!0,r.src=a+"?a="+e;
    var c=t.getElementsByTagName("script")[0];c.parentNode.insertBefore(r,c)
  })(window,document,"https://web-sdk.aptrinsic.com/api/aptrinsic.js","AP-AWPL32CQ7K9C-2");
  aptrinsic("identify", {"id": "abc@acme.com", "email": "abc@acme.com"})
</script>
<!-- Gainsight PX Tag-->
<script>
  (function(g,u,i,d,e,s){g[e]=g[e]||[];var f=u.getElementsByTagName(i)[0];var k=u.createElement(i);k.async=true;k.src='https://static.userguiding.com/media/user-guiding-'+s+'-embedded.js';f.parentNode.insertBefore(k,f);if(g[d])return;var ug=g[d]={q:[]};ug.c=function(n){return function(){ug.q.push([n,arguments])};};var m=['previewGuide','finishPreview','track','identify','triggerNps','hideChecklist','launchChecklist'];for(var j=0;j<m.length;j+=1){ug[m[j]]=ug.c(m[j]);}})(window,document,'script','userGuiding','userGuidingLayer','932062729ID'); 
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
