<!--
<!DOCTYPE html>
<html>
    <head>
        <title>Lista de Productos</title>
    </head>
    <body>
        <h1>Productos Disponibles</h1>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
            </tr>
            <?php foreach($products as $productos): ?>
            <tr>
                <td><?php echo $productos['id']; ?></td>
                <td><?php echo $productos['nombre']; ?></td>
                <td><?php echo $productos['precio']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>
-->

<!DOCTYPE html>
<html>
    <head>
        <title>Lista de Productos</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <div class="container mt-5">
            <h1 class="mb-4">Lista de Productos</h1>
            <p>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crearProductoModal"> Agregar Productos</button>
            </p>
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $productos): ?>
                    <tr>
                        <td><?php echo $productos['id']; ?></td>
                        <td><?php echo $productos['nombre']; ?></td>
                        <td>$<?php echo $productos['precio']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    
        <!-- The Modal -->
        <div class="modal fade" id="crearProductoModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                
                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Agregar Productos</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form id="crearProductoForm">
                            <div class="form-group">
                                <label for="txt_producto">Nombre Producto</label>
                                <input type="text" class="form-control" placeholder="Nombre del producto" id="txt_producto" name="txt_producto" required>
                            </div>
                            <div class="form-group">
                                <label for="txt_precio">Precio:</label>
                                <input type="number" class="form-control" placeholder="Precio del Producto" id="txt_precio" name="txt_precio" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                
                </div>
            </div>
        </div>
        
        <!-- manejar js para insertar los datos -->
        <script>
            document.addEventListener('DOMContentLoaded',function(){
                document.getElementById('crearProductoForm').addEventListener('submit',function(e){
                    e.preventDefault();
                    const formData = new FormData(this);
    
                    fetch('index.php?action=crear',{
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if(data.success){
                            location.reload();
                        }else{
                            alert("Error al crear el producto");
                        }
                    });
                });
            });
    
        </script>
    
    </body>
</html>


