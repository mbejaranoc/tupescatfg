<div class="container generic-form">
        <h2>Subir PDF</h2>
            <form method="post" action="php/data-base-catalogo-anadir.php" enctype="multipart/form-data">
               <div class="form-group"> 
                    <label>Titulo</label>
                    <input type="text" class="form-control" name="titulo">
                </div>
                <div class="form-group"> 
                    <label>Descripcion</label>
                    <input type="" name="" class="form-control" name="descripcion">
                </div>
                <div class="form-group"> 
                    <label>Archivo</label>
                    <input type="file" class="form-control" name="archivo">
                </div>

                <input type="submit" class="btn btn-info btn-lg btn-responsive submit" value="subir" name="subir">
                <a href="lista.php">lista</a>
              
            </form>            
    </div>
    
