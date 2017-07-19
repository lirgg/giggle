<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <base href="<?php echo site_url(); ?>">
    <link rel="shortcut icon" href="img/favicon.ico"/>
    <link rel="stylesheet" href="css/jquery.mobile-1.4.5.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/login.css">
    <script src="javascript/rem.js"></script>
    <script src="javascript/jquery-1.12.4.js"></script>
    <script src="javascript/user_detail.js"></script>
    <script src="javascript/jquery.mobile-1.4.5.js"></script>
    <title>用户详情</title>
</head>
<body>
<div id="header">
    <a id="home" href="javascript:;"
       class="ui-shadow ui-btn ui-corner-all ui-btn-inline ui-btn-icon-left ui-icon-home ui-btn-left"
       style="margin: 0;">首页</a>
    用户详情
</div>
<h1 style="margin-top: 1.02rem;">当前用户为: <?php echo $this->session->userinfo->username; ?></h1>
<h2>订单列表</h2>

<table data-role="table" data-mode="columntoggle" class="ui-body-d ui-shadow table-stripe ui-responsive"
       data-column-btn-theme="a" data-column-popup-theme="a" data-column-btn-text="选择显示的列">
    <thead>
    <tr class="ui-bar-a">
        <th data-priority="1">订单ID</th>
        <th data-priority="1">产品名称</th>
        <th data-priority="1">产品原单价</th>
        <th data-priority="1">数量</th>
        <th data-priority="1">订单单价</th>
        <th data-priority="1">订单总价</th>
    </tr>
             
    </thead>
             
    <tbody>
                <?php foreach ($order_list as $order): ?>
        <tr>
            <td><?php echo $order->order_id; ?></td>
            <td><?php echo $order->product_name; ?></td>
            <td><?php echo $order->price; ?></td>
            <td><?php echo $order->num; ?></td>
            <td><?php echo $order->order_price; ?></td>
            <td><?php echo $order->total; ?></td>
        </tr>

    <?php endforeach; ?>
             
    </tbody>
           
</table>


</body>
</html>