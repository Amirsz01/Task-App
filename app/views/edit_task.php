<?php
    if(!$_SESSION['admin'] == 1)
    {
        header('Location: /index.php?page=index&error=2');
    }
?>
<form action="index.php?action=edit&task_id=<?echo $data->id?>" method="post">
    <fieldset disabled>
    <div class="form-group">
        <label for="formGroupExampleInput">Имя пользователя</label>
        <input type="text" required class="form-control" id="formGroupExampleInput" placeholder="Username" name="username" value="<?echo $data->username?>">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Email адрес</label>
        <input type="email" required class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email" value="<?echo $data->email?>">
    </div>
    </fieldset>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Задача</label>
        <textarea class="form-control" required id="exampleFormControlTextarea1" rows="3" name="task-text"><?echo $data->text?></textarea>
    </div>
    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" <?$data->status=='success' ? print checked : null?> id="defaultCheck1" name="status">
        <label class="form-check-label" for="defaultCheck1">
            Выполнено
        </label>
    </div>
    <button type="submit" class="btn btn-primary mb-3">Отправить</button>
    <a class="btn btn-primary mb-3" href='index.php?page=content'>Назад</a>
</form>