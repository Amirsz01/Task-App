
<a class="btn btn-primary mb-3 mt-3" href='index.php?page=input_task'>Добавить задачу</a>

<a class="btn btn-warning mb-3 mt-3" href=<? !isset($_SESSION['login']) ? print 'index.php?page=auth' : print 'index.php?action=logout' ?> ><? !isset($_SESSION['login']) ? print "Авторизация" : print "Выход"?></a>

<div class="btn-group mt-3 mb-3 float-right">
    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Сортировка
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="index.php?action=sort&sort_name=username&sort_type=<? $_SESSION['sort_type'] == 0 ? print 1 : print 0;?>">Пользователям
            <span>
                <?
                if($_SESSION['sort_name'] == 'username' && $_SESSION['sort_type'] == '1')
                {
                    echo "<svg width=\"1em\" height=\"1em\" viewBox=\"0 0 16 16\" class=\"bi bi-arrow-down\" fill=\"currentColor\" xmlns=\"http://www.w3.org/2000/svg\">
                              <path fill-rule=\"evenodd\" d=\"M4.646 9.646a.5.5 0 0 1 .708 0L8 12.293l2.646-2.647a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 0 1 0-.708z\"/>
                              <path fill-rule=\"evenodd\" d=\"M8 2.5a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-1 0V3a.5.5 0 0 1 .5-.5z\"/>
                          </svg>";
                }
                else if ($_SESSION['sort_name'] == 'username')
                {
                    echo "<svg width=\"1em\" height=\"1em\" viewBox=\"0 0 16 16\" class=\"bi bi-arrow-up\" fill=\"currentColor\" xmlns=\"http://www.w3.org/2000/svg\">
                            <path fill-rule=\"evenodd\" d=\"M8 3.5a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5z\"/>
                            <path fill-rule=\"evenodd\" d=\"M7.646 2.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8 3.707 5.354 6.354a.5.5 0 1 1-.708-.708l3-3z\"/>
                         </svg>";
                }
                ?>
            </span>
        </a>
        <a class="dropdown-item" href="index.php?action=sort&sort_name=email&sort_type=<? $_SESSION['sort_type'] == 0 ? print 1 : print 0;?>">Email
            <span>
                <?
                if($_SESSION['sort_name'] == 'email' && $_SESSION['sort_type'] == '1')
                {
                    echo "<svg width=\"1em\" height=\"1em\" viewBox=\"0 0 16 16\" class=\"bi bi-arrow-down\" fill=\"currentColor\" xmlns=\"http://www.w3.org/2000/svg\">
                              <path fill-rule=\"evenodd\" d=\"M4.646 9.646a.5.5 0 0 1 .708 0L8 12.293l2.646-2.647a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 0 1 0-.708z\"/>
                              <path fill-rule=\"evenodd\" d=\"M8 2.5a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-1 0V3a.5.5 0 0 1 .5-.5z\"/>
                          </svg>";
                }
                else if ($_SESSION['sort_name'] == 'email')
                {
                    echo "<svg width=\"1em\" height=\"1em\" viewBox=\"0 0 16 16\" class=\"bi bi-arrow-up\" fill=\"currentColor\" xmlns=\"http://www.w3.org/2000/svg\">
                            <path fill-rule=\"evenodd\" d=\"M8 3.5a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5z\"/>
                            <path fill-rule=\"evenodd\" d=\"M7.646 2.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8 3.707 5.354 6.354a.5.5 0 1 1-.708-.708l3-3z\"/>
                         </svg>";
                }
                ?>
            </span>
        </a>
        <a class="dropdown-item" href="index.php?action=sort&sort_name=status&sort_type=<? $_SESSION['sort_type'] == 0 ? print 1 : print 0;?>">Статусу
            <span>
                <?
                if($_SESSION['sort_name'] == 'status' && $_SESSION['sort_type'] == '1')
                {
                    echo "<svg width=\"1em\" height=\"1em\" viewBox=\"0 0 16 16\" class=\"bi bi-arrow-down\" fill=\"currentColor\" xmlns=\"http://www.w3.org/2000/svg\">
                              <path fill-rule=\"evenodd\" d=\"M4.646 9.646a.5.5 0 0 1 .708 0L8 12.293l2.646-2.647a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 0 1 0-.708z\"/>
                              <path fill-rule=\"evenodd\" d=\"M8 2.5a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-1 0V3a.5.5 0 0 1 .5-.5z\"/>
                          </svg>";
                }
                else if ($_SESSION['sort_name'] == 'status')
                {
                    echo "<svg width=\"1em\" height=\"1em\" viewBox=\"0 0 16 16\" class=\"bi bi-arrow-up\" fill=\"currentColor\" xmlns=\"http://www.w3.org/2000/svg\">
                            <path fill-rule=\"evenodd\" d=\"M8 3.5a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5z\"/>
                            <path fill-rule=\"evenodd\" d=\"M7.646 2.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8 3.707 5.354 6.354a.5.5 0 1 1-.708-.708l3-3z\"/>
                         </svg>";
                }
                ?>
            </span>
        </a>
    </div>
</div>

<?php
while ($row = mysqli_fetch_object($data->data))
{
    $row->status == "wait" ? $status = 'Выполняется' : $status = 'Выполнено';
?>
     <div class="card mb-3 ">
        <div class="card-header">
            <?echo $row->username. " (" . $row->email . ")";
            if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1)
            {
                echo "<a class=\"btn btn-info btn-sm float-right\" href=\"index.php?page=edit_task&task_id=$row->id\" style=\"color: #fff;\">Изменить</a>";
            }
            ?>
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <p><? echo $row->text?></p>
                <footer class="blockquote-footer">Статус: <? echo $status ?> <span class="float-right"><?$row->edited ? print "Изменено администратором" : null ?></span></footer>
            </blockquote>
        </div>
    </div>
<?php
}
$previous_page = $data->page - 1;
$next_page = $data->page + 1;
?>
<nav aria-label="Page navigation example">
    <ul class="pagination">
        <?
        if($previous_page >= 1)
        {
          echo "<li class=\"page-item\"><a class=\"page-link\" href=\"/index.php?page_num=$previous_page\"><<</a></li>";
        }
        if($data->page > 2 && $data->page_max >= $data->page+2)
        {
            for ($i = $data->page - 2; $i < $data->page+3; $i++)
            {
                if($data->page != $i)
                {
                    echo "<li class=\"page-item\"><a class=\"page-link\" href=\"/index.php?page_num=$i\">$i</a></li>";
                }
                else
                {
                    echo "<li class=\"page-item active\"><a class=\"page-link\" href=\"/index.php?page_num=$i\">$i</a></li>";
                }
            }
        }
        elseif ($data->page <= 2)
        {
            for ($i = 1; $i < 6 && $i != $data->page_max; $i++)
            {
                if($data->page != $i)
                {
                    echo "<li class=\"page-item\"><a class=\"page-link\" href=\"/index.php?page_num=$i\">$i</a></li>";
                }
                else
                {
                    echo "<li class=\"page-item active\"><a class=\"page-link\" href=\"/index.php?page_num=$i\">$i</a></li>";
                }
            }
        }
        else
        {
            if($data->page_max >= 6)
            {
                for ($i = $data->page_max-4;  $i != $data->page_max+1; $i++)
                {
                    if($data->page != $i)
                    {
                        echo "<li class=\"page-item\"><a class=\"page-link\" href=\"/index.php?page_num=$i\">$i</a></li>";
                    }
                    else
                    {
                        echo "<li class=\"page-item active\"><a class=\"page-link\" href=\"/index.php?page_num=$i\">$i</a></li>";
                    }
                }
            }
            else
            {
                for ($i = 1; $i != $data->page_max; $i++)
                {
                    if($data->page != $i)
                    {
                        echo "<li class=\"page-item\"><a class=\"page-link\" href=\"/index.php?page_num=$i\">$i</a></li>";
                    }
                    else
                    {
                        echo "<li class=\"page-item active\"><a class=\"page-link\" href=\"/index.php?page_num=$i\">$i</a></li>";
                    }
                }
            }
        }
        if($next_page <= $data->page_max)
        {
            echo "<li class=\"page-item\"><a class=\"page-link\" href=\"/index.php?page_num=$next_page\">>></a></li>";
        }
        ?>
    </ul>
</nav>