<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login & Registration</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            min-height: 100vh;
            background: #f4f6f1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 25px;
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

        h1, h2 {
            color: #214d36;
            margin-bottom: 10px;
            display: flex;
            justify-content: center;
            align-items: center;

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

        input {
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
    </style>
</head>

<body>
    <main>
        {{ $slot }}
    </main>
</body>
</html>