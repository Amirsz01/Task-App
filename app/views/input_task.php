<form action="index.php?action=create" method="post">
    <div class="form-group">
        <label for="formGroupExampleInput">Имя пользователя</label>
        <input type="text" required class="form-control" id="formGroupExampleInput" placeholder="Username" name="username">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Email адрес</label>
        <input type="email" required class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email">
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Задача</label>
        <textarea class="form-control" required id="exampleFormControlTextarea1" rows="3" name="task-text"></textarea>
    </div>
    <button type="submit" class="btn btn-primary mb-3">Отправить</button>
    <a class="btn btn-primary mb-3" href='index.php?page=content'>Назад</a>
</form>