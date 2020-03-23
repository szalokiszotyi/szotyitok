<DOCTYPE html>
<html>
<head>
</head>
<body>
    <table class="table">
        <tr>
            <th>kategoria</th>
            <th>alkategoria</th>
            <th>ar</th>
            <th>leiras</th>
        </tr>
        <?php require_once APPPATH.'Core/admintermekek.php'; ?>
      <?php if (isset($_GET['delete'])) require_once APPPATH.'Core/termektorlese.php'; ?>
    </table>
</body>
</html>    