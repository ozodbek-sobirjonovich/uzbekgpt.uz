<!DOCTYPE html>
<html>
<head>
    <style>
        #radioButtons{
            margin: 5px 0 10px 0;
        }

        input[type=text], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=password], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            width: 100%;
            background-color: #016a70;
            color: white;
            padding: 14px 20px;
            margin-top: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #018c94;
        }

        div {
            margin: auto;
            width: 30%;
            border-radius: 5px;
            background-color: #ededed;
            padding: 20px;
            font-family: 'Work Sans', sans-serif;
        }
    </style>
</head>
<body>
<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@200;300&display=swap" rel="stylesheet">
<div>
    <form action="{{route('installer.envEditor.save')}}" method="POST">
        @csrf
        <h2 style="text-align: center;">MagicAI Installer</h2>
        <hr>
        <h4>General</h4>
        <label for="app_url">App URL</label>
        <input type="text" id="app_url" name="app_url" placeholder="https://liquid-themes.com" value="{{env('APP_NAME')}}">
        <hr>
        <section id="radioButtons">
            <label for="app_debug">App Environment</label>
            <br>
            <input type="radio" id="production" name="environment" value="production" checked>
            <label for="production">Production (Ready)</label>
            <input type="radio" id="development" name="environment" value="development">
            <label for="development">Development</label><br>
        </section>
        <section id="radioButtons">
            <label for="app_debug">Debugging</label>
            <br>
            <input type="radio" id="false" name="app_debug" value="false" checked>
            <label for="false">False, Hide Errors.</label><br>
            <input type="radio" id="true" name="app_debug" value="true" >
            <label for="true">True, Show errors</label>
        </section>
        <hr>
        <h4>Database</h4>
        <label for="database_hostname">Database Hostname (Enter localhost for CPanel, otherwise 127.0.0.1</label>
        <input type="text" id="database_hostname" name="database_hostname"  value="{{env('DB_HOST') ?? '127.0.0.1'}}" placeholder="127.0.0.1">

        <label for="database_name" style="margin-top: 10px;">Database Name</label>
        <input type="text" id="database_name" name="database_name" placeholder="Your Database Name" value="{{old('database_name') ?? env('DB_DATABASE')}}">

        <label for="database_username" style="margin-top: 10px;">Database User Name</label>
        <input type="text" id="database_username" name="database_username" placeholder="Your Database User Name" autocomplete="false" value="{{old('database_username') ?? env('DB_USERNAME')}}">

        <label for="database_password" style="margin-top: 10px;">Database Password</label>
        <input type="password" id="database_password" name="database_password" placeholder="Your Database Password" autocomplete="false" value="{{old('database_password') ?? env('DB_PASSWORD')}}">

        <input type="submit" value="Install">
    </form>
</div>
</body>
</html>
