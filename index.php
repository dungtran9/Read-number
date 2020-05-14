
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

<form method="post">
    <h2>Doc so thanh chu</h2>
    <label>Nhap so can doc: </label>
    <input type="number" name="number"/>
    <br>
    <button type="submit">Submit</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $number = $_POST['number'];
    echo docSo($number);
}
function motCs($number)
{
    $motChuso = ['zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];
    return $motChuso[$number];
}

function haiCs($number)
{
    $haiChuc = [10 => 'ten', 11 => 'eleven', 12 => 'twelve', 13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen', 16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen', 19 => 'nineteen'];
    $hangChuc = [2 => 'twenty', 3 => 'thirty', 4 => 'fourty', 5 => 'fifty', 6 => 'sixty', 7 => 'seventy', 8 => 'eighty', 9 => 'nicety'];
    if ($number < 20) {
        return $haiChuc[$number];
    }

    if ($number[1] == 0) {
        return $hangChuc[$number[0]];
    }

    return $hangChuc[$number[0]] . ' ' . motCs($number[1]);

}

function baCs($number)
{
    if ($number % 100 == 0) {
        return motCs($number[0]) . ' ' . 'hundred';
    }
    if ($number[1] == 0) {
        return motCs($number[0]) . ' ' . 'hundred and' . ' ' . motCs($number[2]);
    }
    return motCs($number[0]) . ' ' . 'hundred and' . ' ' . haiCs(substr($number, 1, 2));
}

function docSo($number)
{
    switch (strlen($number)) {
        case 1:
            $words = motCs($number);
            break;
        case 2:
            $words = haiCs($number);
            break;
        case 3:
            $words = baCs($number);
            break;
        default:
            $words = 'số quá lớn ';
            break;
    }
    return $words;
}

?>

</body>
</html>