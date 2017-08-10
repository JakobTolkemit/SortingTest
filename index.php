<html>
<head>
    <title>Sorting visualizer</title>
    <link rel="stylesheet" href="stylesheets/index.css" type="text/css">
</head>
<body>
<div id="content">
    <h1>Der B24 Super sorter</h1>
    <form action="sort.php" method="post">
        <fieldset>
            <legend> Sorting algorithm</legend>
            <select name="algorithm" title="Sorting algorithm">
                <option value="bubble">bubble sort</option>
            </select>
        </fieldset>
        <fieldset>
            <legend>Numbers to sort</legend>
            <textarea name="numbers" cols="30" rows="10" title="Numbers to sort">One number per line</textarea>
        </fieldset>
        <fieldset>
            <legend>Sort or discard</legend>
            <button type="submit">Sort</button>
            <button type="reset">Discard</button>
        </fieldset>
    </form>
</div>
</body>
</html>
