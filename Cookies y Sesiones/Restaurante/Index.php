<html>

<head>
    <title>Menu</title>
</head>
<style>
    body {
        background: #FFF;
        text-align: center
    }

    div {
        background-color: darkkhaki;
        width: 50%;
        border-radius: 20px;
        border: 2px solid #73AD21;
        padding: 20px;
        padding-top: 0px;
    }

    h2 {
        color: darkorange;
        font-size: 250%;
        text-align: center
    }

    dl {
        width: 100%;
        overflow: auto;
        margin: 0 0 1em;
    }

    dt,
    dd.price {
        font-size: 130%;
        font-weight: bold
    }

    dt {
        float: left;
        padding-right: 3px;
        color: #F70000
    }

    dd {
        margin: 0
    }

    dd.price {
        float: right;
        padding-left: 3px;
        color: black
    }

    dd.ingredients {
        float: left;
        width: 100%;
        padding: 3px 0;
        font: italic 100% Georgia, Times, sans-serif;
        color: #555
    }
    hr {
        border: 1px solid black;
    }
</style>
<?php
    
?>
<body>
    <div>
        <h2>RESTAURANTE</h2>
        <hr>
        <br>
        <dl>
            <dt>Bruschetta</dt>
            <dd class="price">5 Euro</dd>
            <dd class="ingredients">Sliced and roasted bread with tomatoes, extra virgin oil, garlic and basil.</dd>
        </dl>
        <hr>
    <br>
        <dl>
            <dt>Caprese</dt>
            <dd class="price">6 Euro</dd>
            <dd class="ingredients">Mozzarella with fresh sliced tomatoes, extra virgin oil and oregano.</dd>
        </dl>
        <hr>
        <br>
        <dl>
            <dt>Prosciutto e melone</dt>
            <dd class="price">8 Euro</dd>
            <dd class="ingredients">Sweet Parma Prosciutto with melon slices.</dd>
        </dl>
    </div>
</body>

</html>