<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAQT Resultaten Frank Degen</title>
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css"
    >
</head>
<body>
<div class="container">
    <h1 class="title has-text-centered is-size-2">PAQT Resultaten Frank Degen</h1>

    <div class="buttons is-centered">
        <a href="?task=1" class="button is-primary">FizzBuzz</a>
        <a href="?task=2" class="button is-primary">Partitioning</a>
        <a href="?task=3" class="button is-primary">Mondays</a>
        <a href="?task=4" class="button is-primary">Case</a>
        <a href="?task=5" class="button is-primary">FormPicker</a>
        <a href="?task=6" class="button is-primary">Webdesign</a>
        <a href="?task=7" class="button is-primary">Case (front-end)</a>
    </div>

    <div class="content">
        <?php
        if (isset($result)) {
            echo '<pre>';
            print_r($result);
            echo '</pre>';
        }
        ?>
    </div>
</div>
</body>
</html>
