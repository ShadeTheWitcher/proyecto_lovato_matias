<!DOCTYPE html>
<html>
<head>
    <title>Factura</title>
    
</head>
<body>
    <div class="invoice">
        <div class="header">
            <div class="company-info">
                <h2>GFA</h2>
                <p>Junin 10021</p>
                <p>Teléfono: 123-456-789</p>
                <p>Email: info@tuempresa.com</p>
            </div>
            <div class="invoice-info">
                <h1>Factura</h1>
                <p>Número de factura: <?php echo $invoice['invoice_number']; ?></p>
                <p>Fecha: <?php echo $invoice['date']; ?></p>
                <p>Cliente: <?php echo $invoice['client_name']; ?></p>
                <p>Email: <?php echo $invoice['client_email']; ?></p>
                <p>Teléfono: <?php echo $invoice['client_phone']; ?></p>
            </div>
        </div>

        <div class="col-lg-6 col-md-8 Detalles-compra card">
      <h4>Resumen de productos</h4>
      <?php $sessionCart = session("cart"); ?>
      <div class="table-responsive">
        <table class="table table-light">
          <thead class="thead-light">
            <tr>
              <th>Nombre</th>
              <th>Precio</th>
              <th>Cantidad</th>
              <th>SubTotal</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($sessionCart as $item) : ?>
              <tr>
                <td><?php echo $item['name'] ?></td>
                <td>$<?php echo number_format($item['price']); ?></td>
                <td><?php echo number_format($item['cant']); ?></td>
                <td>$<?php echo ($item["sub_total"]); ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <?php $sessionTotalCarrito = session('totalCarrito'); ?>
      <?php if (empty($sessionCart)) { ?>
        <div>TOTAL: $<?php echo number_format(0); ?></div>
      <?php } else { ?>
        <div>TOTAL: $<?php echo number_format($sessionTotalCarrito); ?></div>
      <?php } ?>

    </div>

        <div class="total-section">
            <div class="total-section-left">
                <p><strong>Total:</strong></p>
                
                <p><strong>Total a pagar:</strong></p>
            </div>
            <div class="total-section-right">
                <p><?php echo $invoice['total']; ?></p>
                <p><?php echo $invoice['taxes']; ?></p>
                <p><?php echo $invoice['grand_total']; ?></p>
            </div>
        </div>

        <div class="footer">
            <p>Gracias por su compra.</p>
        </div>
    </div>
</body>

<style>
    body {
        font-family: Arial, sans-serif;
        font-size: 14px;
        margin: 0;
        padding: 0;
        background-color: #E6E6FA;
    }

    .invoice {
        width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: #F0F8FF;
        border: 1px solid #B0C4DE;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
        border-bottom: 1px solid #B0C4DE;
        padding-bottom: 10px;
    }

    .company-info {
        flex: 1;
    }

    .company-info h2 {
        margin: 0;
        color: #4169E1;
        font-size: 24px;
    }

    .invoice-info {
        text-align: right;
        flex: 1;
    }

    .invoice-info h1 {
        margin: 0;
        font-size: 28px;
        color: #4169E1;
        text-shadow: 1px 1px 2px #B0C4DE;
    }

    .item-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .item-table th,
    .item-table td {
        padding: 10px;
        border: 1px solid #B0C4DE;
        color: #4169E1;
    }

    .item-table th {
        background-color: #B0C4DE;
    }

    .total-section {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
        border-top: 1px solid #B0C4DE;
        padding-top: 10px;
    }

    .total-section-left {
        flex: 1;
        text-align: right;
    }

    .total-section-left p,
    .total-section-right p {
        margin: 5px 0;
        color: #4169E1;
    }

    .total-section-right {
        flex: 1;
        text-align: right;
    }

    .footer {
        margin-top: 20px;
        text-align: center;
        color: #4169E1;
    }
</style>

</html>