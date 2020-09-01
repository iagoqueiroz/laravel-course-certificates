<!DOCTYPE html>
<html lang="pt_BR">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Certification</title>

        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
        <style>
            * {
                padding: 0;
                margin: 0;
                font-size: 14px;
                box-sizing: border-box;
            }

            html,
            body {
                width: 100%;
                height: 100%;
            }

            #certificate {
                width: 100%;
                position: relative;
            }

            #wrapper {
                position: absolute;
                left: 0;
                top: 0;
                right: 0;
                z-index: 2;
                text-align: center;
            }

            #wrapper .certificate-body {
                width: 70%;
                margin: 0 auto;
                margin-top: 190px;
                font-size: 22px;
                font-family: 'Poppins', sans-serif;
                font-weight: 400;
            }

            #wrapper .certificate-body strong {
                font-size: 22px;
                font-family: 'Poppins', sans-serif;
                font-weight: 700;
            }

            #wrapper .certificate-date {
                font-size: 16px;
                font-family: 'Poppins', sans-serif;
                font-weight: 400;
                color: #666;
                margin-top: 30px;
            }
        </style>
    </head>
    <body>
        <div id="certificate">
            <img src="{{ asset('images/certification.jpg') }}" width="100%" height="auto" alt="">
            <div id="wrapper">
                <div class="certificate-body">
                    Certifico que <strong>{{ strtoupper($user->name) }}</strong> concluiu o curso de
                    <strong>{{ strtoupper($course->name) }}</strong> ministrado pelo professor <strong>Iago Queiroz</strong> com carga horária de
                    <strong>{{ $course->hours }}</strong> Hrs
                </div>
                <div class="certificate-date">
                    {{ now()->formatLocalized('%d de %B de %Y') }}
                </div>
            </div>
        </div>
    </body>
</html>
