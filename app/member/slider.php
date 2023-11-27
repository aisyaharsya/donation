<div id="first-slider">
    <div id="carousel-example-generic" class="carousel slide carousel-fade">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <?php
                $query=mysqli_query($con,"select * from tbslide");
                $jumlah=mysqli_num_rows($query);

                $start=0;
                while($start < $jumlah)
                {
            ?>
                <?php 
                    if($start<1)
                    {
                ?>
                        <li data-target="#carousel-example-generic" data-slide-to="<?php $start; ?>" class="active"></li>
                <?php
                    }else
                    {
                ?>
                       <li data-target="#carousel-example-generic" data-slide-to="<?php $start; ?>"></li> 
                <?php
                    }
                ?>
            <?php
                $start++;
                }
            ?>  
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <!-- Item 1 -->
            <?php
                $query=mysqli_query($con,"select * from tbslide");
                $jumlah=mysqli_num_rows($query);

                $start=0;
                while($start < $jumlah)
                {
            ?>
                <?php 
                    if($start<1)
                    {
                ?>      <!--Proses aktive-->
                        <?php  
                            $data=mysqli_fetch_array($query);
                        ?>
                        <div class="item active slide1" style="background:url(../admin/gambar/slide/<?php echo $data[3] ?>);background-size: 100%; background-repeat: no-repeat;">
                        <h2 data-animation="animated bounceInDown"><span><?php echo $data[1] ?></span></h2>
                        <h3 data-animation="animated bounceInDown"><?php echo $data[2] ?></h3>           
                        </div>
                <?php
                    }else
                    {
                ?>
                    <?php  
                        while($data=mysqli_fetch_array($query))
                        {
                    ?>
                       <div class="item slide1" style="background:url(../admin/gambar/slide/<?php echo $data[3] ?>);background-size: 100%; background-repeat: no-repeat;">
                        <h2 data-animation="animated bounceInDown"><span><?php echo $data[1] ?></span></h2>
                        <h3 data-animation="animated bounceInDown"><?php echo $data[2] ?></h3>           
                     </div>
                    <?php  
                    }
                    ?>
                <?php
                    }
                ?>
            <?php
                $start++;
                }
            ?>  
        </div>
        <!-- End Wrapper for slides-->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i><span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i><span class="sr-only">Next</span>
        </a>
    </div>
</div>