<div id=paginate>
    <div class="d-flex justify-content-end my-3">
        <strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
    </div>
    <!-- pagination -->
    <div class="d-flex justify-content-end">
        <nav aria-label="Page navigation example">
            <?php if (ceil($total_records / $total_records_per_page) > 0): ?>
            <ul class="pagination">
                <?php if ($page_no > 1): ?>
                <li class="prev page-item"><a href="?page_no=<?php echo $page_no-1 ?>&search=<?php echo $search_key;?>"
                        class="page-link">Prev</a></li>
                <?php endif; ?>

                <?php if ($page_no > 3): ?>
                <li class="start page-item"><a href="?page_no=1&search=<?php echo $search_key;?>"
                        class="page-link">1</a></li>
                        <li class="dots page-item"><a class="page-link" href="#">...</a></li>
                <?php endif; ?>

                <?php if ($page_no-2 > 0): ?><li class="page page-item"><a class="page-link"
                        href="?page_no=<?php echo $page_no-2 ?>&search=<?php echo $search_key;?>"><?php echo $page_no-2 ?></a>
                </li><?php endif; ?>
                <?php if ($page_no-1 > 0): ?><li class="page page-item"><a class="page-link"
                        href="?page_no=<?php echo $page_no-1 ?>&search=<?php echo $search_key;?>"><?php echo $page_no-1 ?></a>
                </li><?php endif; ?>

                <li class="currentpage page-item"><a class="page-link"
                        href="?page_no=<?php echo $page_no ?>"><?php echo $page_no ?></a></li>

                <?php if ($page_no+1 < ceil($total_records / $total_records_per_page)+1): ?><li class="page page-item">
                    <a class="page-link"
                        href="?page_no=<?php echo $page_no+1 ?>&search=<?php echo $search_key;?>"><?php echo $page_no+1 ?></a>
                </li><?php endif; ?>
                <?php if ($page_no+2 < ceil($total_records / $total_records_per_page)+1): ?><li class="page page-item">
                    <a class="page-link"
                        href="?page_no=<?php echo $page_no+2 ?>&search=<?php echo $search_key;?>"><?php echo $page_no+2 ?></a>
                </li><?php endif; ?>

                <?php if ($page_no < ceil($total_records / $total_records_per_page)-2): ?>
                <li class="dots page-item"><a class="page-link" href="#">...</a></li>
                <li class="end page-item"><a class="page-link"
                        href="?page_no=<?php echo ceil($total_records / $total_records_per_page) ?>&search=<?php echo $search_key;?>"><?php echo ceil($total_records / $total_records_per_page) ?></a>
                </li>
                <?php endif; ?>

                <?php if ($page_no < ceil($total_records / $total_records_per_page)): ?>
                <li class="next page-item"><a class="page-link"
                        href="?page_no=<?php echo $page_no+1 ?>&search=<?php echo $search_key;?>">Next</a></li>
                <?php endif; ?>
            </ul>
            <?php endif; ?>
        </nav>
    </div>
</div>