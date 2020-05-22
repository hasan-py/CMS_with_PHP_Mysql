<!-- Connection -->

<?php
include "./includes/db.php";
?>

<!-- Header -->
<?php
include "./includes/header.php";
?>

<!-- Navigation -->
<?php
include "./includes/navigation.php";
?>



<main>
    <div class="container">
        <div class="row">

            <!-- blog-contents -->
            <section class="col-md-8">

                <?php
                include "includes/categoryBasedPost.php";
                ?>  
                    <!-- pagination -->
                    <div class="page-turn">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3 text-center">
                                <nav>
                                    <ul class="pagination pagination-sm">
                                        <li class="disabled">
                                            <a href="#" aria-label="Previous">
                                                <span aria-hidden="true">Prev</span>
                                            </a>
                                        </li>
                                        <li class="active"><a href="index.html">1</a></li>
                                        <li><a href="page2.html">2</a></li>
                                        <li><a href="page3.html">3</a></li>
                                        <li><a href="page4.html">4</a></li>
                                        <li><a href="page5.html">5</a></li>
                                        <li>
                                            <a href="page6.html" aria-label="Next">
                                                <span aria-hidden="true">Next</span>
                                            </a>
                                        </li>
                                    </ul> 
                                </nav>
                            </div>
                        </div>
                    </div> <!-- /.page-turn -->
                </section>
                

                <!-- sidebar -->
                <?php
                include "includes/sidebar.php";
                ?>
            

            </div>
        </div> <!-- end of /.container -->
    </main>
