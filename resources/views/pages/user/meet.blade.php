@extends('layouts.appUser')
@section('contentUser')
        <title>Laravel</title>
        <script src='https://meet.jit.si/external_api.js'></script>
            <script type= "text/javascript">
                const domain = 'meet.jit.si';
            function codeAddress(){
                const options = {
                    roomName: 'JitsiMeetAPIExample',
                    width: 600,
                    height: 600,
                    parentNode: document.querySelector('#meet'),
                    lang: 'de'
                };
                const api = new JitsiMeetExternalAPI(domain, options);
            }
            window.onload= codeAddress;
        </script>

    </head>
    <body>
        <div id="meet"/ >

@endsection
