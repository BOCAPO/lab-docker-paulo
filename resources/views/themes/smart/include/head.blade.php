<meta charset="utf-8">

<title>{{env('APP_TITLE')}}</title>

<meta name="description" content="{{env('APP_TITLE')}}">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
<!-- Call App Mode on ios devices -->
<meta name="apple-mobile-web-app-capable" content="yes" />
<!-- Remove Tap Highlight on Windows Phone IE -->
<meta name="msapplication-tap-highlight" content="no">
<!-- base css -->
<link id="vendorsbundle" rel="stylesheet" media="screen, print" href="/assets/theme/smartadmin/css/vendors.bundle.css">
<link id="appbundle" rel="stylesheet" media="screen, print" href="/assets/theme/smartadmin/css/app.bundle.css">
<link id="mytheme" rel="stylesheet" media="screen, print" href="#">
<link id="myskin" rel="stylesheet" media="screen, print" href="/assets/theme/smartadmin/css/skins/skin-master.css">
<link id="myskin" rel="stylesheet" media="screen, print" href="/assets/theme/smartadmin/css/skins/skin-orange.css">

<!-- Place favicon.ico in the root directory -->
@include('themes.smart.include.favicon')

<link rel="stylesheet" media="screen, print" href="/assets/theme/smartadmin/css/datagrid/datatables/datatables.bundle.css">
<link rel="stylesheet" media="screen, print" href="/assets/theme/smartadmin/css/notifications/sweetalert2/sweetalert2.bundle.css">

@yield('style')

@livewireStyles
