<section>
    <div class="row justify-content-md-center">
        <div class="col-md-8 Detalles-compra card">
            <h4>Resumen de productos</h4>
            
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
                        <?php
                        $total = 0;
                        foreach($ventas_detalle as $item):?>
                            <tr>
                                <td><?php echo $item['nombre_producto'] ?></td>
                                <td>$<?php echo number_format($item['precio']); ?></td>
                                <td><?php echo number_format($item['cantidad_venta']); ?></td>
                                <td>$<?php echo ($item["sub_total"]); ?></td>
                            </tr>
                        <?php
                        $total += $item["sub_total"];
                        endforeach; ?>  
                    </tbody>
                </table>
            </div>
            
            <div>TOTAL: $<?php echo number_format($total); ?></div>
            
            <div class="d-flex justify-content-center mt-3">
                <a href="javascript:history.back()" class="btn btn-primary">Volver</a>
            </div>
        </div>
    </div>

    <style>
        .Detalles-compra {
            margin-top: 3%;
        }
    </style>
</section>
