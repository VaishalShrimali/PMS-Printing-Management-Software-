<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <style>
        table,
        th,
        td,
        tr {
            border: 1px solid black;

            border-collapse: collapse;
            font-family: 'Calibri';
            font-style: normal;
            font-weight: normal;

            src: url("https://gdr-technologies.com/assets/admin/fonts/feather-font/Calibri/Calibri.ttf") format('truetype');
        }

        td b {
            font-family: 'Calibri';
            font-style: normal;
            font-weight: normal;

            src: url("https://gdr-technologies.com/assets/admin/fonts/feather-font/Calibri/Calibri.ttf") format('truetype');
        }


        body {
            font-family: 'Calibri';
            font-style: normal;
            font-weight: normal;

            src: url("https://gdr-technologies.com/assets/admin/fonts/feather-font/Calibri/Calibri.ttf") format('truetype');

        }

        .button {
            background-color: yellow;
            border: 1px solid black;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 13;
            font-weight: revert;
            margin: 4px 2px;
            cursor: pointer;
        }

        .button a {
            font-weight: revert;
        }

        .btn {
            margin-top: 7px;
            border: 1px solid white;
            border-collapse: collapse;
        }
    </style>
</head>

<body>

    <table class="pdf_table" style="border:1px solid black;text-align: center;font-size:12px;" width="100%" border="1">

        <tr>
            <th style="padding: 9px;font-size: 16px;font-weight: revert; background-color : yellow;" colspan="8">ORDER INFORMATION</th>
        </tr>
        <tr>
            <td colspan="8" style="padding : 5px;"><br></td>
        </tr>
        <tr>
            <th style="text-align:left;font-size: 16px; width: 50%; padding : 5px; " colspan="4"> <strong>Dealer Name :-</strong> <?php echo $order[0]['dealer_name']; ?> </th>
            <th style="text-align:left;font-size: 16px; width: 50%; padding : 5px;" colspan="4"> <strong>Shop Name :-</strong> <?php echo $order[0]['shop_name']; ?> </th>
        </tr>

        <tr>
            <th style="text-align:left;font-size: 16px; width: 50%; padding : 5px; " colspan="4"> <strong>Address :-</strong> <?php echo $order[0]['address']; ?> </th>
            <th style="text-align:left;font-size: 16px; width: 50%; padding : 5px;" colspan="4"> <strong>Product :-</strong> <?php echo $order[0]['product_name']; ?> </th>
        </tr>

        <tr>
            <th style="text-align:left;font-size: 16px; width: 50%; padding : 5px; " colspan="4"> <strong>Height :-</strong> <?php echo $order[0]['height']; ?> </th>
            <th style="text-align:left;font-size: 16px; width: 50%; padding : 5px;" colspan="4"> <strong>Width :-</strong> <?php echo $order[0]['width']; ?> </th>
        </tr>

        <tr>
            <th style="text-align:left;font-size: 16px; width: 50%; padding : 5px; " colspan="4"> <strong>Quantity :-</strong> <?php echo $order[0]['quantity']; ?> </th>
            <th style="text-align:left;font-size: 16px; width: 50%; padding : 5px;" colspan="4"> <strong>Printing Type :-</strong> <?php echo $order[0]['printing']; ?> </th>
        </tr>

        <tr>
            <th style="text-align:left;font-size: 16px; width: 50%; padding : 5px; " colspan="4"> <strong>Cutting :-</strong> <?php echo $order[0]['cutting']; ?> </th>
            <th style="text-align:left;font-size: 16px; width: 50%; padding : 5px;" colspan="4"> <strong>Lamination :-</strong> <?php echo $order[0]['lamination']; ?> </th>
        </tr>

        <tr>
            <th style="text-align:left;font-size: 16px; width: 50%; padding : 5px; " colspan="4"> <strong>Pasting Type :-</strong> <?php echo $order[0]['pasting']; ?> </th>
            <th style="text-align:left;font-size: 16px; width: 50%; padding : 5px;" colspan="4"> <strong>Installation Type :-</strong> <?php echo $order[0]['installation']; ?> </th>
        </tr>

        <tr>
            <th style="text-align:left;font-size: 16px; width: 50%; padding : 5px; " colspan="4"> <strong>Delivery :-</strong> <?php echo $order[0]['delivery']; ?> </th>
            <th style="text-align:left;font-size: 16px; width: 50%; padding : 5px;" colspan="4"> <strong>Order_Mode :-</strong> <?php echo $order[0]['order_mode']; ?> </th>
        </tr>

        <tr>

            <th style="text-align:left;font-size: 16px; width: 50%; padding : 5px; " colspan="4"> <strong>Image :-</strong> </th>
            <th style="text-align:left;font-size: 16px; width: 50%; padding : 5px;" colspan="4"> <img src="<?php echo $img ?>" alt="" style="width: 150px; height: 150px;"> </th>

        </tr>




    </table>

    
    <button class="button"><a style="text-decoration: none !important; color: black; " href="{{ url('admin/order_list') }}"><strong>BACK TO LIST</strong> </a></button>
</body>

</html>