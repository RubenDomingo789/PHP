<!DOCTYPE html>
<html>

<head>
    <title>Estilo</title>
    
    <!--Estilo común para la mayoría de las pantallas-->
    <style scoped>
        body {
            background-color: #39ace7;
        }

        .wrapper {
            display: flex;
            align-items: center;
            flex-direction: column;
            justify-content: center;
            width: 100%;
            min-height: 100%;
        }

        #contenido {
            -webkit-border-radius: 10px 10px 10px 10px;
            border-radius: 10px 10px 10px 10px;
            background: #332966;
            padding: 20px;
            width: 100%;
            max-width: 720px;
            height: 100%;
            max-height: 820px;
            position: relative;
            -webkit-box-shadow: 0 30px 60px 0 rgba(0, 0, 0, 0.3);
            box-shadow: 0 30px 60px 0 rgba(0, 0, 0, 0.3);
            text-align: center;
            margin-top: 25px;
        }

        input[type="submit"] {
            background-color: #ffe766;
            border: none;
            color: #0d0d0d;
            padding: 15px 80px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            text-transform: uppercase;
            font-size: 13px;
            -webkit-box-shadow: 0 10px 30px 0 rgba(95, 186, 233, 0.4);
            box-shadow: 0 10px 30px 0 rgba(95, 186, 233, 0.4);
            -webkit-border-radius: 5px 5px 5px 5px;
            border-radius: 5px 5px 5px 5px;
            margin-top: 20px;
            -webkit-transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            -ms-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }

        input[type="submit"]:hover {
            background-color: #fff12e;
        }

        input[type="date"],
        input[type="text"],
        input[type="number"],
        select[type= "text"],
        select[type= "number"] {
            background-color: white;
            border: none;
            color: #0d0d0d;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 10px;
            width: 36%;
            border: 2px solid #f6f6f6;
            -webkit-transition: all 0.5s ease-in-out;
            -moz-transition: all 0.5s ease-in-out;
            -ms-transition: all 0.5s ease-in-out;
            -o-transition: all 0.5s ease-in-out;
            transition: all 0.5s ease-in-out;
            -webkit-border-radius: 5px 5px 5px 5px;
            border-radius: 5px 5px 5px 5px;
        }

        input[type="date"],
        select[type= "text"],
        input[type="text"],
        select[type= "number"],
        input[name="id"]:focus {
            background-color: #fff;
            border-bottom: 2px solid #5fbae9;
        }

        input[type="date"],
        input[type="text"],
        select[type= "number"]
        input[name="id"]:placeholder {
            color: #cccccc;
        }

        input[name="id"] {
            width: 85%;
        }
    </style>
</head>

<body>
</body>

</html>