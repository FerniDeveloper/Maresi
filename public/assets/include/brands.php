<section style="align-content: center;" class="brands-carousel">
    <h2 class="sr-only">Brands Carousel</h2>
    <div class="container">
        <div class="customer-logos">
            <?php
                $directorio = 'assets/images/brands';
                $gestor_dir = opendir($directorio);
                while (false !== ($nombre_fichero = readdir($gestor_dir))) {
                    if($nombre_fichero != "." && $nombre_fichero != ".."){
                        $marca = substr_replace($nombre_fichero ,"",-5);
                    ?>
                        <div style="text-align: center;" class="slide">
                            <img style="max-width: 80%;" src="<?=$directorio?>/<?=$nombre_fichero?>" alt="<?=$nombre_fichero?>" style="cursor: pointer;" onclick="javascript:window.location.href='shop?m[]=<?=$marca?>'" class="lazyload" data-echo="<?=$directorio?>/<?=$nombre_fichero?>">
                        </div>
                    <?php  
                    }
                }
            ?>
        </div>
    </div>
</section>