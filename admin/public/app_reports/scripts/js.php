<script>

function PrintPage(elem)
{
    var mywindow = window.open('', 'PRINT', 'height=768,width=1024');

    mywindow.document.write('<html><head><title>' + document.title  + '</title>    <link href="media/css/bootstrap.min.css" rel="stylesheet" type="text/css"><link href="media/css/icons.css" rel="stylesheet" type="text/css"><link href="media/css/flag-icon.min.css" rel="stylesheet" type="text/css"><link href="media/css/style.css" rel="stylesheet" type="text/css"><link href="media/css/style_main.css" rel="stylesheet" type="text/css">');
    
    mywindow.document.write('</head><body >');
    mywindow.document.write(document.getElementById(elem).innerHTML);
    mywindow.document.write('</body></html>');

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/

    mywindow.print();
    mywindow.close();

    return true;
}

</script>