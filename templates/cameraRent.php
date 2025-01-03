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

    <div class="container columns is-centered">
        <div class="column is-half">
            <h2 class="title is-3">Camera Verhuur Formulier</h2>

            <form id="verhuurForm" method="POST">
                <p id="message"></p>

                <div class="field is-inline is-half">
                    <label class="label" for="startDate">Startdatum:</label>
                    <div class="control">
                        <input type="date" id="startDate" name="startDate" class="input" required />
                    </div>
                </div>

                <div class="field is-inline is-half">
                    <label class="label" for="endDate">Einddatum:</label>
                    <div class="control">
                        <input type="date" id="endDate" name="endDate" class="input" required />
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="camera">Kies camera:</label>
                    <div class="control">
                        <div class="select is-fullwidth">
                            <select id="camera" name="camera" required>
                                <option value="">Select camera</option>
                                <option value="1">Leica camera</option>
                                <option value="2">Mamiya camera</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <button type="submit" class="button is-primary is-pulled-right mt-4">Verstuur</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="./js/script.js"></script>
</body>
</html>
