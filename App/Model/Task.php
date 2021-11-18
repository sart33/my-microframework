<?php


namespace App\Model;


use App\Db\DbConnection;

class Task extends Model
{
    public function getValidate()
    {
        return [
            'id' => [1, 5, '#^[0-9]{1,5}$#ui'],
            'task_name' => [2, 32, '#^[A-Za-zА-Яа-я0-9]{2,32}$#ui'],
            'last_execution' => [20, 27],
            'next_execution' => [20, 27],
            'interval' => [1, 22, '#^[0-9]{1,9}.*?[0-9]{0,6}$#ui'],
            'role' => [1, 2, '#^[0-9]{1,2}$#ui'],
            'active' => [1, 5, '#^1|0|true|false$#ui'],
            'script_path' => [3, 255],
            'user_id' => [1, 5, '#^[0-9]{1,5}$#ui'],

        ];
    }

    public function findOneObj($id)
    {

        $className = get_called_class();
        $tableName = $this->classNameToTableName($className);

        if ($tableName !== false) {
            $sql = "SELECT * FROM public.$tableName WHERE id =$id";

            if (isset(DbConnection::inquireIntoDb($sql, 'obj')[0])) {
                return DbConnection::inquireIntoDb($sql, 'obj')[0];
            } else {
                throw new \LogicException('SQL query error!');

            }

        } else {
            throw new \LogicException('get called ClassName error!');
        }
    }
    public function findAllObj()
    {

        $className = get_called_class();
        $tableName = $this->classNameToTableName($className);

        if ($tableName !== false) {
            $sql = "SELECT * FROM public.$tableName";

            if (isset(DbConnection::inquireIntoDb($sql, 'obj')[0])) {
                return DbConnection::inquireIntoDb($sql, 'obj');
            } else {
                throw new \LogicException('SQL query error!');

            }

        } else {
            throw new \LogicException('get called ClassName error!');
        }
    }

    public function searchTask($id)
    {
        $task = $this->findOneObj(1);
        $timestamp = time();
        $lastExecutedTimestamp = strtotime($task->last_execution);
        // Convert cron expression to timestamp
        $intervalTimestamp = $task->interval;
        // Check if the task should be run.
        $id = $task->id;
        $newLastExecutedTimestamp = date('Y-m-d H:i:s', $timestamp);
        if ($timestamp - $lastExecutedTimestamp >= $intervalTimestamp) {
            // Execute task
            $sqlTask = "UPDATE public.task SET last_execution = '$newLastExecutedTimestamp' WHERE id = $id";
            $params = DbConnection::inquireIntoDb($sqlTask);
        }
        $hours = intdiv(($intervalTimestamp - ($timestamp - $lastExecutedTimestamp)),3600);
        $ost = ($intervalTimestamp - ($timestamp - $lastExecutedTimestamp))%3600;

        $minutes =  intdiv($ost, 60);
        $ostMinutes = $ost%60;
        $seconds = intdiv($ostMinutes, 60);
//        $minutes = substr($nextTimeArr[1], 0, 2);
//        $seconds = (substr($nextTimeArr[1], 2, 2)) * 0.6;
        // Update the task's last_executed time.
        $params = '';
        $timeoutToTask = 'Задание будет запущено через: ' . $hours . ' часа ' . $minutes . ' минуты ' . $ostMinutes . ' секунд(ы)' . PHP_EOL;

//        file_put_contents(dirname(__DIR__) . '/Log/tasks.txt', $timeoutToTask);

        return $timeoutToTask;

    }
    public function allTasks()
    {
        $tasks = $this->findAllObj();
        $timeoutToTask = [];
        $timestamp = time() + 7200;
        foreach ($tasks as $task) {

            $lastExecutedTimestamp = strtotime($task->last_execution);
            // Convert cron expression to timestamp
            $intervalTimestamp = $task->interval;
            // Check if the task should be run.
            $id = $task->id;
            $newLastExecutedTimestamp = date('Y-m-d H:i:s', $timestamp);
//            if ($timestamp - $lastExecutedTimestamp >= $intervalTimestamp) {
//                // Execute task
//                $sqlTask = "UPDATE public.task SET last_execution = '$newLastExecutedTimestamp' WHERE id = $id";
//                $params = DbConnection::inquireIntoDb($sqlTask);
//            }
            $timeSecond = $intervalTimestamp - ($timestamp - $lastExecutedTimestamp);
            $hours = intdiv(($timeSecond), 3600);
            if ($hours <= 2 && $hours >= -2) {

//                $newLastExecutedTimestamp = $lastExecutedTimestamp + 24*3600;
//
//                $sqlTaskUpdate = "UPDATE public.task SET last_execution = '$newLastExecutedTimestamp' WHERE id = $id";
//                $params = DbConnection::inquireIntoDb($sqlTaskUpdate);
                // Execute task
//    $sqlTask = "UPDATE public.task SET last_execution = '$newLastExecutedTimestamp' WHERE id = $id";
//    $stmt = $db->prepare($sqlTask);
//    $stmt->execute();
//    $params = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                $hours = intdiv(($intervalTimestamp - ($timestamp - $lastExecutedTimestamp)), 3600);
                $ost = ($intervalTimestamp - ($timestamp - $lastExecutedTimestamp)) % 3600;

                $minutes = intdiv($ost, 60);
                $ostMinutes = $ost % 60;
                $seconds = intdiv($ostMinutes, 60);
//                $timeoutToTask['dander'][] = 'Вы должны: ' . $task->task_name . ' через ' . $hours . ' часа ' . $minutes . ' минуты ' . $ostMinutes . ' секунд(ы)' . PHP_EOL;
// токен бота

                if(($timeSecond >=0 )) {
                    $message = 'Вы должны: ' . $task->task_name . ' в аквариуме через ' . $hours . ' часа ' . $minutes . ' минуты ' . $ostMinutes . ' секунд(ы)';
                    $timeoutToTask['dander'][] = 'Вы должны: ' . $task->task_name . ' через ' . $hours . ' часа ' . $minutes . ' минуты ' . $ostMinutes . ' секунд(ы)' . PHP_EOL;
                } elseif ($timeSecond < 0) {
                    $message = 'Вы должны были: ' . $task->task_name . ' в аквариуме ' . abs($hours) . ' часа ' . abs($minutes) . ' минуты ' . abs($ostMinutes) . ' секунд(ы) назад';
                    $timeoutToTask['dander'][] = 'Вы должны были: ' . $task->task_name . ' в аквариуме ' . abs($hours) . ' часа ' . abs($minutes) . ' минуты ' . abs($ostMinutes) . ' секунд(ы) назад';
                }
                $ch = curl_init('https://api.telegram.org/bot'.TELEGRAM_TOKEN.'/sendMessage?chat_id='.TELEGRAM_CHATID.'&text='.$message); // URL
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Не возвращать ответ

                curl_exec($ch); // Делаем запрос
                curl_close($ch); // Завершаем сеанс cURL
//                $varTemp = realpath('/var/www/my-microframework/public/img/aquarium/kormleniye-ryb-v-akvariume.jpg');
//                $body = file_get_contents('/var/www/my-microframework/public/img/aquarium/kormleniye-ryb-v-akvariume.jpg');
//                $arr = json_decode($body, true);
//            $url  = 'https://api.telegram.org/bot' . TELEGRAM_TOKEN .'sendPhoto?chat_id=' . TELEGRAM_CHATID;
//            $post_fields = ['chat_id'   => TELEGRAM_CHATID,
//                'photo'     => new \CURLFile(realpath('/var/www/my-microframework/public/img/aquarium/kormleniye-ryb-v-akvariume.jpg'))
//            ];
//
//            $chTwo = curl_init();
//            curl_setopt($chTwo, CURLOPT_HTTPHEADER, array(
//                "Content-Type:multipart/form-data"
//            ));
//            curl_setopt($chTwo, CURLOPT_URL, $url);
//            curl_setopt($chTwo, CURLOPT_RETURNTRANSFER, 1);
//            curl_setopt($chTwo, CURLOPT_POSTFIELDS, $post_fields);
//            $output = curl_exec($chTwo);
            }

            elseif ($hours <= -24) {
                $newLastExecutedTimestamp = date('Y-m-d H:i:s',$lastExecutedTimestamp + 24*3600);

                $sqlTaskUpdate = "UPDATE public.task SET last_execution = '$newLastExecutedTimestamp' WHERE id = $id";
                $params = DbConnection::inquireIntoDb($sqlTaskUpdate);
            }
            else {
                $message = 'Hello I am working now! $)';
                $ch = curl_init('https://api.telegram.org/bot'.TELEGRAM_TOKEN.'/sendMessage?chat_id='.TELEGRAM_CHATID.'&text='.$message); // URL
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Не возвращать ответ

                curl_exec($ch); // Делаем запрос
                curl_close($ch); // Завершаем сеанс cURL
            }
            $hours = intdiv(($intervalTimestamp - ($timestamp - $lastExecutedTimestamp)), 3600);
            $ost = ($intervalTimestamp - ($timestamp - $lastExecutedTimestamp)) % 3600;

            $minutes = intdiv($ost, 60);
            $ostMinutes = $ost % 60;
            $seconds = intdiv($ostMinutes, 60);
//        $minutes = substr($nextTimeArr[1], 0, 2);
//        $seconds = (substr($nextTimeArr[1], 2, 2)) * 0.6;
            // Update the task's last_executed time.
            $params = '';
            $timeoutToTask[$task->task_name] = 'Задание ' . $task->task_name . ' будет запущено через: ' . $hours . ' часа ' . $minutes . ' минуты ' . $ostMinutes . ' секунд(ы)' . PHP_EOL;
        }
//        file_put_contents(dirname(__DIR__) . '/Log/tasks.txt', $timeoutToTask);

        return $timeoutToTask;

    }

}