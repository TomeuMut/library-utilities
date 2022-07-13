<?php
//        $url = 'api.openweathermap.org/data/2.5/weather?id=6424360&appid=f084c8131b353c2d68e88dbb72f851e0';

        $url = 'api.openweathermap.org/data/2.5/weather?lat=39.7900599&lon=2.6916745&units=metric&lang=es&appid=f084c8131b353c2d68e88dbb72f851e0';
        //setting the curl parameters.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);

        // Following line is compulsary to add as it is:

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
//        curl_setopt($ch, CURLOPT_POST, 1);
//        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
        $data = curl_exec($ch);
        curl_close($ch);

        $array_data =json_decode($data);
//        dd($array_data);

        setlocale(LC_ALL, "es_ES");

        $weather = $array_data->weather[0];

        $temp = $array_data->main->temp;
        //Quitar decimales temperatura.
        $temp = substr($temp, 0, 2);
        $wind = $array_data->wind;
        $sys = $array_data->sys;
        $cloud = $array_data->clouds;
        $sunrise= gmdate("H", $sys->sunrise);
        $sunset= gmdate("H", $sys->sunset);
        $day = gmdate("d-m", $array_data->dt);
        $year = gmdate("Y", $array_data->dt);

        $hour = gmdate("H", $array_data->dt) + 2;

        // Solución para agrupar por 2 horas

        if ($hour % 2 != 0) {
            $hour += 1;
        }
        
