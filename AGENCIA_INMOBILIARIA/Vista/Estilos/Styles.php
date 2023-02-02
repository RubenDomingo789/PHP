<style>
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
        background: #542854;
        padding: 20px;
        width: 100%;
        max-width: 720px;
        height: 100%;
        max-height: 820px;
        position: relative;
        -webkit-box-shadow: 0 30px 60px 0 rgba(0, 0, 0, 0.3);
        box-shadow: 0 30px 60px 0 rgba(0, 0, 0, 0.3);
        text-align: center;
        margin-top: 40px;
    }

    input[type="submit"] {
        background-color: #ed8ced;
        border: none;
        color: #0d0d0d;
        padding: 15px 80px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        text-transform: uppercase;
        font-size: 13px;
        -webkit-border-radius: 5px 5px 5px 5px;
        border-radius: 5px 5px 5px 5px;
        margin-top: 20px;
        -webkit-transition: all 0.3s ease-in-out;
        -moz-transition: all 0.3s ease-in-out;
        -ms-transition: all 0.3s ease-in-out;
        -o-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
        margin-left: 5% !important;
    }

    input[type="submit"]:hover {
        background-color: #d147ed;
    }

    input[type="text"],
    input[type="number"],
    select[type="text"],
    select[type="number"] {
        background-color: white;
        border: none;
        color: #0d0d0d;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
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
        margin-right: 20px !important;
        float: right;
    }

    select[name="tipo"] {
        width: 65% !important;
    }

    select[name="zona"] {
        width: 65% !important;
    }

    select[name="ndormitorios"] {
        width: 65% !important;
    }

    input[name="precio"] {
        width: 55.5% !important;
    }

    input[name="tamano"] {
        width: 55.5% !important;
    }

    table {
        background-color: white;
        text-align: center;
        border-collapse: collapse;
        width: 90%;
        margin: 0 auto;
        margin-top: 30px;
        font-size: 18px;
    }

    th,
    td {
        padding: 20px;
    }

    th {
        background-color: #542854;
        border-bottom: solid 5px #0F362D;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #ed8ced;
    }

    tr:nth-child(odd) {
        background-color: white;
    }

    button.edit {
        background-color: #008CBA;
        border-radius: 5px;
        width: 50px;
        height: 50px;
    }

    button.trash {
        background-color: #f44336;
        border-radius: 5px;
        width: 50px;
        height: 50px;
    }

    button.insert {
        background-color: #98c41d;
        border-radius: 5px;
        width: 50px;
        height: 50px;
    }

    .alert {
        position: absolute;
        margin-top: 20px;
        background-color: darkmagenta;
        left: 380px;
        padding: 10px;
    }

    label {
        color: white;
        font-size: 20px;
        margin-top: 24px;
        margin-left: 30px;
        float: left;
        clear: both;
    }
</style>