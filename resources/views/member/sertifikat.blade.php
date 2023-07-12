    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Sertifikat</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
            integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <style>
            body {
                background-image: url({{ public_path('img/sertifikat.jpg') }});
                background-position: center;
                background-size: cover;
                font-family: Arial, sans-serif;
            }

            .container {
            display: flex;
            flex-direction: column;
            justify-content: flex-start; /* Mengubah posisi vertikal menjadi di atas */
            align-items: flex-start; /* Mengubah posisi horizontal menjadi di kiri */

            /* Tambahkan padding agar logo tidak terlalu dekat dengan tepi */
        }

        .logo {
            margin-top: 50px; /* Menggeser posisi logo ke bawah */
            margin-left: 500px; /* Menggeser posisi logo ke tepi kiri */
        }

        .title {
            font-size: 50px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
            color: #333333;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            font-family: "Arial Black", sans-serif;
        }

        .subtitle {
            font-size: 20px;
            text-align: center;
            color: #555555;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            margin-bottom: 20px;
            margin-top: 10px;
            font-family: "Verdana", sans-serif;
        }

        .recipient {
            font-size: 30px;
            font-weight: bold;
            margin-top: 20px;
            margin-bottom: 20px;
            text-align: center;
            color: #222222;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            font-family: "Georgia", serif;
            font-style: italic;
        }

        .deskripsi {
            font-size: 23px;
            margin-top: 20px;
            margin-bottom: 70px;
            text-align: center;
            color: #333333;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            padding-left: 5px;
            padding-right: 5px;
            font-family: "Tahoma", sans-serif;
        }

        .date {
            font-size: 20px;
            margin-top: 20px;
            margin-bottom: 50px;
            text-align: center;
            color: #444444;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            font-family: "Courier New", monospace;
        }

        .mentor {
            font-size: 24px;
            margin-top: 20px;
            text-align: center;
            color: #222222;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            font-family: "Arial", sans-serif;
        }
        </style>
    </head>

    <body>
        <div class="container">
            <img src="{{ public_path('img/logo.jpg') }}" alt="Logo" style="width: 200px;" class="logo"> <!-- Tambahkan elemen img -->
            <div class="title">
                CERTIFICATE
            </div>
            <div class="subtitle">
                Sertifikat ini dengan bangga diberikan kepada
            </div>
            <div class="recipient">
                {{ $user->name }}
            </div>
            <div class="deskripsi">
                Yang telah menyelesaikan kursus <b>{{$kelas->judul}}</b> dalam program kursus
                Pembelajaran Mandiri pada Platform Indlearn
            </div>
            <div class="date">
                <?php echo date('d F Y'); ?>
            </div>
            <div class="mentor">
                {{$kelas->user->name}}
            </div>
        </div>
    </body>

    </html>
