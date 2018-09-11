<?php

    function changeState($state, $taskId, $user_id, $db)
    {
        $sql = "UPDATE task SET is_done = $state WHERE `id` = $taskId AND `assigned_user_id` = $user_id LIMIT 1";
        $preSql = $db->prepare($sql);
        $preSql->execute();    
    }

    function changeAssignedUser($assigned_user, $taskId, $db)
    {
        $sql = "UPDATE task SET assigned_user_id = $assigned_user WHERE id = $taskId";
        $preSql = $db->prepare($sql);
        $preSql->execute();
    }

    function idToName($id, $db)
    {
        $sql = "SELECT user.login FROM user  WHERE id = $id";
        $preSql = $db->prepare($sql);
        $preSql->execute();
        $name = $preSql->fetchALL(PDO::FETCH_ASSOC);
        $name = $name['0']['login'];
        return $name;
    }

    function countTask($id, $db)
    {
        $sql = "SELECT count(*) FROM task t WHERE t.user_id = $id OR t.assigned_user_id = $id";
        $preSql = $db->prepare($sql);
        $preSql->execute();
        $count = $preSql->fetchALL(PDO::FETCH_ASSOC);
        $count = $count['0']['count(*)'];
        return $count;
    }

    function listTask($id, $db)
    {
        $sql = "SELECT t.id, t.description, t.date_added, t.user_id, t.assigned_user_id, t.is_done 
        FROM task t INNER JOIN user u ON u.id = t.user_id WHERE
        t.user_id = $id OR t.assigned_user_id = $id ORDER BY `date_added`";
        $preSql = $db->prepare($sql);
        $preSql->execute();
        return $preSql->fetchALL(PDO::FETCH_ASSOC);
    }

    function tableTemlate($row, $db)
    { 
        $state = ($row['is_done'] == 1) ? 'Выполнено' : 'Невыполненно'; ?>
        <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['description'];?></td>
            <td><?php echo $row['date_added'];?></td>
            <td><?php echo idToName($row['user_id'], $db);?></td>
            <td>
                <form action="task.php" method="post">
                    <select name="assigned_user">
                        <option value="<? echo $row['assigned_user_id'] ?>"><?php echo idToName($row['assigned_user_id'], $db);?></option>
                        <?php
                            $sql = "SELECT u.id, u.login FROM user u WHERE NOT u.id = '{$row['assigned_user_id']}'";
                            $preSql = $db->prepare($sql);
                            $preSql->execute();
                            $userArr = $preSql->fetchALL(PDO::FETCH_ASSOC);
                            foreach ($userArr as $user){?>
                                <option value="<?php echo $user['id']; ?>"><?php echo $user['login']; ?></option>
                            <?php } ?>    
                    </select>
                    <button type="submit" name="assign" value="<? echo $row['id']?>">Делегировать</button>
                </form>
            
            </td>
            <td><?php echo $state;?></td>
            <td><?php if ($row['is_done'] == 1) {?> <a href="task.php?state=0&task=<? echo $row['id']?>&user_id=<? echo $_SESSION['logged_user']['id']?>">Возобновить</a> <?php } 
            elseif ($row['is_done'] == 0) { ?> <a href="task.php?state=1&task=<? echo $row['id'] ?>&user_id=<? echo $_SESSION['logged_user']['id'] ?>">Выполнить</a> <?php } ?></td>
            <td><a href="task.php?del=<?php echo $row['id']?>">Удалить</a></td>
        </tr>
    <?php }

    function addTask($task, $id, $db)
    {
        $date = date('Y-m-d H:m:s');
        $sql = "INSERT INTO task(description, date_added, user_id, assigned_user_id, is_done) 
        VALUE ('$task', '$date', '$id', '$id', '0')";
        $preSql = $db->prepare($sql);
        $preSql->execute();
    }

    function deleteTask($id, $idTask, $db)
    {
        $sql = "DELETE FROM task WHERE user_id='$id' AND id='$idTask' LIMIT 1";
        $preSql = $db->prepare($sql);
        $preSql->execute();
    }