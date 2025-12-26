<?php

namespace Faker\Provider\ms_MY;

class Color extends \Faker\Provider\Color
{
    protected static $safeColorNames = [
        'putih', 'hitam', 'merah', 'hijau', 'biru',
        'kuning', 'jingga', 'ungu', 'coklat', 'kelabu',
        'perak', 'emas', 'merah jambu',
    ];

    protected static $allColorNames = [
        'biru', 'biru kehijauan', 'biru laut dalam', 'biru muda',
        'biru pastel', 'biru safir', 'biru tua', 'coklat', 'coklat kemerahan',
        'coklat kopi', 'emas', 'hijau', 'hijau muda', 'hijau pastel',
        'hijau tua', 'hijau zamrud', 'hitam', 'jingga', 'kelabu',
        'kelabu arang', 'kelabu kebiruan', 'kelabu muda', 'kelabu pastel',
        'kelabu tua', 'kuning', 'kuning kehijauan', 'kuning langsat',
        'kuning pastel', 'kuning pucat', 'merah', 'merah bata', 'merah gelap',
        'merah jingga', 'merah jambu', 'merah jambu pastel', 'perak', 'putih',
        'tembaga', 'ungu', 'ungu pastel',
    ];
}
