<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            line-height: 1.6;
            padding: 20px;
            margin: 0;
        }
        
        .invoice-wrapper {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            width: 100%;
            box-sizing: border-box;
        }
        
        .invoice-header {
            margin-bottom: 20px;
            border-bottom: 2px solid #ddd;
            padding-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .invoice-header h1 {
            font-size: 24px;
            font-weight: bold;
            color: #000;
            margin: 0;
        }
        
        .invoice-header img {
            max-width: 150px;
            height: auto;
        }
        
        .invoice-info-list {
            list-style: none;
            padding-left: 0;
            font-size: 14px;
            margin-top: 10px;
        }
        
        .invoice-info-list li {
            margin-bottom: 5px;
        }
        
        .invoice-info-list strong {
            font-weight: bold;
            margin-right: 5px;
            display: inline-block;
            width: 100px;
            text-align: right;
        }
        
        .invoice-info {
            margin-top: 20px;
        }
        
        .invoice-info-item {
            margin-bottom: 10px;
        }
        
        .invoice-info-item strong {
            display: inline-block;
            width: 100px;
            text-align: right;
            margin-right: 10px;
        }
        
        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            margin-top: 20px;
        }
        
        .invoice-table th, .invoice-table td {
            padding: 8px;
            border: 1px solid #ddd;
        }
        
        .invoice-table th {
            background-color: #f7f7f7;
        }
        
        .invoice-table td {
            text-align: center;
        }
        
        .invoice-table td.text-right {
            text-align: right;
        }
        
        .invoice-total {
            text-align: right;
            font-size: 16px;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="invoice-wrapper">
		<div class="invoice-header" style="text-align: center;">
			<img src="<?php echo base_url() ?>assets/Front/img/homef.png" alt="Company Logo" style="max-width: 100%; height: auto;">
		</div>

        
        <div class="invoice-info">
            <ul class="invoice-info-list">
                <li><strong>Invoice No :</strong> <?php echo $invoice->id_invoice; ?></li>
                <li><strong>Print Date :</strong> <?php echo date('d-m-Y'); ?></li>
            </ul>
        </div>
        
        <div class="invoice-info">
            <div class="invoice-info-item">
                <strong>Full Name:</strong> <?php echo $invoice->nama; ?>
            </div>
            <div class="invoice-info-item">
                <strong>Address:</strong> <?php echo $invoice->alamat; ?>
            </div>
            <div class="invoice-info-item">
                <strong>Phone:</strong> <?php echo $invoice->no_telp; ?>
            </div>
            <div class="invoice-info-item">
                <strong>Order Date:</strong> <?php echo $invoice->tgl_pesan; ?>
            </div>
            <div class="invoice-info-item">
                <strong>Payment Proof:</strong>
                <?php if (!empty($invoice->bukti_pembayaran)): ?>
                    <img src="<?php echo base_url('uploads/' . $invoice->bukti_pembayaran); ?>" alt="Payment Proof" style="width: 100px; height: auto;">
                <?php else: ?>
                    No payment proof available.
                <?php endif; ?>
            </div>
        </div>
        
        <table class="invoice-table">
            <thead>
                <tr>
                    <th>ITEM ID</th>
                    <th>PRODUCT NAME</th>
                    <th>QUANTITY</th>
                    <th>UNIT PRICE</th>
                    <th>SUBTOTAL</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $total = 0;
                    foreach ($pesanan as $psn) :
                        $subtotal = $psn->jumlah * $psn->harga;
                        $total += $subtotal;
                ?>
                <tr>
                    <td><?php echo $psn->id_barang; ?></td>
                    <td><?php echo $psn->nama_barang; ?></td>
                    <td><?php echo $psn->jumlah; ?></td>
                    <td class="text-right"><?php echo number_format($psn->harga, 0, ',', '.'); ?></td>
                    <td class="text-right"><?php echo number_format($subtotal, 0, ',', '.'); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <div class="invoice-total">
            <span>Total: </span><i><?php echo number_format($total, 0, ',', '.'); ?></i>
        </div>
    </div>
</body>
</html>
