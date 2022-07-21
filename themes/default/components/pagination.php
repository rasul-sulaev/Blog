<!--<nav aria-label="Page navigation example">-->
<!--    <ul class="pagination">-->
<!--    --><?// if (($_SERVER['REQUEST_URI']) === '/'): ?>
<!--        <li class="page-item">-->
<!--            <a class="page-link" href="--><?//=$_SERVER['REQUEST_URI']."&page=1"?><!--" aria-label="Previous">-->
<!--                <span aria-hidden="true">&laquo;</span>-->
<!--            </a>-->
<!--        </li>-->
<!--    --><?// for ($i=1; $i<$total_pages; ++$i): ?>
<!--        <li class="page-item"><a class="page-link" href="--><?//=$_SERVER['REQUEST_URI']."&page=$i"?><!--">--><?//=$i?><!--</a></li>-->
<!--    --><?// endfor; ?>
<!--        <li class="page-item">-->
<!--            <a class="page-link" href="--><?//=$_SERVER['REQUEST_URI']."&page=$total_pages"?><!--" aria-label="Next">-->
<!--                <span aria-hidden="true">&raquo;</span>-->
<!--            </a>-->
<!--        </li>-->
<!--    --><?// else: ?>
<!---->
<!---->
<!--        <li class="page-item">-->
<!--            <a class="page-link" href="?page=1" aria-label="Previous">-->
<!--                <span aria-hidden="true">&laquo;</span>-->
<!--            </a>-->
<!--        </li>-->
<!--        --><?// for ($i=1; $i<$total_pages; ++$i): ?>
<!--            <li class="page-item"><a class="page-link" href="?page=--><?//="$i"?><!--">--><?//=$i?><!--</a></li>-->
<!--        --><?// endfor; ?>
<!--        <li class="page-item">-->
<!--            <a class="page-link" href="?page=--><?//=$total_pages; ?><!--" aria-label="Next">-->
<!--                <span aria-hidden="true">&raquo;</span>-->
<!--            </a>-->
<!--        </li>-->
<!---->
<!---->
<!--    --><?// endif; ?>
<!--    </ul>-->
<!--</nav>-->