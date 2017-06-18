<!DOCTYPE html>
<html>
    <head>
        <title>Internal Server Error</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }
            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }
            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }
            .content {
                text-align: center;
                display: inline-block;
            }
            .title {
                font-size: 72px;
                margin-bottom: 40px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Lo sentimos ha ocurrido un error.</div>
                @unless(empty($sentryID))
                    <!-- Sentry JS SDK 2.1.+ required -->
                    <script src="https://cdn.ravenjs.com/3.3.0/raven.min.js"></script>
            
                    <script>
                    Raven.showReportDialog({
                        eventId: '{{ $sentryID }}',
            
                        // use the public DSN (dont include your secret!)
                        dsn: 'https://412f2c562a034ea4a3813b6295e84b1c@sentry.io/179701'
                    });
                    </script>
                @endunless
            </div>
        </div>
    </body>
</html>