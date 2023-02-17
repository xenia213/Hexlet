<?php

/**
 * Реализуйте следующие функции:
 * l(...$items) — функция-конструктор. Уже реализована
 * toString($list) — возвращает строковое представление списка
 * head($list) — возвращает первый элемент списка
 * tail($list) — возвращает "хвост" списка (все элементы, кроме первого)
 * isEmpty($list) — проверяет, является ли список пустым
 * cons($item, $list) — добавляет элемент в начало списка и возвращает новый список
 * filter($list, $predicate) — фильтрует список, используя предикат
 * map($list, $callback) — преобразует список, используя callback-функцию
 * reduce($list, $callback, $init) — производит свертывание списка
 */

 namespace Lists;

 const DELIMETER = "\n";
 
 function l(...$items)
 {
      return implode(DELIMETER, $items);
 }
 
 function cons($item, $list)
 {
     return function ($method) use ($item, $list) {
         switch ($method) {
             case "head":
                 return $item;
             case "tail":
                 return $list;
         }
     };
 }
 
 function head(callable $list)
 {
     return $list("head");
 }
 
 function tail(callable $list)
 {
     return $list("tail");
 }
 
 function toString($list)
 {
     if (isEmpty($list)) {
         return '()';
     }
 
     $iter = function ($list) use (&$iter) {
         $first = head($list);
         $rest = tail($list);
         if (isEmpty($rest)) {
             return toString($first);
         }
 
         return toString($first) . ', ' . $iter($rest);
     };
 
     return '(' . $iter($list) . ')';
 }
 
 function isEmpty($list)
 {
     return $list === null;
 }
 
 function filter($list, $predicate)
 {
     if (isEmpty($list)) {
         return l();
     }
 
     $first = head($list);
     $rest = tail($list);
     if ($predicate($first)) {
         return cons($first, filter($rest, $predicate));
     }
     return filter($rest, $predicate);
 }
 
 function map($list, $callback)
 {
     if (isEmpty($list)) {
         return l();
     }
 
     $newElem = $callback(head($list));
 
     return cons($newElem, map(tail($list), $callback));
 }
 
 function reduce($list, $callback, $init)
 {
     $iter = function ($items, $acc) use (&$iter, $callback) {
         return isEmpty($items) ? $acc : $iter(tail($items), $callback(head($items), $acc));
     };
 
     return $iter($list, $init);
 }

 $list = l('foo', 'bar', 'baz');
 
 print_r(toString($list)); // (foo, bar, baz)