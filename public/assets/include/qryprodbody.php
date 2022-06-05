<?php

      $titulosfunciones = array();
      $detallesfunciones = array();
      $cantfunciones = 0;
      $sql="SELECT prds.*, marcas.marca AS marcaT, lineas.linea AS lineaT, categorias.categoria AS categoriaT FROM prds JOIN marcas ON marcas.id = prds.marca JOIN lineas ON lineas.id = prds.linea JOIN categorias ON categorias.id = prds.categoria where sku = '".$sku."'";
      $result = $db->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $desc = $row['descrip'];
          $marcaT = $row['marcaT'];
          $lineaT = $row['lineaT'];
          $categoriaT = $row['categoriaT'];
          $precio = $row['precio'];
          $oferta = $row['oferta'];
          $linea = $row['linea'];
          $marca = $row['marca'];
          $etc = $row['etc'];
          $det1 = $row['det1'];
          $det2 = $row['det2'];
          $det3 = $row['det3'];
          $det4 = $row['det4'];
          $xss = $row['xss'];
          $canDisp = $row['xss'];
          $acc = $row['acc'];
          $video = $row['video'];
          $modelo = $row['modelo'];
          $garantia = $row['garantia'];

          $titulosfunciones[0] = $row['tf1'];
          $titulosfunciones[1] = $row['tf2'];
          $titulosfunciones[2] = $row['tf3'];
          $titulosfunciones[3] = $row['tf4'];
          $titulosfunciones[4] = $row['tf5'];
          $titulosfunciones[5] = $row['tf6'];
          $titulosfunciones[6] = $row['tf7'];
          $titulosfunciones[7] = $row['tf8'];
          $titulosfunciones[8] = $row['tf9'];
          $titulosfunciones[9] = $row['tf10'];

          $detallesfunciones[0] = $row['df1'];
          $detallesfunciones[1] = $row['df2'];
          $detallesfunciones[2] = $row['df3'];
          $detallesfunciones[3] = $row['df4'];
          $detallesfunciones[4] = $row['df5'];
          $detallesfunciones[5] = $row['df6'];
          $detallesfunciones[6] = $row['df7'];
          $detallesfunciones[7] = $row['df8'];
          $detallesfunciones[8] = $row['df9'];
          $detallesfunciones[9] = $row['df10'];

        }

        for ($i=0; $i <= 9; $i++) { 
          if($titulosfunciones[$i] != ''){
            $cantfunciones++;
          }
        }



        if($xss > 0){
          $xss = 'Disponible';
          $clsxss = "in-stock";
        }else{
          $xss = 'No Disponible';
          $clsxss = "out-of-stock";
        }

        if($oferta != 0)
          $preciogpo = $oferta;
        else
          $preciogpo = $precio;

    }

        ?>