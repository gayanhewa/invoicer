<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Generated with Invoicer</title>

    <style>
    .invoice-box{
        max-width:800px;
        margin:auto;
        padding:30px;
        border:1px solid #eee;
        box-shadow:0 0 10px rgba(0, 0, 0, .15);
        font-size:16px;
        line-height:24px;
        font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color:#555;
    }

    .invoice-box table{
        width:100%;
        line-height:inherit;
        text-align:left;
    }

    .invoice-box table td{
        padding:5px;
        vertical-align:top;
    }

    .invoice-box .top-meta {
        padding:5px;
        vertical-align:top;
        text-align:right;
    }

    .invoice-box table tr td:nth-child(2){
        text-align:right;
    }

    .invoice-box table tr.top table td{
        padding-bottom:20px;
    }

    .invoice-box table tr.top table td.title{
        font-size:45px;
        line-height:45px;
        color:#333;
    }

    .invoice-box table tr.information table td{
        padding-bottom:40px;
    }

    .invoice-box table tr.heading td{
        background:#eee;
        border-bottom:1px solid #ddd;
        font-weight:bold;
    }

    .invoice-box table tr.details td{
        padding-bottom:20px;
    }

    .invoice-box table tr.item td{
        border-bottom:1px solid #eee;
    }

    .invoice-box table tr.item.last td{
        border-bottom:none;
    }

    .invoice-box table tr.total {
        border-top:2px solid #eee;
        font-weight:bold;
    }

    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td{
            width:100%;
            display:block;
            text-align:center;
        }

        .invoice-box table tr.information table td{
            width:100%;
            display:block;
            text-align:center;
        }
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="4">
                    <table>
                        <tr>
                            <td class="title">

                                <img src="<?=$this->e($data['owner']['logo'])?>" alt="My Company Logo" style="width:100%; max-width:300px;">
                            </td>
                            <td></td>
                            <td></td>
                            <td class="top-meta">
                                Invoice #: <?=time();?><br>
                                Created: <?=$this->e($data['created_date'])?> <br>
                                Due: <?=$this->e($data['due_date'])?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="4">
                    <table>
                        <tr>
                            <td>
                                <?=$this->e($data['owner']['name'])?><br>
                                <?php if(null !== ($this->e($data['owner']['address1']))):?>
                                    <?=$this->e($data['owner']['address1'])?><br>
                                <?php endif;?>
                                <?php if(null !== ($this->e($data['owner']['address1']))):?>
                                    <?=$this->e($data['owner']['address2'])?><br>
                                <?php endif;?>
                                <?php if(null !== ($this->e($data['owner']['address1']))):?>
                                    <?=$this->e($data['owner']['address3'])?><br>
                                <?php endif;?>
                            </td>

                            <td>
                                <?=$this->e($data['receiver']['name'])?><br>
                                <?php if(null !== ($this->e($data['receiver']['contact_name']))):?>
                                    <?=$this->e($data['receiver']['contact_name'])?><br>
                                <?php endif;?>
                                <?php if(null !== ($this->e($data['receiver']['email']))):?>
                                    <?=$this->e($data['receiver']['email'])?><br>
                                <?php endif;?>
                                <?php if(null !== ($this->e($data['receiver']['address1']))):?>
                                    <?=$this->e($data['receiver']['address1'])?><br>
                                <?php endif;?>
                                <?php if(null !== ($this->e($data['receiver']['address1']))):?>
                                    <?=$this->e($data['receiver']['address2'])?><br>
                                <?php endif;?>
                                <?php if(null !== ($this->e($data['receiver']['address1']))):?>
                                    <?=$this->e($data['receiver']['address3'])?><br>
                                <?php endif;?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <?php 
            $items = $data['items'];
            $headings = array_keys($items[0]);
            $total = 0;
            ?>

            <tr class="heading">
                <?php foreach($headings as $heading):?>
                <td>
                    <?php echo ucwords(str_replace('-', ' ', $heading));?>
                </td>
                <?php endforeach;?>
            </tr>
            <?php foreach($items as $item):?>
                <tr class="item">
                    <td>
                        <?php echo $item['description'];?>
                    </td>
                    <td>
                        <?php echo $item['qty'];?>
                    </td>
                    <td>
                        <?php echo $item['unit-price'];?>
                    </td>
                    <td>
                        <?php echo $item['total'];?>
                    </td>
                </tr>
                <?php $total += $item['total'];?>   
            <?php endforeach;?>

            <tr class="total">
                <td></td>
                <td></td>
                <td>Total: </td>
                <td>
                   <?php echo $total;?>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>

