<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('softui/assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('softui/assets/img/favicon.png') }}">
    <title>
        {{ config('app.name') }}
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('softui/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('softui/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('softui/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('softui/assets/css/soft-ui-dashboard.css?v=1.0.7') }}" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="{{ config('app.url') }}" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .filter-bar-vessel {
            list-style-type: none;
            padding-left: 0;
            /* display: flex; */
        }

        .filter-bar-vessel .filter-item {
            display: inline-block;
        }

        .filter-bar-vessel .filter-item.search-bar {
            display: block !important;
        }

        .filter-bar-vessel .filter-item {
            width: 100%;
            margin: 5px 0px;
        }

        .filter-bar-vessel>section {
            width: 100%;
        }

        .filter-bar-vessel .filter-item .custom-dropdown button,
        .filter-bar-vessel .filter-item button {
            width: 100% !important;
        }

        .error-list {
            list-style-type: none;
            padding: 0;
        }
    </style>
</head>
