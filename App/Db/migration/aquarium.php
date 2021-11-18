<?php
"CREATE TABLE `my_microframework`.`aquarium` ( `id` INT NOT NULL AUTO_INCREMENT , `added_no3` FLOAT NOT NULL DEFAULT '0' , `added_po4` FLOAT NOT NULL DEFAULT '0' , `added_k` FLOAT NOT NULL DEFAULT '0' , `added_micro` FLOAT NOT NULL DEFAULT '0' , `added_fe` FLOAT NOT NULL DEFAULT '0' , `added_co2` FLOAT NULL , `water_change` FLOAT NOT NULL DEFAULT '0' , `added_cidex` FLOAT NOT NULL DEFAULT '0' , `test_no3` FLOAT NULL DEFAULT NULL , `test_po4` FLOAT NULL DEFAULT NULL , `description` TEXT NULL DEFAULT NULL , `img_one` VARCHAR(100) NULL DEFAULT NULL , `img_two` VARCHAR(100) NULL DEFAULT NULL , `img_three` VARCHAR(100) NULL DEFAULT NULL , `test_ph` FLOAT NULL DEFAULT NULL , `test_kh` FLOAT NULL DEFAULT NULL , `test_gh` FLOAT NULL DEFAULT NULL , `test_k` FLOAT NULL DEFAULT NULL , `daylight_hours` FLOAT NOT NULL , `feed` VARCHAR(255) NULL , `feed_quantity` FLOAT NULL , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;
";



array (
    'description' => 'Поднял крышку. Увеличил яркость освещения. Значительно усилил поток СО2, - но дропчекер (как всегда) тормозит и темно-зеленый. Ксен на листьях крипты новых появился тоже. Немного обрезал "лиану" на камне. Листья бликсы продолжают желтеть, видно - им нужен глюконат железа. Сильных ухудшений по растениям не увидел. Кое где борода, но критического роста  - нет. Стекла заростают довольно быстро,Б чистить , наверное надо раз в три -4 дня. Рыб всех кормил с одной кормушки. Малышня тоже объедается черезчур. Буду уменьшать.',
    'daylight_hours' => '8',
    'feed' => 'Тетрамин хлопья, Тетрадискус',
    'feed_quantity' => '1000',
    'added_no3' => '3.33',
    'added_po4' => '0.67',
    'added_k' => '0',
    'added_fe' => '10',
    'added_co2' => '25',
    'water_change' => '0',
    'added_cidex' => 'null',
    'test_no3' => '13',
    'test_po4' => '2',
    'test_ph' => 'null',
    'test_kh' => 'null',
    'test_gh' => 'null',
    'test_k' => 'null',
);