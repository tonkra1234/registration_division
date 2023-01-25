<?php 

$total_records_per_page = 15; 

if (isset($_GET['page_no']) && $_GET['page_no']!="") {
    $page_no = $_GET['page_no'];
} else {
    $page_no = 1;
}

$previous_page = $page_no - 1;
$next_page = $page_no + 1;
$adjacents = "2";
$second_last = $total_no_of_pages - 1;


?>
<div id=paginate>
    <div class="d-flex justify-content-end my-3">
        <strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
    </div>
    <!-- pagination -->
    <div class="d-flex justify-content-end">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php if($page_no > 1){
                echo "<li class='page-item'><a class='page-link' href='?page_no=1'>First Page</a></li>";
                } ?>

                <li class='page-item' <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
                    <a class='page-link' <?php if($page_no > 1){
                    echo "href='?page_no=$previous_page'";
                    } ?>>Previous</a>
                </li>

                <?php

                if ($total_no_of_pages <= 10){  	 
                    for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
                    if ($counter == $page_no) {
                    echo "<li class='active page-item'><a class='page-link'>$counter</a></li>";	
                            }else{
                        echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                                }
                        }
                }
                elseif ($total_no_of_pages > 10){
                    if($page_no <= 4) {			
                        for ($counter = 1; $counter < 8; $counter++){		 
                           if ($counter == $page_no) {
                              echo "<li class='active page-item'><a class='page-link'>$counter</a></li>";	
                               }else{
                                  echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                                       }
                       }
                       echo "<li class='page-item'><a class='page-link'>...</a></li>";
                       echo "<li class='page-item'><a class='page-link' href='?page_no=$second_last'>$second_last</a></li>";
                       echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
                       }
                       elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
                        echo "<li class='page-item'><a class='page-link' href='?page_no=1'>1</a></li>";
                        echo "<li class='page-item'><a class='page-link' href='?page_no=2'>2</a></li>";
                        echo "<li class='page-item'><a class='page-link'>...</a></li>";
                        for (
                             $counter = $page_no - $adjacents;
                             $counter <= $page_no + $adjacents;
                             $counter++
                             ) {		
                             if ($counter == $page_no) {
                            echo "<li class='active page-item'><a class='page-link'>$counter</a></li>";	
                            }else{
                                echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                                  }                  
                               }
                        echo "<li class='page-item'><a class='page-link'>...</a></li>";
                        echo "<li class='page-item'><a class='page-link' href='?page_no=$second_last'>$second_last</a></li>";
                        echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
                        }else {
                            echo "<li class='page-item'><a class='page-link' href='?page_no=1'>1</a></li>";
                            echo "<li class='page-item'><a class='page-link' href='?page_no=2'>2</a></li>";
                            echo "<li class='page-item'><a class='page-link'>...</a></li>";
                            for (
                                 $counter = $total_no_of_pages - 6;
                                 $counter <= $total_no_of_pages;
                                 $counter++
                                 ) {
                                 if ($counter == $page_no) {
                                echo "<li class='active page-item'><a class='page-link'>$counter</a></li>";	
                                }else{
                                    echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                                }                   
                                 }
                            }
                }
                ?>

                <li class='page-item' <?php if($page_no >= $total_no_of_pages){
                    echo "class='disabled'";
                    } ?>>
                    <a class='page-link' <?php if($page_no < $total_no_of_pages) {
                    echo "href='?page_no=$next_page'";
                    } ?>>Next</a>
                </li>

                <?php if($page_no < $total_no_of_pages){
                echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
                } ?>

            </ul>
        </nav>
    </div>
</div>