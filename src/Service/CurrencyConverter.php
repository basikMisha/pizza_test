<?php

namespace Minfr\PApp\Service;

class CurrencyConverter {
    public static function getExchangeRate(): float {
        $url = "https://api.nbrb.by/exrates/rates/USD?parammode=2";
        $response = file_get_contents($url);
        $data = json_decode($response, true);
        
        return $data['Cur_OfficialRate'] ?? 3.0;
    }

    public static function convertToBYN(float $usdAmount): float {
        return round($usdAmount * self::getExchangeRate(), 2);
    }
}
