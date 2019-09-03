<?php

namespace App\Service;

use FeedIo\FeedInterface;

class TopWordsExtractor
{

    protected $top50Words = [
        'the',
        'be',
        'to',
        'of',
        'and',
        'a',
        'in',
        'that',
        'have',
        'i',
        'it',
        'for',
        'not',
        'on',
        'with',
        'he',
        'as',
        'you',
        'do',
        'at',
        'this',
        'but',
        'his',
        'by',
        'from',
        'they',
        'we',
        'say',
        'her',
        'she',
        'or',
        'an',
        'will',
        'my',
        'one',
        'all',
        'would',
        'there',
        'their',
        'what',
        'so',
        'up',
        'out',
        'if',
        'about',
        'who',
        'get',
        'which',
        'go',
        'me',
        'when',
    ];

    public function extract(FeedInterface $feed): array {
        $text = $this->getText($feed);
        $words = array_filter(explode(' ', $text));
        $result = [];

        foreach($words as $word){
            if(!isset($result[$word])){
                $result[$word] = 0;
            }
            $result[$word]++;
        }

        $result = array_diff_key($result, array_flip($this->top50Words));
        arsort($result);
        return array_slice($result, 0, 10);
    }

    protected function getText(FeedInterface $feed): string {
        $text = '';
        foreach($feed as $item){
            $text .= $item->getTitle() . ' ';
            $text .= $item->getDescription() . ' ';
        }

        return strtolower(preg_replace('/[^\A-z\s]/', '', strip_tags($text)));
    }
}
