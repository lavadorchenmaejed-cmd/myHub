<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MyHub</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            min-height: 100vh;
            background: 
              linear-gradient(rgba(244, 246, 241, 0.75), rgba(244, 246, 241, 0.75)),
              url("{{ asset('assets/bg.png') }}") center center / cover no-repeat fixed;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 0;
            color: #26352c;
        }
        main {
            width: 100%;
            max-width: 430px;
            background: #ffffff;
            padding: 40px;
            border-radius: 18px;
            box-shadow: 0 12px 40px rgba(30, 55, 40, 0.08);
            border: 1px solid #e8ede7;
        }

        h2 {
            color: #214d36;
            margin-bottom: 10px;
            display: flex;
            justify-content: center;
            align-items: center;

        }

        h1 {
            color: #214d36;
            margin-bottom: 10px;
            display: flex;
            justify-content: left;
            align-items: left;
            padding-bottom: 10px;

        }

        p {
            color: #7b877e;
            font-size: 14px;
            margin-bottom: 25px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        input, textarea, select {
            width: 100%;
            padding: 14px 16px;
            border: 1px solid #dce4dc;
            border-radius: 9px;
            outline: none;
            font-size: 14px;
            background: #fafcf9;
            transition: 0.2s;
        }

       
        button {
            padding: 14px;
            border: none;
            border-radius: 9px;
            background: #285b3d;
            color: white;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
        }

        #register, #login {
            padding: 14px;
            border: none;
            border-radius: 9px;
            background: #285b3d;
            color: white;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
            width: 30%;
            margin-left: auto;
        }

        button:hover {
            background: #1d452e;
            transform: translateY(-1px);
        }

        a {
            color: #367a50;
            text-decoration: none;
            font-weight: 600;
        }

        a:hover {
            text-decoration: underline;
        }

        .form-footer {
            text-align: center;
            margin-top: 22px;
            font-size: 13px;
            color: #7b877e;
        }

        .error {
            color: #c0392b;
            font-size: 13px;
            margin-top: -10px;
        }


        main:has(.profile) {
           max-width: 900px;        
           display: flex;
           flex-wrap: wrap;
           align-items: center;
           gap: 24px;
        }

        main:has(.profile) > h1 {
           flex: 1;
            justify-content: flex-start;
           margin-bottom: 0;
           font-size: 26px;
        }

        main:has(.profile) > form {
         flex-direction: row;
        }

        main:has(.profile) > form button {
           padding: 10px 20px;
           background: transparent;
           color: #285b3d;
           border: 1px solid #cfdccf;
        }

        main:has(.profile) > form button:hover {
            background: #f1f6f0;
        }


        :is(.profile, .pet, .business) {
           width: 100%;
          background: #fafcf9;
          border: 1px solid #e8ede7;
          border-radius: 14px;
          padding: 24px;
        }

        :is(.profile, .pet, .business) form {
           display: grid;
           grid-template-columns: repeat(auto-fit, minmax(170px, 1fr));
           gap: 12px;
           align-items: start;
        }

        :is(.profile, .pet, .business) :is(h2, table, textarea) {
            grid-column: 1 / -1;
        }

        :is(.profile, .pet, .business) h2 {
            justify-content: flex-start;
            margin-bottom: 0;
           font-size: 18px;
        }

        :is(.profile, .pet, .business) input,
        :is(.profile, .pet, .business) textarea {
            background: #ffffff;
        }

        :is(.profile, .pet, .business) textarea {
            min-height: 90px;
            resize: vertical;
        }

        :is(.profile, .pet, .business) button {
           justify-self: start;
           padding: 14px 24px;
        }       


        table {
          width: 100%;
          border-collapse: collapse;
         margin-top: 8px;
          font-size: 14px;
          background: #ffffff;
          border: 1px solid #e8ede7;
          border-radius: 10px;
          overflow: hidden;
        }

        th {
           text-align: left;
           font-size: 12px;
           text-transform: uppercase;
          letter-spacing: 0.05em;
          color: #7b877e;
          background: #f4f8f3;
          padding: 12px 14px;
          border-bottom: 1px solid #e8ede7;
        }

        td {
           padding: 14px;
           border-bottom: 1px solid #eef2ec;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        tbody tr:hover {
            background: #f9fbf8;
        }

        td[colspan] {
           text-align: center;
           color: #7b877e;
           padding: 22px;
        }

        @media (max-width: 600px) {
          :is(.profile, .pet, .business) table {
              display: block;
              overflow-x: auto;
          }
        }       

        .profile-card {
           grid-column: 1 / -1;
            display: flex;
           align-items: center;
           gap: 20px;
           background: #ffffff;
           border: 1px solid #e8ede7;
           border-radius: 12px;
           padding: 20px;
        }

        .profile-card .avatar {
           flex: none;
          width: 64px;
          height: 64px;
          border-radius: 50%;
          background: #285b3d;
          color: #ffffff;
          display: flex;
          justify-content: center;
          align-items: center;
          font-size: 26px;
          font-weight: 600;
        }

        .profile-card h3 {
          font-size: 20px;
         color: #214d36;
          margin-bottom: 2px;
        }       

        .profile-card p {
          margin: 0;
          font-size: 14px;
        }

        .profile-card .bio {
            margin-top: 10px;
            color: #26352c;
        }

        header {
            width: 100%;
            background: #ffffff;
            border-bottom: 1px solid #e8ede7;
            padding: 18px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .logo {
           font-size: 23px;
           font-weight: 700;
           color: #214d36;
           text-decoration: none;
        }

        .logo span {
           color: #6b9b76;
        }

    </style>
</head>

<body>

        <header>
            <div class="logo">
               My<span>Hub</span>
            </div>

            @if(request()->routeIs('dashboard'))
                <form method="POST" action="{{ route('logout') }}">
                 @csrf
                    <button type="submit">Logout</button>
             </form>
         @endif
        </header>
        
    <main>
        {{ $slot }}
    </main>
</body>
</html>