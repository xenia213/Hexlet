<?php

/**
 * Реализуйте функцию getFreeDomainsCount, которая принимает на вход список
 *  емейлов, а возвращает количество емейлов, расположенных на каждом 
 * бесплатном домене. Список бесплатных доменов хранится в константе 
 * FREE_EMAIL_DOMAINS.
 */

const FREE_EMAIL_DOMAINS = [
    'gmail.com', 'yandex.ru', 'hotmail.com'
];

function getFreeDomainsCount(array $emails)
{
    $domainName = array_map(function ($email) {
        return explode("@", $email)[1];
    }, $emails);

    $freeDomains = array_filter($domainName, function ($domain) {
        return in_array($domain, FREE_EMAIL_DOMAINS);
    });

    return array_reduce($freeDomains, function ($acc, $domain) {
        if (!array_key_exists($domain, $acc)) {
            $acc[$domain] = 1;
        } else {
            $acc[$domain] += 1;
        }
        return $acc;
    }, []);
}
