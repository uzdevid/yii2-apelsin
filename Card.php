<?php

namespace uzdevid\apelsin;

use yii\base\InvalidValueException;

class Card extends Apelsin {
    public function data($number, $expire = null) {
        if (is_array($number)) {
            if (!is_array($number[0]))
                throw new InvalidValueException('Invalid array format');

            $cards = [];

            foreach ($number as $card) {
                if (!isset($card['number']))
                    throw new InvalidValueException('Param number not set');
                if (!isset($card['expire']))
                    throw new InvalidValueException('Param expire not set');

                $cards[] = [
                    'number' => $card['number'],
                    'expire' => $card['expire']
                ];
            }

            $body = [
                'method' => 'cards.get_some',
                'params' => [
                    'cards' => $cards
                ]
            ];
        } else {
            $body = [
                'method' => 'cards.get',
                'params' => [
                    'number' => $number,
                    'expire' => $expire,
                ],
                'id' => 0
            ];
        }

        return $this->execute->queryWithParams($body);
    }

    public function dataByToken($token) {
        if (is_array($token)) {
            $cards = [];
            foreach ($token as $card)
                $cards[] = ['token' => $card];

            $body = [
                'method' => 'cards.get_some',
                'params' => [
                    'cards' => $cards
                ]
            ];
        } else {
            $body = [
                'method' => 'cards.get',
                'params' => [
                    'token' => $token,
                ],
                'id' => 0
            ];
        }

        return $this->execute->queryWithParams($body);
    }

    public function info($card) {
        $body = [
            'method' => 'cards.get_p2p_info',
            'params' => [
                'card' => $card,
            ],
            'id' => 0
        ];

        return $this->execute->queryWithParams($body);
    }

    public function phone($number, $expire) {
        $body = [
            'method' => 'cards.get_phone',
            'params' => [
                'number' => $number,
                'expire' => $expire,
            ],
            'id' => 0
        ];

        return $this->execute->queryWithParams($body);
    }

    public function phoneByToken($token) {
        $body = [
            'method' => 'cards.get_phone',
            'params' => [
                'token' => $token
            ],
            'id' => 0
        ];

        return $this->execute->queryWithParams($body);
    }

    public function block($token) {
        $body = [
            'method' => 'cards.block',
            'params' => [
                'token' => $token
            ]
        ];

        return $this->execute->queryWithParams($body);
    }
}