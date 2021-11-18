<?php


namespace App\Model;


use App\Config\Routes;
use App\Db\DbConnection;
use phpDocumentor\Reflection\Types\Parent_;

class Aquarium extends Model
{

    private $tableName;


    public function __construct()
    {
        $this->tableName = 'aquarium';
    }




    public function getValidate()
    {
        return [
            'id' => [1, 4, '#^[0-9]{1,4}$#ui'],
            'temperature' => [4, 4, '#^[0-9]{2}\.*?[0-9]{0,1}$|^null$#ui'],
            'daylight_hours' => [4, 5, '#^[0-9]{1,2}\.*?[0-9]{0,2}$#ui'],
            'feed' => [3, 100, '#^[A-Za-zА-Яа-я0-9,\s]{3,100}$#ui'],
            'feed_quantity' => [1, 6, '#^[0-9]{1,3}\.*?[0-9]{0,3}$#ui'],
            'added_no3' => [1, 6, '#^[0-9]{1,3}\.*?[0-9]{0,3}$#ui'],
            'added_micro' => [1, 6, '#^[0-9]{1,3}\.*?[0-9]{0,3}$#ui'],
            'added_po4' => [1, 6, '#^[0-9]{1,3}\.*?[0-9]{0,3}$#ui'],
            'added_k' => [1, 6, '#^[0-9]{1,3}\.*?[0-9]{0,3}$#ui'],
            'added_fe' => [1, 6, '#^[0-9]{1,3}\.*?[0-9]{0,3}$#ui'],
            'added_co2' => [1, 6, '#^[0-9]{1,3}\.*?[0-9]{0,3}$#ui'],
            'water_change' => [1, 6, '#^[0-9]{1,3}\.*?[0-9]{0,3}$#ui'],
            'added_cidex' => [1, 6, '#^[0-9]{1,3}\.*?[0-9]{0,3}$|^null$#ui'],
            'test_no3' => [1, 6, '#^[0-9]{1,3}\.*?[0-9]{0,3}$|^null$#ui'],
            'test_po4' => [1, 6, '#^[0-9]{1,3}\.*?[0-9]{0,3}$|^null$#ui'],
            'test_ph' => [1, 6, '#^[0-9]{1,3}\.*?[0-9]{0,3}$|^null$#ui'],
            'test_kh' => [1, 6, '#^[0-9]{1,3}\.*?[0-9]{0,3}$|^null$#ui'],
            'test_gh' => [1, 6, '#^[0-9]{1,3}\.*?[0-9]{0,3}$|^null$#ui'],
            'test_k' => [1, 6, '#^[0-9]{1,3}\.*?[0-9]{0,3}$|^null$#ui'],
            'description' => [5, 5000],
            'img' => [1, 4],
            'img_one' => [4, 36 , '#^[[:xdigit:]]{32}.jpg$|^[[:xdigit:]]{32}.png|^null$#ui'],
            'img_two' => [4, 36 , '#^[[:xdigit:]]{32}.jpg$|^[[:xdigit:]]{32}.png|^null$#ui'],
            'img_three' => [4, 36 , '#^[[:xdigit:]]{32}.jpg$|^[[:xdigit:]]{32}.png|^null$#ui'],
            'img_four' => [4, 36 , '#^[[:xdigit:]]{32}.jpg$|^[[:xdigit:]]{32}.png|^null$#ui'],
            'img_five' => [4, 36 , '#^[[:xdigit:]]{32}.jpg$|^[[:xdigit:]]{32}.png|^null$#ui'],
            'video' => [0, 4],
            'video_one' => [4, 36 , '#^[[:xdigit:]]{32}.mkv$|^[[:xdigit:]]{32}.mp4|^null$#ui'],
            'video_two' => [4, 36 , '#^[[:xdigit:]]{32}.mkv$|^[[:xdigit:]]{32}.mp4|^null$#ui'],
            'video_three' => [4, 36 , '#^[[:xdigit:]]{32}.mkv$|^[[:xdigit:]]{32}.mp4|^null$#ui'],
            'video_four' => [4, 36 , '#^[[:xdigit:]]{32}.mkv$|^[[:xdigit:]]{32}.mp4|^null$#ui'],
            'video_five' => [4, 36 , '#^[[:xdigit:]]{32}.mkv$|^[[:xdigit:]]{32}.mp4|^null$#ui'],
            'user_id' => [1, 3, '#^[0-9]{1,3}$#ui']




        ];
    }


    public function charts() {
        $tableName = $this->tableName;
        $addedConcentrate = [];
        $userId = $this->getUserId();
       $searchingTableNames = Parent::showColumnsKey($tableName);
        foreach ($searchingTableNames as $key => $item) {
            $addedConcentrate[] = 'created_at';
           if(preg_match('#^added_con_no3(.*)$|^added_con_po4(.*)$|^added_con_k(.*)$#ui', $key,  $matches) === 1) {
               $addedConcentrate[] = $key;
           }

       }

        $variable = '';
        foreach ($addedConcentrate as $item) {
            $variable .= $item . ',';

        }
        $variable = rtrim($variable,',');

        $sqlAddedConcentration = "SELECT $variable FROM $tableName WHERE user_id=$userId";
        $result = DbConnection::inquireIntoDb($sqlAddedConcentration);
        $date = '';
        $resultTwo = [];
        $resultThree = [];
        $i = 0;
        foreach ($result as $res) {
            if($i === 0) {
                foreach ($res as $key => $item) {
                    if(preg_match('#^added_con_(.*)$#ui', $key,  $matches) === 1) {
                        if (mb_strlen($matches[1]) === 1 || mb_strlen($matches[1]) === 2) {
                            $matches[1] = ucfirst($matches[1]);
                        } elseif(preg_match('#^(.*)([0-9]{1})$#ui', $key) === 1) {
                            $matches[1] = strtoupper($matches[1]);

                        } else {

                        }

                        $resultTwo[] = $matches[1];
                    } else {
                        if (preg_match('#^([0-9]{4}-[0-9]{2}-[0-9]{2})\s.*$#ui', $item, $matchesTwo) === 1)
                            $resultTwo[] = $key;
                    }

                }

                } elseif ($i > 0) {
                foreach ($res as $key => $item) {

                    if (preg_match('#^([0-9]{4}-[0-9]{2}-[0-9]{2})\s.*$#ui', $item, $matchesTwo) === 1) {
                        $resultTwo[] = $matchesTwo[1];
                    } else {
                        $resultTwo[] = (float)$item;
                    }

                    }

            } $i++;
            $resultThree[] = $resultTwo;
            $resultTwo = null;

        }

        return $resultThree;




    }

    static public function aquariumMenu(): array {

        $aquariumMenu = [];

        $links = Routes::routingTable();

        foreach ($links as $key => $link) {
            if (preg_match('#^(aquarium@)([[:upper:]]{0,1})#ui', $link[0]) === 1) {
                if(!empty($link[3])) {
                    $aquariumMenu[$link[3]] = $key;
                }
            }

        }

        $menuItem = array_key_first($aquariumMenu);
        $page = array_shift($aquariumMenu);
        $aquariumFirst[$menuItem] = $page;
        return compact('aquariumFirst', 'aquariumMenu');
    }

    public function create($param, $img = null, $video = null) {
        $fromFormValid = $this->validate($param, $img, $video);
        $fromFormValid = $this->concentration($fromFormValid);
        $fromFormValid['user_id'] = $this->getUserId();
        $res = $this->insertData($fromFormValid, 'aquarium');
        if($res!== null) return true;
    }

    public function update($param, $img = null, $video = null) {
        $sqlCycle = '';
        $id = 0;
        $fromFormValid = $this->validate($param, $img, $video);
        $fromFormValid = $this->concentration($fromFormValid);
        $fromFormValid['user_id'] = $this->getUserId();
        $res = $this->updateData($fromFormValid, 'aquarium');
        if($res!== null) {
            return true;
        } else {
            throw new \LogicException('Update data into db - Error!');
        }

    }


    public function concentration($fromFormValid) {

        $conKMicro = 0;
        $conKNitro = 0;
        $conKMacro = 0;
        $conFeMix = 0;
        $conMgMicro = 0;
        $conMnMicro = 0;
        $conCuMicro = 0;
        $conMoMicro = 0;
        $conBMicro = 0;
        $conZnMicro = 0;
        $conFeMicro = 0;
        $conGlutaraldehyde = 0;

        if($fromFormValid['added_fe']) {
            $conFeMix = ($fromFormValid['added_fe'] * FERUM_MIX_CRAZY) / AQUARIUM_VOLUME;
        }
        if($fromFormValid['added_micro']) {
            $conFeMicro = ($fromFormValid['added_micro'] * MICRO_AQUAXER_Fe) / AQUARIUM_VOLUME;
            $conKMicro = ($fromFormValid['added_micro'] * MICRO_AQUAXER_K) / AQUARIUM_VOLUME;
            $conMgMicro = ($fromFormValid['added_micro'] * MICRO_AQUAXER_Mg) / AQUARIUM_VOLUME;
            $conMnMicro = ($fromFormValid['added_micro'] * MICRO_AQUAXER_Mn) / AQUARIUM_VOLUME;
            $conCuMicro = ($fromFormValid['added_micro'] * MICRO_AQUAXER_Cu) / AQUARIUM_VOLUME;
            $conMoMicro = ($fromFormValid['added_micro'] * MICRO_AQUAXER_Mo) / AQUARIUM_VOLUME;
            $conBMicro = ($fromFormValid['added_micro'] * MICRO_AQUAXER_B) / AQUARIUM_VOLUME;
            $conZnMicro = ($fromFormValid['added_micro'] * MICRO_AQUAXER_Zn) / AQUARIUM_VOLUME;
        }

        if($fromFormValid['added_no3']) {
            $fromFormValid['added_con_no3'] = ($fromFormValid['added_no3'] * MACRO_NO3) / AQUARIUM_VOLUME;
            $conKNitro = $fromFormValid['added_con_no3'] / ((14+16*3)/39);
        }
        if($fromFormValid['added_po4']) {
            $fromFormValid['added_con_po4'] = ($fromFormValid['added_po4'] * MACRO_PO4) / AQUARIUM_VOLUME;

        }
        if($fromFormValid['added_k']) {
            $conKMacro = ($fromFormValid['added_k'] * MACRO_K) / AQUARIUM_VOLUME;
        }        if($fromFormValid['added_cidex']) {
            $conGlutaraldehyde = ($fromFormValid['added_cidex'] * CIDEX_AQUAXER_GLUTARALDEHYDE) / AQUARIUM_VOLUME;
        }
        $fromFormValid['added_con_k'] = $conKMicro + $conKNitro + $conKMacro;
        $fromFormValid['added_con_fe'] = $conFeMix + $conFeMicro;
        $fromFormValid['added_con_mg'] = $conMgMicro;
        $fromFormValid['added_con_mn'] = $conMnMicro;
        $fromFormValid['added_con_cu'] = $conCuMicro;
        $fromFormValid['added_con_mo'] = $conMoMicro;
        $fromFormValid['added_con_b'] = $conBMicro;
        $fromFormValid['added_con_zn'] = $conZnMicro;
        $fromFormValid['added_con_glutaraldehyde'] = $conGlutaraldehyde;

        return $fromFormValid;
    }

}